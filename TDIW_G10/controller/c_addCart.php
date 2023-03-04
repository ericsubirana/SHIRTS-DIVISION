<?php session_start();

    $producteInserir = $_REQUEST['producte_id'];
    $_SESSION['cart'][$producteInserir] = 1;

?>
