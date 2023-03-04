<?php

    function getPedidos($emailUsuari){
        $connect = pg_connect("host=127.0.0.1 port=5432 dbname=tdiw-g10
                                    user=tdiw-g10 password=xgcy1xf7") or die ("Could not connect to server\n");

        // CONSULTA PER OBTENIR L'ID DE L'USUARI A TRAVÉS DEL SEU EMAIL
        $sql = 'SELECT id FROM usuari WHERE usuari.email = $1';
        $param = [$emailUsuari];
        $result = pg_query_params($connect, $sql, $param) or die("Cannot execute query usuari:");
        $idUsuari = pg_fetch_all($result);

        // CONSULTA PER OBTENIR TOTES LES COMANDES DE L'USUARI
        $sql = 'SELECT * FROM comanda WHERE id_usuari = $1';
        $param = [$idUsuari[0]['id']];
        $result = pg_query_params($connect, $sql, $param) or die("Cannot execute query comanda:");
        $comandes = pg_fetch_all($result);
        $retorn['comandes'] = $comandes;


        foreach ($comandes as $comanda){

            // CONSULTA PER OBTENIR ELS PRODUCTES DE CADA COMANDA
            $sql = 'SELECT * FROM producte_comanda WHERE id_comanda = $1';
            $param = [$comanda['id']];
            $result = pg_query_params($connect, $sql, $param) or die("Cannot execute query producte_comanda:");
            $productes = pg_fetch_all($result);
            $retorn['productes_comanda'][$comanda['id']] = $productes;

            foreach ($productes as $producte){

                // CONSULTA PER OBTENIR TOTA LA INFORMACIÓ DELS PRODUCTES
                $idProducte = $producte['id_producte'];
                $sql = 'SELECT id, nom, preu, descripcio FROM producte WHERE id = $1';
                $param = [$idProducte];
                $result = pg_query_params($connect, $sql, $param) or die("Cannot execute query producte:");
                $producte = pg_fetch_all($result);
                $retorn['info_productes'][$idProducte] = $producte;


            }
        }


        return $retorn;

    }
