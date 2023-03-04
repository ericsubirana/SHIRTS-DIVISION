<div id="pagCarrito">
    <form action="" method="post" enctype="multipart/form-data">
        <h1>Formulario Modificación de Perfil</h1>
        <div id="fotoNom" >
            <div id="contingut">
                <img id="imgUser" style="grid-area: imatgeCamiseta" src="
                    <?php if($usuari[0][foto] == null){
                    echo "../img/users/default.png"; }else{
                    echo htmlentities($usuari[0][foto], ENT_QUOTES | ENT_HTML5, 'UTF-8'); }?>" height="150">
                <h2 id="nomUsuari" > <?php echo htmlentities($usuari[0][nom], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>
                    <?php echo htmlentities($usuari[0][cognom], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?> </h2>
            </div>
        </div>

            <label for="nom"><b>Nombre</b></label>
            <input class="controls" type="text" name="nom" value="<?php echo htmlentities($usuari[0][nom], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" placeholder="Nombre" pattern="[A-Za-z]{1,32}" required >

            <label for="cognom"><b>Apellidos</b></label>
            <input class="controls" type="text" value="<?php echo htmlentities($usuari[0][cognom], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" placeholder="Apellidos" name="cognom" pattern="([a-zA-Z]+\s){0,}([a-zA-Z]+)" required>

            <label for="password"><b>Contraseña</b></label>
            <input class="controls" type="password" name="password" placeholder="Constraseña" required>

            <label for="direccio"><b>Dirección</b></label>
            <input class="controls" type="text" value="<?php echo htmlentities($usuari[0][direccio], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" placeholder="Dirección" name="direccio" maxlength="30" required>

            <label for="ciutat"><b>Población</b></label>
            <input class="controls" type="text" value="<?php echo htmlentities($usuari[0][poblacio], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" placeholder="Población" name="ciutat" maxlength="30" pattern="([a-zA-Z]+\s){0,}([a-zA-Z]+)" required>

            <label for="postal"><b>Código Postal</b></label>
            <input class="controls" type="text" id="postal" value="<?php echo htmlentities($usuari[0][codi_postal], ENT_QUOTES | ENT_HTML5, 'UTF-8') ?>" placeholder="Codigo Postal" name="postal"  maxlength="5" pattern="[0-9]{4,}([0-9]+)" required>

            <label for="profile_image"><b>Foto de Perfil</b></label>
            <input type="file" name="profile_image">

            <button type="submit" class="buttons" >Actualizar datos</button>
        </section>
    </form>
</div>
