<?php
require_once('header.php');
if (isset($_GET['id'])) {
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
    echo "Nije odabrana novost!";
}