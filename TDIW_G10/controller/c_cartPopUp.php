<?php session_start();

include __DIR__ . "/../model/m_addCart.php";


$mem = printCart();
$row = $mem[0];
$totalPrice = $mem[1];
$numElements = $mem[2];

include_once __DIR__ . "/../view/v_cartPopUp.php"
?>

