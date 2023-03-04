<?php session_start() ?>


<h1>PEDIDO REALIZADO CORRECTAMENTE </h1>
<table>

        <tr>
            <th>Producto</th><th>Precio</th><th>Descripción</th><th>Cantidad</th><th>Subtotal</th>
        </tr>
        <?php foreach ($row as $product):?>
            <tr>
                <td> <?php echo $product[0][0]['nom'] ?> </td>
                <td>  <?php echo $product[2][0]['preu'] ?> </td>
                <td> <?php echo $product[3][0]['descripcio'] ?> </td>
                <td>
                    <?php echo $product[1] ?>
                </td>
                <td> <?php echo ($product[1]*$product[2][0]['preu']) ?>,00 € </td>
            </tr>
        <?php endforeach; ?>
        <tr><td id="msgCarrito" colspan='4'>  <?php echo "El importe total es :  $totalPrice"  ?>,00 €  </td></tr>
</table>
