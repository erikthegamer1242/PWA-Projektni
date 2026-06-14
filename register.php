<?php
require_once('header.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password !== $password2) {
        echo "Šifre se ne podudaraju!";
        return;
    }

    try {
        $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "INSERT INTO korisnik (ime, prezime, username, password, razina) VALUES (?, ?, ?, ?, 1)";
        $stmt = $conn->prepare($sql);
        if ($stmt->execute([$fname, $lname, $username, password_hash($password, PASSWORD_DEFAULT)])) {
            echo "Uspješna registracija.";
            echo "<br><a href='login.php'>Povratak na login</a>";
        } else {
            echo "Došlo je do greške prilikom registracije.";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    print '
            <form class="login-form" method="POST">
                <h2>Registracija</h2>
                <label for="fname">Ime:</label><br>
                <input type="text" name="fname" id="fname" placeholder="Ime" required><br>
                <label for="lname">Prezime:</label><br>
                <input type="text" name="lname" id="lname" placeholder="Prezime" required><br>
                <label for="username">Username:</label><br>
                <input type="text" name="username" id="username" placeholder="Username" required><br>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" placeholder="Password" required><br>
                <label for="password2">Ponovite password:</label><br>
                <input type="password" name="password2" id="password2" placeholder="Ponovite password" required><br>
                <div class="buttons">
                    <input class="submit" type="submit" value="Registriraj se">
                </div>
                <a class="login-link" href="login.php">Već imate račun? Prijavite se!</a>
            </form>';
}
require_once('footer.php');