<?php session_start(); ?>

<div id="capçalera">
    <header style="grid-area: info_superior">
        <p>Pàgina web creada per Aleix Casas Barco (1604174) i Èric Subirana Garcia (1603465) - Tecnologies de Desenvolupament d'Internet i Web 2022-23</p>
    </header>
    <div class="menu">
        <section class="logo_inici" style="grid-area: logo_inici">
            <a href="../index.php"> <img src="img/logo.png" height="95px"/></a>
        </section>

        <section class="boto_categories" style="grid-area: boto_categories">
            <ul style="grid-area: menu_categories">
                <li id="boto_categoria" href="index.php?accio=categoria">
                    <a>CATEGORIES</a>
                </li>
            </ul>
        </section>

        <section class="menu_buscar" style="grid-area: menu_buscar">
            <form style="grid-area: menu_buscar">
                <input class="barra_buscar" type="text" placeholder="¿Qué producto quieres buscar?">
                <input type="button" class="boto_buscar" value="BUSCAR">
            </form>
        </section>

        <section class="menu_user" style="grid-area: menu_user">
            <ul id="llista" class="etiqueta_categoria">
                <?php
                if (!isset($_SESSION['email'])){ ?>
                    <li id="amaga"><a href="/index.php?accio=login">Ingresar</a></li>
                    <li id="amaga"><a href="/index.php?accio=registre">Registro</a></li>
                <?php  }
                ?>
                <?php
                if (isset($_SESSION['email'])){ ?>
                    <li id="amaga"><a href="/index.php?accio=user">Mi Cuenta</a></li>
                    <li id="amaga"><a href="/index.php?accio=pedidos">Mis Pedidos</a></li>
                    <li id="amaga"><a href="/index.php?accio=logout">Salir</a></li>
                <?php  }
                ?>

            </ul>

            <img src="../img/icons/user_icon.png" id="button-hide-elements" height="50" width="auto">
            <button id="botoCarrito" onclick="popUpCart()"> <img src="../img/icons/shopping_icon.png" id="button-hide-elements2" height="50" width="auto"> </button>

        </section>
        <script type="text/javascript">
            $(document).ready(function (){
                $('#llista li').hide();
                $('#carrito').hide();
                $('#button-hide-elements').click(function (){
                    $('#llista li#amaga').toggle('slow');
                });
                <?php
                    if(isset($_SESSION['email'])){ ?>
                        $('#button-hide-elements2').click(function (){
                            $('#carrito').toggle();
                        });
                <?php   }
                ?>
            });

            function popUpCart(){
                fetch("/../controller/c_cartPopUp.php")
                    .then(response => { return response.text(); })
                    .then (data => { document.getElementById("carrito").innerHTML= data; });
            }

        </script>
    </div>
</div>

<div id="carrito">

</div>

<div id="categoria" style="grid-area: destacados">
    <?php include __DIR__. "/../controller/c_llistarCategories.php"; ?>
</div>

<script>

    $(document).ready(function(){

        $("#categoria").hide();

        $("#boto_categoria").click(function(){
            $("#categoria").toggle('slow');
            $(".fotosInici").show('slow');
            $(".1").hide('slow');
            $(".2").hide('slow');
            $(".3").hide('slow');
        });
    });

</script>


