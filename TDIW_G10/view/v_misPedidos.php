<?php session_start() ?>

<div id="pagCarrito">
    <h1>MIS PEDIDOS: </h1>
    <?php if($retorn['comandes'] != null){ ?>
        <?php foreach ($retorn['comandes'] as $comanda): ?>
            <div id="dataPedido">
                <label> PEDIDO REALIZADO EL DÍA: <?php echo $comanda['data_creació'] ?></label>
            </div>
            <table id="taulaPedidos">
                <tr>
                    <th>Producto</th><th>Precio</th><th>Descripción</th><th>Cantidad</th><th>Subtotal</th>
                </tr>
                <?php foreach ($retorn['productes_comanda'][$comanda['id']] as $product):?>
                    <tr>
                        <td> <?php echo $retorn['info_productes'][$product['id_producte']][0][nom] ?> </td>
                        <td>  <?php echo $retorn['info_productes'][$product['id_producte']][0][preu] ?> </td>
                        <td> <?php echo $retorn['info_productes'][$product['id_producte']][0][descripcio] ?> </td>
                        <td>
                            <?php echo $product[unitats] ?>
                        </td>
                        <td> <?php echo ($product[unitats]*$retorn['info_productes'][$product['id_producte']][0][preu]) ?>,00 € </td>
                    </tr>
                <?php endforeach; ?>
                <tr><td id="msgCarrito" colspan='4'> El importe total es : <?php echo  $comanda['import_total']  ?>  </td></tr>
            </table>
        <?php endforeach; ?>
    <?php }
    else {?>
        <span id="msgCarrito" colspan='4'>AÚN NO HAS REALIZADO NINGÚN PEDIDO </span>
    <?php } ?>
</div>
