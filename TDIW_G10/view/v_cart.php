<?php session_start() ?>
<div id="cart">
    <div id="pagCarrito">
        <h1>TU CESTA DE LA COMPRA: </h1>
        <table>
            <?php if(empty($_SESSION['cart'])){ ?>
                <tr><td id="msgCarrito" colspan='4'>Tu carrito está vacio</td></tr>
            <?php }
            else{ ?>
                <tr>
                    <th>Producto</th><th>Precio</th><th>Descripción</th><th>Cantidad</th><th>Subtotal</th>
                </tr>
                <?php foreach ($row as $product):?>
                    <tr>
                        <td> <?php echo $product[0][0]['nom'] ?> </td>
                        <td>  <?php echo $product[2][0]['preu'] ?> </td>
                        <td> <?php echo $product[3][0]['descripcio'] ?> </td>
                        <td>
                            <button class="modifQuant" onclick="rmCamiseta(<?php echo $product[4] ?> , '<?php echo $product[1] ?>')"> - </button>
                            <?php echo $product[1] ?>
                            <button class="modifQuant" onclick="addCamiseta(<?php echo $product[4] ?>)"> + </button>
                        </td>
                        <td> <?php echo ($product[1]*$product[2][0]['preu']) ?>,00 € </td>
                        <td> <button class="eliminarProducte" on onclick="rmProducte(<?php echo $product[4] ?>)"> <img src="../img/icons/trash_icon.png"></button> </td>
                    </tr>
                <?php endforeach; ?>
                <tr><td id="msgCarrito" colspan='4'>  <?php echo "El importe total es :  $totalPrice"  ?>,00 €  </td></tr>
            <?php } ?>
        </table>
        <button id="botoPagCarrito" onclick="borrarCarrito()">VACIAR CARRITO</button>
        <button id="botoPagCarrito" onclick="tramitarPedido(<?php echo $mem[3] ?>, <?php echo $mem[1] ?>)">TRAMITAR PEDIDO </button>
    </div>
</div>


<script>

    async function borrarCarrito() { //V_PRODUCTE
        //window.alert("CARRITO VACIADO CORRECTAMENTE");
        await fetch("controller/c_cart.php?borrar_cistella=" + 1)
            .then(response => { return response.text(); })
            .then (data => { document.getElementById("cart").innerHTML= data; });
    }

    async function addCamiseta(idProduct){
        //window.alert("CANTIDAD INCREMENTADA CORRECTAMENTE");
        await fetch("controller/c_cart.php?addOne_producte="+idProduct)
            .then(response => { return response.text(); })
            .then (data => { document.getElementById("cart").innerHTML= data; });
    }

    async function rmCamiseta(idProduct, quantitat){
        //window.alert("CANTIDAD DECREMENTADA CORRECTAMENTE");
        if(quantitat == '1'){
            await fetch("controller/c_cart.php?rm_producte="+idProduct)
                .then(response => { return response.text(); })
                .then (data => { document.getElementById("cart").innerHTML= data; });
        }else{
            await fetch("controller/c_cart.php?rmOne_producte="+idProduct)
                .then(response => { return response.text(); })
                .then (data => { document.getElementById("cart").innerHTML= data; });
        }
    }

    async function rmProducte(idProduct){
        //window.alert("PRODUCTO ELIMINADO CORRECTAMENTE");
        await fetch("controller/c_cart.php?rm_producte="+idProduct)
            .then(response => { return response.text(); })
            .then (data => { document.getElementById("cart").innerHTML= data; });
    }

    async function tramitarPedido(nProductes, importTotal){  //V_PRODUCTE
        if(nProductes > 0){
            window.alert("TU PEDIDO ESTÁ SIENDO TRAMITADO")
            await fetch("controller/c_cart.php?process_order="+nProductes+'&preu='+importTotal)
                .then(response => { return response.text(); })
                .then (data => { document.getElementById("pagCarrito").innerHTML= data; });
        }else{
            window.alert("AÑADE UN PRODUCTO A LA CESTA PARA PODER TRAMITAR TU PEDIDO")
        }
    };
    
</script>
</html>


