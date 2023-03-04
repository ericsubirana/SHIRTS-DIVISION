<html lang="eng">
<head>
    <meta charset="utf-8"/>
    <title> SHIRTS DIVISION </title>
    <link rel="stylesheet" type="text/css" href="../css/botiga.css">
    <link rel="icon" href="img/logo.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=MuseoModerno:wght@200&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b7ec79060b.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script> type="text/javascript" src="<?php echo BASE_URL.'/view/resources/js/jquery-3.4.1.min.js'?>"></script>
</head>

<?php
    session_start();
    if(isset($_SESSION['email'])){
        $email = $_SESSION['email'];
    }
?>

 <body>
 <div id="layout">

     <?php include __DIR__ . '/controller/c_menuSuperior.php'; ?>

     <div class='contingut_pagines'>
         <?php include __DIR__. '/controller/c_paginaPrincipal.php'; ?>
     </div>

     <?php include __DIR__. '/controller/c_peuPagina.php'; ?>

 </div>
 </body>

</html>