<?php
    include_once __DIR__.'/../model/m_categories.php';

    $idProducte = $_REQUEST["producte_id"];

    $producte = getProducteId($idProducte);

    include __DIR__.'/../view/v_productes.php';
?>