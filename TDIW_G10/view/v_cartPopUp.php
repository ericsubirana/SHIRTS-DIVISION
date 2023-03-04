<?php
    if(empty($_SESSION['cart'])){ ?>
        <p id="titolCarrito" style="paragraphCarrito"> TU CESTA ESTÁ VACÍA </p>
    <?php }
    else{ ?>
        <p id="titolCarrito" style="paragraphCarrito"> TU CESTA DE LA COMPRA: </p>
    <?php } ?>

    <div id="productes">
        <?php if(empty($_SESSION['cart'])){ ?>
            <img id="carritIMG" src="/img/carrito.png"  height="250" width="300"">
        <?php }
        else{
            $total_productes = 0;?>
        <table>
            <tr>
                <th>Producto</th><th>Precio</th><th>Cantidad</th>
            </tr>

            <?php foreach ($row as $product):?>
            <tr>
                <td> <?php echo $product[0][0]['nom'] ?> </td>
                <td>  <?php echo $product[2][0]['preu'] ?> </td>
                <td>  <?php echo $product[1] ?> </td>
            </tr>
            <?php
            $total_productes += $product[1];
            endforeach;?>
            <tr><td colspan='4'>Numero total de productos: <?php echo $total_productes ?> </td></tr>
            <tr><td id="msgCarrito" colspan='4'>  <?php echo "El importe total es :  $totalPrice"  ?>,00 €  </td></tr>
        </table>
        <?php } ?>
    </div>

    <a href="index.php?accio=cart" style="buttonCarrito">
        <button type="button" id="botoPagCarrito">
            VER CARRITO
        </button>
    </a>