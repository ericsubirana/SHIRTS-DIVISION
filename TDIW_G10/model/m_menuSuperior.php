<?php
    function consultaCategories(): array
    {
        $connect = pg_connect("host=127.0.0.1 port=5432 dbname=tdiw-g10
                    user=tdiw-g10 password=xgcy1xf7") or die ("Could not connect to server\n");
        $sql = 'SELECT * FROM categoria ORDER BY id';

        $result = pg_query($connect, $sql) or die("Cannot execute query:");

        //$vars = pg_fetch_all($result);
        //var_dump($vars);

        return pg_fetch_all($result);
    }
?>