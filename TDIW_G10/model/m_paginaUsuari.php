<?php
    function logIn(){
        $return = 'n';

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correu = $_POST['email'];
            $contrasenya = $_POST['contrasenya'];
            $connect = pg_connect("host=127.0.0.1 port=5432 dbname=tdiw-g10
                    user=tdiw-g10 password=xgcy1xf7") or die ("Could not connect to server\n");

            $sql = 'SELECT contrasenya FROM usuari WHERE usuari.email = $1';
            $param = [$correu];
            $result = pg_query_params($connect, $sql, $param) or die("Cannot execute query producte:");

            $vars = pg_fetch_all($result);

            if (password_verify($contrasenya, $vars[0]["contrasenya"])) {
                $return = 'login';
            } else {
                echo 'Invalid password or email.';
            }

        }
        return $return;
    }

    function getUser($usuari){
        $connect = pg_connect("host=127.0.0.1 port=5432 dbname=tdiw-g10
                                    user=tdiw-g10 password=xgcy1xf7") or die ("Could not connect to server\n");
        $sql = 'SELECT * FROM usuari WHERE usuari.email = $1';
        $param = [$usuari];

        $result = pg_query_params($connect, $sql, $param) or die("Cannot execute query producte:");

        $result = pg_fetch_all($result);
        return $result;
    }

    function modifyUser($email, $nom, $cognom, $password, $ciutat, $direccio, $codi_postal, $imatge){

        $connect = pg_connect("host=127.0.0.1 port=5432 dbname=tdiw-g10
                    user=tdiw-g10 password=xgcy1xf7") or die ("Could not connect to server\n");
        $sql = "UPDATE usuari SET nom=$1, cognom=$2, contrasenya=$3, poblacio=$4, direccio=$5, codi_postal=$6 WHERE email=$7";
        $params = [$nom,$cognom,$password,$ciutat,$direccio,$codi_postal,$email];
        $res = pg_query_params($connect, $sql, $params)or die("Cannot execute query:");

        if ($res){
            echo "DADES D'USUARI MODIFICADES CORRECTAMENT";
        }
        //var_dump($imatge);
        if($imatge != null){
            $sql = 'UPDATE usuari SET foto=$1 WHERE email=$2';
            $params = [$imatge,$email];
            var_dump(pg_query_params($connect, $sql, $params)or die("Cannot execute query:"));
        }
    }

?>



