<?php session_start();

    include __DIR__ . "/../model/m_pedidos.php";
    $retorn = getPedidos($_SESSION['email']);

    include_once __DIR__ . "/../view/v_misPedidos.php";
?>

