<?php
    // index.php

    $accio = $_GET['accio'] ?? NULL;
    session_start();

    switch ($accio) {
        case 'producte':
            include __DIR__.'/controller/c_productes.php';
            break;
        case 'login':
            include __DIR__.'/r_login.php';
            break;
        case 'registre':
            include __DIR__.'/r_registre.php';
            break;
        case 'logout':
            include __DIR__ .'/r_logout.php';
            break;
        case 'cart':
            include __DIR__ .'/r_cart.php';
            break;
        case 'user':
            include __DIR__ .'/r_user.php';
            break;
        case 'pedidos':
            include __DIR__ .'/r_pedidos.php';
            break;
        default:
            include __DIR__.'/r_pagina_principal.php';

    }
?>