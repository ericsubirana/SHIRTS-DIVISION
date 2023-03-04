<section id="categoria" class="<?php echo $productes[0][id]?>" style="grid-area: destacados" >
    <ul>
        <h2> <?php echo $productes[0][nomc]?> </h2>
        <div>
            <?php foreach($productes as $seleccion): ?>
                <li onclick="producteSeleccionat(<?php echo $seleccion['idp']?>)" id="<?php echo $seleccion['idp']?>" >
                    <img src="<?php echo $seleccion['imatge']?>"height="250px">
                    <p class="etiqueta_categoria"> <?php echo $seleccion['nom'] ?> </p>
                </li>
            <?php endforeach; ?>
        </div>
    </ul>
</section>

<script>
    function producteSeleccionat(IDproducte){
        fetch("controller/c_productes.php?producte_id="+IDproducte)
            .then(response => { return response.text(); })
            .then (data => { document.getElementById("productesXCategoria").innerHTML= data; })
    }
</script>
