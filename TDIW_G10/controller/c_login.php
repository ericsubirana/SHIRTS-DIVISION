<?php
    session_start();
    include __DIR__ . "/../model/m_paginaUsuari.php";
    $login = logIn();

    if ($login == 'login'){
        session_start();
        $_SESSION['email'] = $_POST['email'];
        include __DIR__ . '/../controller/c_menuSuperior.php';
        include __DIR__ . "/../controller/c_paginaPrincipal.php";
        include __DIR__ . '/../controller/c_peuPagina.php';
    }
    else{
        $_SESSION['email'] = null;
        include __DIR__ . '/../controller/c_menuSuperior.php';
        include __DIR__ . "/../view/v_login.php";
        include __DIR__ . '/../controller/c_peuPagina.php';
    }

?>
