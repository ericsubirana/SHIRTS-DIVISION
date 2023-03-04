<?php

    include __DIR__ . "/../model/m_paginaUsuari.php";
    $filesAbsolutePath = '/home/TDIW/tdiw-g10/public_html/img/users/';
    $img = null;
    $usuari = getUser($_SESSION['email']);


    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $filters = filter_input_array(
            INPUT_POST, [
            'nom' => FILTER_SANITIZE_STRING,
            'cognom' => FILTER_SANITIZE_STRING,
            'password' => FILTER_DEFAULT,
            'email' => FILTER_VALIDATE_EMAIL,
            'direccio' => FILTER_DEFAULT,
            'postal' => FILTER_VALIDATE_INT,
            'ciutat' => FILTER_SANITIZE_STRING,
        ]);

        $nom = $_POST['nom'];
        $cognom = $_POST['cognom'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $email = $_SESSION['email'];
        $ciutat = $_POST['ciutat'];
        $direccio = $_POST['direccio'];
        $codi_postal = $_POST['postal'];

        if (($_FILES['profile_image']["name"] != "") && !empty($_FILES['profile_image']) && ($_FILES['profile_image']["type"] == "image/jpeg")){
            $img = $_SESSION['email'].".jpg";
            $_SESSION['user_img'] = "/img/users/".$img;
            $path = $filesAbsolutePath.$img;

            $img = "../img/users/".$img;
            if(!move_uploaded_file($_FILES['profile_image']['tmp_name'], $path)){?>
                    <script>window.alert("No es posible subir esta imagen. Por favor prueba con otra imagen.")</script>
            <?php }
            if ($_FILES['profile_image']["type"] != "image/jpeg"){?>
                <script>window.alert("No es posible subir esta imagen. Por favor prueba con otra imagen.")</script>
            <?php
                $img = null;
            }
        }

        modifyUser($email, $nom, $cognom, $password, $ciutat, $direccio, $codi_postal, $img);
    }

    include_once __DIR__ . "/../view/v_user.php";
?>