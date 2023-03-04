<?php
    include_once __DIR__.'/../model/m_menuSuperior.php';

    $categories = consultaCategories();

    include_once __DIR__.'/../view/v_llistarCategories.php';
?>
