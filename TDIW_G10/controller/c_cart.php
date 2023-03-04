<?php session_start();

    include __DIR__ . "/../model/m_addCart.php";
    //insert product on comanda_producte i augmentar en 1 els productes de la comanda
    if (isset($_REQUEST["id_producte"])){
        addCart($_REQUEST["id_producte"], getName($_REQUEST["id_producte"]), getPreu($_REQUEST["id_producte"]), (float) 1, getDescription($_REQUEST["id_producte"]));
        var_dump($_REQUEST["id_producte"]);
    }

    if (isset($_REQUEST["borrar_cistella"])){
        deleteCart();
    }

    if (isset($_REQUEST["rm_producte"])){
        deleteItem($_REQUEST["rm_producte"]);
    }

    if (isset($_REQUEST["rmOne_producte"])){
        rmOneShirt($_REQUEST["rmOne_producte"]);
    }

    if (isset($_REQUEST["addOne_producte"])){
        addOneShirt($_REQUEST["addOne_producte"]);
    }



    //var_dump($_REQUEST["id_producte"]);
    //var_dump($_SESSION['cart']);

    /*if(isset($_REQUEST["rm_producte"])){
        removeCamiseta($_REQUEST["rm_producte"]);
    }

    if(isset($_REQUEST["id_borrar"])){
        removeCart(getIdComanda());
    }*/

    //inicialize Session (SELECT dels q tinguin la id_usuari per agafar la id de la comanda i despres cercar per comanda_producte els productes)
    /*inicializeSession();*/

    //printCart() (imprimir-ho per pantalla tot)

    $mem = printCart();
    $row = $mem[0];
    $totalPrice = $mem[1];
    $numElements = $mem[2];

    if (isset($_REQUEST["process_order"])){
        $idComanda = getIdComanda($_REQUEST["process_order"], $_REQUEST["preu"]);
        insertProductes($idComanda);
        deleteCart();
        include_once __DIR__ . "/../view/v_confirmacioPedido.php";
    }else{
        include __DIR__ . "/../view/v_cart.php";

    }

?>
