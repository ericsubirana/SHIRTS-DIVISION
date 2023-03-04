<?php session_start(); ?>

<div id="detallProducte">

    <h2 id="nomProd" style="grid-area: nomCamiseta"> <?php echo $producte[0][nom] ?> </h2>
    <img id="imgProd" style="grid-area: imatgeCamiseta" src="<?php echo $producte[0][imatge] ?>" height="377" width="auto">
    <label id="descProd" style="grid-area: descripcioCamiseta"> <?php echo $producte[0][descripcio] ?> </label>
    <label id="preuProd" style="grid-area: preuCamiseta"> <?php echo $producte[0][preu] ?> </label>
    <button id="botoProd" style="grid-area: botoCamiseta" <?php if(isset($_SESSION['email'])){ ?> onclick="insertCart(<?php echo $producte[0][id] ?>)" <?php } ?>>
        <img src="../img/icons/shopping_icon.png">
</div>

<script>

</script>
