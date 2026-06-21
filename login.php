<?php
require_once("header.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    try {
        $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username_db, $password_db);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * FROM korisnik WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $rowsCount = $stmt->rowCount();

        if ($rowsCount > 0 && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['username'] = $user['username'];
            $_SESSION['level'] = $user['razina'];
            $_SESSION['fname'] = $user['ime'];
            $_SESSION['lname'] = $user['prezime'];
            header('Location: administrator.php');
            exit();
        } else {
            echo "Neispravan username ili password!";
        }
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
} else {
    print '
            <form class="login-form" method="POST">
                <h2>Login</h2>
                <label for="username">Username:</label><br>
                <input type="text" name="username" id="username" placeholder="Username" required><br>
                <label for="password">Password:</label><br>
                <input type="password" name="password" id="password" placeholder="Password" required><br>
                <div class="buttons">
                    <input class="submit" type="submit" value="Login">
                </div>
                <a class="login-link" href="register.php">Nemate račun? Registrirajte se!</a>
            </form>';
}
require_once("footer.php");