<?php
require_once("env.php");
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
        <img src="/img/logo.webp" alt="Sopitas Logo" class="logo">
        <nav>
            <a href="index.php">Početna</a>
            <a href="kategorija.php?category=Muzika">Muzika</a>
            <a href="kategorija.php?category=Sport">Sport</a>
            <a href="unos.php">Unos</a>
            <a href="administrator.php">Administracija</a>
        </nav>
    </header>
    <main>';

?>