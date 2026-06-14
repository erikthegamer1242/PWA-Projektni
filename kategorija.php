<?php
    require_once ('header.php');
    if (isset($_GET['category'])) {
    $category = $_GET['category'] ?? '';
    $sec_class = $category === 'Muzika' ? 'music' : ($category === 'Sport' ? 'sport' : '');
    print '
        <section class="' . $sec_class . '">
            <div class="title">
                <h2>' . $category . '</h2>
                <hr>
            </div>
            <div class="content content-page">';
            try {
                $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT news.* FROM news INNER JOIN category ON news.id_category = category.id WHERE category.name = ? AND news.archive = 0 ORDER BY news.date DESC";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$category]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    print '<article class="article">
                        <img src="' . $row['image'] . '" alt="' . $row['title'] . '"><br>
                        <a href="kategorija.php?id=' . $row['id'] . '">' . $row['title'] . '</a>
                        <p>' . date('M d,Y', strtotime($row['date'])) . '</p>
                    </article>';
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            print '</div>
        </section>';
    } else if (isset($_GET['id'])) {
        $id = $_GET['id'] ?? '';
        try {
            $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "SELECT news.*, category.name as category_name FROM news INNER JOIN category ON news.id_category = category.id WHERE news.id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$id]);
            $news = $stmt->fetch(PDO::FETCH_ASSOC);
            print '<div class="news-content">
                        <img src="' . $news['image'] . '" alt="' . $news['title'] . '"><br>
                        <h2>' . $news['title'] . '</h2>
                        <div class="category ' . $news['category_name'] . '">' . $news['category_name'] . '</div>
                        <div class="date">' . date('M d,Y', strtotime($news['date'])) . '</div>
                        <p>' . nl2br($news['description']) . '</p>
                </div>';
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    } else {
        echo "Nije odabrana kategorija ili novost.";
    }
    require_once ('footer.php');
?>