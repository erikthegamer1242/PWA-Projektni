<?php
    require_once('header.php');
    try {
        $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM category";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        print '
                <form enctype="multipart/form-data" class="news-form" action="skripta.php" method="POST">
                    <h2>Unos novosti</h2>
                    <label for="title">Naslov:</label><br>
                    <input type="text" name="title" id="title" placeholder="Naslov" required><br>
                    <label for="summary">Kratki sadržaj:</label><br>
                    <textarea name="summary" id="summary" placeholder="Kratki sadržaj" required></textarea><br>
                    <label for="content">Sadržaj:</label><br>
                    <textarea name="content" id="content" placeholder="Sadržaj" required></textarea><br>
                    <label for="img_file">Slika:</label><br>
                    <input type="file" name="img_file" id="img_file" placeholder="slike" required><br>
                    <label for="category">Kategorija:</label><br>
                    <select name="category" id="category" required>
                        <option value="">Odaberite kategoriju</option>';
                        foreach ($result as $row) {
                            print '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                        }
        print   '</select><br>
                        <label for="archive">Arhiviraj:</label>
                        <input type="checkbox" name="archive" id="archive" value="1"><br>
                        <div class="buttons">
                            <input class="reset" type="reset" value="Poništi">
                            <input class="submit" type="submit" value="Unesi">
                        </div>
                </form>';
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    require_once('footer.php');
?>