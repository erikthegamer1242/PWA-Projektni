<?php
    require_once ('header.php');
    print '
        <section class="music">
            <div class="title">
                <h2>Muzika</h2>
                <hr>
            </div>
            <div class="content">';
            try {
                $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM news INNER JOIN category ON news.id_category = category.id WHERE category.name = 'Muzika' AND news.archive = 0 ORDER BY news.date DESC LIMIT 3";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    print '<article class="article">
                        <img src="' . $row['image'] . '" alt="' . $row['title'] . '"><br>
                        <a href="music.php?id=' . $row['id'] . '">' . $row['title'] . '</a>
                        <p>' . date('M d,Y', strtotime($row['date'])) . '</p>
                    </article>';
                }
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            print '</div>
        </section>
        <section class="sport">
            <div class="title">
                <h2>Sport</h2>
                <hr>
            </div>
            <div class="content">';
            try {
                $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "SELECT * FROM news INNER JOIN category ON news.id_category = category.id WHERE category.name = 'Sport' AND news.archive = 0 ORDER BY news.date DESC LIMIT 3";
                $stmt = $conn->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $row) {
                    print '<article class="article">
                        <img src="' . $row['image'] . '" alt="' . $row['title'] . '"><br>
                        <a href="sport.php?id=' . $row['id'] . '">' . $row['title'] . '</a>
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