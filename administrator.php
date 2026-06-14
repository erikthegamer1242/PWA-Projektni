<?php
require_once('header.php');
session_start();

if (!isset($_SESSION['username']) && !isset($_SESSION['level'])) {
    header('Location: login.php');
    exit();
}

if ($_SESSION['level'] <= 1) {
    echo "Nemate pristup ovoj stranici!";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['id']) && isset($_GET['w']) && $_GET['w'] === 'e') {
        $id = $_GET['id'];
        try {
            $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT * FROM category";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $stmt->closeCursor();

            $sql = "SELECT * FROM news WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $news = $stmt->fetch(PDO::FETCH_ASSOC);

            print '
                <form enctype="multipart/form-data" class="news-form" method="POST">
                    <h2>Promjena novosti</h2>
                    <input type="hidden" name="id" value="' . $news['id'] . '">
                    <label for="title">Naslov:</label><br>
                    <input type="text" name="title" id="title" placeholder="Naslov" value="' . $news['title'] . '" required><br>
                    <label for="content">Sadržaj:</label><br>
                    <textarea name="content" id="content" placeholder="Sadržaj" required>' . $news['description'] . '</textarea><br>
                    <label for="img_file">Uploadaj novu sliku:</label><br>
                    <input type="file" name="img_file" id="img_file" placeholder="slike"><br>
                    <label for="category">Kategorija:</label><br>
                    <select name="category" id="category" required>
                        <option value="">Odaberite kategoriju</option>';
            foreach ($categories as $row) {
                if ($row['id'] == $news['id_category']) {
                    print '<option value="' . $row['id'] . '" selected>' . $row['name'] . '</option>';
                } else {
                    print '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
            }
            print '</select><br>
                        <label for="archive">Arhiviraj:</label>';
            print '<input type="checkbox" name="archive" id="archive" value="1"' . ($news['archive'] ? 'checked' : '') . '><br>
                        <div class="buttons">
                            <input class="reset" type="submit" name="delete" value="Pobriši">
                            <input class="submit" type="submit" name="submit" value="Unesi">
                        </div>
                </form>';
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    } else {
        try {
            $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT news.*, category.name as category_name FROM news INNER JOIN category ON news.id_category = category.id";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            print '<div class="content content-page">';
            foreach ($result as $row) {
                print '<article class="article">
                        <img src="' . $row['image'] . '" alt="' . $row['title'] . '"><br>
                        <div class="category ' . $row['category_name'] . '">' . $row['category_name'] . '</div>
                        <a href="administrator.php?id=' . $row['id'] . '&w=e">' . $row['title'] . '</a>
                        <p>' . date('M d,Y', strtotime($row['date'])) . '</p>
                    </article>';
            }
            print '</div>';
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
} else if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['delete'])) {
        $id = $_GET['id'];
        try {
            $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "DELETE FROM news WHERE id = ?";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute([$id])) {
                echo "Novost je uspješno obrisana.";
            } else {
                echo "Došlo je do greške prilikom brisanja novosti.";
            }
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    } else {
        if (isset($_POST["submit"])) {
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];
            $id_category = $_POST['category'];
            $archive = isset($_POST['archive']) ? 1 : 0;
            $file = $_FILES["img_file"];

            try {
                $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                if (isset($file) && $file["error"] === UPLOAD_ERR_OK) {
                    $mime = mime_content_type($file["tmp_name"]);
                    if (!isset($allowedTypes[$mime])) {
                        die("Only JPG and PNG files are allowed");
                    }

                    $img_file_name = strtolower(str_replace(" ", "_", $title));
                    $uploadfile = $GLOBALS['uploaddir'] . $img_file_name . "." . $allowedTypes[$mime];

                    if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
                        echo "Possible file upload attack!\n";
                        print_r($_FILES);
                        return;
                    }

                    $sql = "UPDATE news SET title = ?, description = ?, image = ?, archive = ?, id_category = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    if ($stmt->execute([$title, $content, $uploadfile, $archive, $id_category, $id])) {
                        echo "Novost je uspješno ažurirana.";
                    } else {
                        echo "Došlo je do greške prilikom ažuriranja novosti.";
                    }
                } else {
                    $sql = "UPDATE news SET title = ?, description = ?, archive = ?, id_category = ? WHERE id = ?";
                    $stmt = $conn->prepare($sql);
                    if ($stmt->execute([$title, $content, $archive, $id_category, $id])) {
                        echo "Novost je uspješno ažurirana.";
                    } else {
                        echo "Došlo je do greške prilikom ažuriranja novosti.";
                    }
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        }
    }
}
require_once('footer.php');
?>`