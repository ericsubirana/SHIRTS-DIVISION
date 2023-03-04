<?php

    include __DIR__."/../model/m_categories.php";

    $categoria = $_REQUEST["categoria"];

    $productes = getProducteCategoria($categoria);

    include __DIR__."/../view/v_llistatProductesCategories.php";
    
?>

