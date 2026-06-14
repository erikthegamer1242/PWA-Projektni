<?php
    require_once ('header.php');
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
                $sql = "SELECT * FROM news INNER JOIN category ON news.id_category = category.id WHERE category.name = ? AND news.archive = 0 ORDER BY news.date DESC";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$category]);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    print '<article class="article">
                        <img src="' . $row['image'] . '" alt="' . $row['title'] . '"><br>
                        <a href="news.php?id=' . $row['id'] . '">' . $row['title'] . '</a>
                        <p>' . date('M d,Y', strtotime($row['date'])) . '</p>
                    </article>';
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            print '</div>
        </section>';
    require_once ('footer.php');
?>