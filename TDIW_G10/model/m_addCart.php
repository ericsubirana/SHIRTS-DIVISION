<?php session_start();

    function getName($idProducte){
        $connect = pg_connect("host=127.0.0.1 port=5432 dbname=tdiw-g10
                                user=tdiw-g10 password=xgcy1xf7") or die ("Could not connect to server\n");
        $sql = 'SELECT nom FROM producte WHERE id = $1';
        $param = [$idProducte];
        $result = pg_query_params($connect, $sql, $param) or die("Cannot execute query producte:");
        $nom = pg_fetch_all($result);
        return $nom;
    }

    function getPreu($idProducte){
        $connect = pg_connect("host=127.0.0.1 port=5432 dbname=tdiw-g10
                                user=tdiw-g10 password=xgcy1xf7") or die ("Could not connect to server\n");
        $sql = 'SELECT preu FROM producte WHERE id = $1';
        $param = [$idProducte];
        $result = pg_query_params($connect, $sql, $param) or die("Cannot execute query producte:");
        $preu = pg_fetch_all($result);
        return $preu;
    }

    function getDescription($idProducte){
        $connect = pg_connect("host=127.0.0.1 port=5432 dbname=tdiw-g10
                                user=tdiw-g10 password=xgcy1xf7") or die ("Could not connect to server\n");
        $sql = 'SELECT descripcio FROM producte WHERE id = $1';
        $param = [$idProducte];
        $result = pg_query_params($connect, $sql, $param) or die("Cannot execute query producte:");
        $desc = pg_fetch_all($result);
        return $desc;
    }

    function printCart(){
        $i = 0;
        $nProductes = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            $row[$i] = $_SESSION['cart'][$key];
            $totalPrice += $_SESSION['cart'][$key][2][0]['preu']*$_SESSION['cart'][$key][1];
            $i++;
            $nProductes +=  $_SESSION['cart'][$key][1];
        }

        $mem[0] = $row;
        $mem[1] = $totalPrice;
        $mem[2] = $i;
        $mem[3] = $nProductes;
        return $mem;
    }

    function addCart($producteInserir, $product_name, $preu, $quantity, $desc){

        if(!isset($_SESSION['cart'][$producteInserir]))
        {
            $_SESSION['cart'][$producteInserir] = [$product_name, 1, $preu, $desc, $producteInserir];
        }
        else
        {
            $_SESSION['cart'][$producteInserir][1] += (int)$quantity;
        }

    }

    function deleteCart()
    {
        unset($_SESSION['cart']);
    }

    function deleteItem($product_id)
    {
        unset($_SESSION['cart'][$product_id]);
    }

    function rmOneShirt($product_id)
    {
        $_SESSION['cart'][$product_id][1]-=1;
    }

    function addOneShirt($product_id)
    {
        $_SESSION['cart'][$product_id][1]+=1;
    }

    function getIdComanda($nProductes, $preu){
        $connect = pg_connect("host=127.0.0.1 port=5432 dbname=tdiw-g10
                                    user=tdiw-g10 password=xgcy1xf7") or die ("Could not connect to server\n");

        //agafem id_usuari a partir del session_email
        $sql = 'SELECT id FROM usuari WHERE usuari.email = $1';
        $param = [$_SESSION['email']];
        $result = pg_query_params($connect, $sql, $param) or die("Cannot execute query usuari:");
        $idUsuari = pg_fetch_all($result);
        //var_dump($idUsuari[0]['id']);

        $sql2 = 'INSERT INTO comanda (id, id_usuari, data_creació, numero_elements, import_total) values (DEFAULT, $1,$2,$3,$4)';
        $params = [$idUsuari[0]['id'], date("d-m-Y H:i"), $nProductes, $preu];
        pg_query_params($connect, $sql2, $params) or die("Cannot execute query:");

        $sql2 = 'SELECT id FROM comanda WHERE comanda.id_usuari = $1 and id = (SELECT max(id) FROM comanda)';
        $param2 = [$idUsuari[0]['id']];
        $result2 = pg_query_params($connect, $sql2, $param2) or die("Cannot execute query comanda:");
        $idComanda = pg_fetch_all($result2);
        return $idComanda;
    }

    function insertProductes($idComanda){
        $connect = pg_connect("host=127.0.0.1 port=5432 dbname=tdiw-g10
                    user=tdiw-g10 password=xgcy1xf7") or die ("Could not connect to server\n");

        foreach ($_SESSION['cart'] as $key => $value) {
            $sql2 = 'INSERT INTO producte_comanda (id_comanda, id_producte, unitats) values ($1,$2,$3)';
            $params = [$idComanda[0]['id'], $key, $_SESSION['cart'][$key][1]];
            pg_query_params($connect, $sql2, $params) or die("Cannot execute query:");
        }
    }

?>