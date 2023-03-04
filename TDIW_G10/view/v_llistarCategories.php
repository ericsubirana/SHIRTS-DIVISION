<ul class="menu_categories" style="grid-area: menu_categories">
    <?php foreach($categories as $categoria): ?>
        <li onclick="categoriaSeleccionada(<?php echo htmlentities($categoria[id], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>)" class="linkCategoria" id="<?php echo $categoria[id]?>" href="index.php?accio=categoria=<?php echo $categoria[id] ?>">
            <a><?php echo htmlentities($categoria['nom'], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?></a>
        </li>
    <?php endforeach; ?>
</ul>


<script>

    function categoriaSeleccionada(IDcategoria){
        $(".fotosInici").hide('slow');
        fetch("controller/c_productes_categories.php?categoria="+IDcategoria)
            .then(response => { return response.text(); })
            .then (data => { document.getElementById("productesXCategoria").innerHTML= data; });
    }

</script>
