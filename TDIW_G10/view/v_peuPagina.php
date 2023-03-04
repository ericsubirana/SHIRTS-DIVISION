<?php session_start(); ?>
<footer>
    <div id="peu_pagina">
        <div class="box">
            <figure>
                <a href="r_pagina_principal.php">
                    <img src="img/logo.png" alt="Logo shirts division">
                </a>
            </figure>
        </div>

        <div class="box">
            <h2>SOBRE NOSOTROS</h2>
            <p>Somos unos estudiantes de Ingenieria Informática de la UAB </p>
            <p>Esta es una tienda online para la asignatura de TDIW</p>
            <h2>SOCIAL</h2>
            <div class="red_social">
                <a href="http://twitter.com" class="fa fa-twitter"></a>
                <a href="https://www.instagram.com/" class="fa fa-instagram"></a>
                <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
            </div>
        </div>

            <?php
            if (isset($_SESSION['email'])){ ?>
        <div class="box">
            <h2> FORMULARIO DE CONTACTO</h2>
            <form class="form_contacte">
                <label for="email">Email:</label><br>
                <input id="email" name="email" type="email" placeholder="ejemplo@email.com"><br>
                <label for="mensaje">Mensaje:</label><br>
                <textarea id="mensaje" name="mensaje" placeholder="Danos tu mensaje"></textarea><br>
                <input id="submit" name="submit" type="submit" value="Enviar">
            </form>
        </div>
            <?php } ?>

    </div>
    <div id="linea_inferior">
        <small>&copy; 2022 <b>Shirts Division</b> - Todos los Derechos Reservados</small>
    </div>
</footer>

