<?php
require_once("header.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $id_category = $_POST['category'];
    $archive = isset($_POST['archive']) ? 1 : 0;
    $file = $_FILES["img_file"];

    try {

        if (!isset($file)) {
            echo "Invalid upload!";
            return;
        }
        $mime = mime_content_type($file["tmp_name"]);

        if (!isset($allowedTypes[$mime])) {
            die("Only JPG and PNG files are allowed");
        }

        $img_file_name = strtolower(str_replace(" ", "_", $title));

        $uploadfile = $GLOBALS['uploaddir'] . $img_file_name . "." . $allowedTypes[$mime];

        echo '<pre>';
        if (!move_uploaded_file($file['tmp_name'], $uploadfile)) {
            echo "Possible file upload attack!\n";
            echo 'Here is some more debugging info:';
            print_r($_FILES);
        }
        print "</pre>";

        $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO news (title, description, image, date, archive, id_category) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$title, $content, $uploadfile, date('Y-m-d'), $archive, $id_category])) {
            echo "Novost je uspješno unesena.";
        } else {
            echo "Došlo je do greške prilikom unosa novosti.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    echo "Invalid req.";
}

require_once('footer.php');