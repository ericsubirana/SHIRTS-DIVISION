<?php  session_start(); ?>
<div class="llistat" id="a">
</div>

<div class="fotosInici">
    <div style="grid-area: barça">
        <img src="../img/inicial_barça.png" width="750" height="450">
    </div>
    <div style="grid-area: madrid">
        <img src="../img/inicial_madrid.jpg" width="750" height="450">
    </div>

    <div style="grid-area: city">
        <img src="../img/inicial_city.jpg" width="750" height="450">
    </div>
    <div style="grid-area: psg">
        <img src="../img/inicial_psg.jpg" width="750" height="450" >
    </div>
</div>

<div id="productesXCategoria" style="grid-area: destacados">
    <?php include __DIR__.'/../controller/c_productes_categories.php'; ?>
</div>

<script>
    function insertCart(IDproducte){ //V_PRODUCTE
        window.alert("PRODUCTO AÑADIDO CORRECTAMENTE A LA CESTA");
        fetch("controller/c_cart.php?id_producte="+IDproducte)
            /*.then(response => { return response.text(); })
            .then (data => { document.getElementById("productesXCategoria").innerHTML= data; })*/;
    }

    $(document).ready(function(){
        $(".fotosInici").show();
    });

</script>

</head>
<body>

