<?php
require_once("header.php");
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
require_once("footer.php");