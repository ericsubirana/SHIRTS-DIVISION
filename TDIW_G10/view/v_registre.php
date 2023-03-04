<html>
    <section class = "login_register">
        <div class="universeregister" style="grid-area: registerGrid;">
            <form action="" method="post">
                <section class="register">
                    <h5>Formulario Registro</h5>

                    <label for="nom"><b>Nombre</b></label>
                    <input class="controls" type="text" name="nom" placeholder="Nombre" pattern="[A-Za-z]{1,32}" required >

                    <label for="cognom"><b>Apellidos</b></label>
                    <input class="controls" type="text" placeholder="Apellidos" name="cognom" pattern="([a-zA-Z]+\s){0,}([a-zA-Z]+)" required>

                    <label for="email"><b>Correo electrónico</b></label>
                    <input class="controls" type="mail" name="email" placeholder="Correo Electronico" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>

                    <label for="password"><b>Contraseña</b></label>
                    <input class="controls" type="password" name="password" placeholder="Constraseña" required>

                    <label for="direccio"><b>Dirección</b></label>
                    <input class="controls" type="text" placeholder="Dirección" name="direccio" maxlength="30" required>

                    <label for="ciutat"><b>Población</b></label>
                    <input class="controls" type="text" placeholder="Población" name="ciutat" maxlength="30" pattern="([a-zA-Z]+\s){0,}([a-zA-Z]+)" required>

                    <label for="postal"><b>Código Postal</b></label>
                    <input class="controls" type="text" id="postal" placeholder="Codigo Postal" name="postal"  maxlength="5" pattern="[0-9]{4,}([0-9]+)" required>

                    <button type="submit" class="buttons" >Registrarse</button>
                </section>

            </form>
        </div>

    </section>
</html>

