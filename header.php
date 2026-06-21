<?php
require_once("env.php");
session_start();
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sopitas</title>
</head>
<body>
    <header class="header">
        <a class="logo-link" href="index.php">
            <img src="/img/logo.webp" alt="Sopitas Logo" class="logo">
        </a>
        <nav>
            <a href="index.php">Početna</a>
            <a href="kategorija.php?category=Muzika">Muzika</a>
            <a href="kategorija.php?category=Sport">Sport</a>
            <a href="unos.php">Unos</a>
            <a href="administrator.php">Administracija</a>';
            if (isset($_SESSION['username'])) {
                echo '<a href="logout.php">Odjava</a>';
            }
echo    '</nav>
    </header>
    <main>';

?>