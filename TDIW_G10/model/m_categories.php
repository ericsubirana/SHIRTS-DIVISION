<?php

    function getProducteCategoria($categoria)
    {
        $connect = pg_connect("host=127.0.0.1 port=5432 dbname=tdiw-g10
                                user=tdiw-g10 password=xgcy1xf7") or die ("Could not connect to server\n");
        $sql = 'SELECT categoria.nom as nomC, producte.nom, producte.imatge, categoria.id, producte.id as idP FROM categoria,producte 
                    WHERE categoria.id = producte.id_categoria AND id_categoria = $1';
        $param = [$categoria];
        $result = pg_query_params($connect, $sql, $param) or die("Cannot execute query producte:");
        //$vars = pg_fetch_all($result);
        //var_dump($vars);
        $productes = pg_fetch_all($result);
        return $productes;
    }

    function getProducteId($id_producte)
    {

        $connect = pg_connect("host=127.0.0.1 port=5432 dbname=tdiw-g10
                                    user=tdiw-g10 password=xgcy1xf7") or die ("Could not connect to server\n");
        $sql = 'SELECT * FROM producte WHERE producte.id = $1';

        $param = [$id_producte];

        $result = pg_query_params($connect, $sql, $param) or die("Cannot execute query producte:");

        //$vars = pg_fetch_all($result);
        //var_dump($vars);

        $productes = pg_fetch_all($result);
        return $productes;
    }

?>
