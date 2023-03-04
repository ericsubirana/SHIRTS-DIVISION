<?php session_start(); ?>

<html lang="eng">
<head>
    <meta charset="utf-8"/>
    <title> Log In </title>
    <link rel="stylesheet" type="text/css" href="../css/botiga.css">
    <link rel="icon" href="img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b7ec79060b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

    <body>
    <div id="layout">

        <?php include __DIR__ . '/controller/c_menuSuperior.php'; ?>

        <div class='contingut_pagines'>
            <?php include __DIR__. '/controller/c_cart.php'; ?>
        </div>

        <?php include __DIR__. '/controller/c_peuPagina.php'; ?>

    </div>
    </body>
</html>
