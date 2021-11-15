<?php
if (isset($_SESSION['idCliente'])) {
?>
    <div class="container mt-3">
        <div class="row">
            <div class="col-6">
                <h3>Datos del cliente</h3>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombreCli" id="nombreCli" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="emailCli" id="emailCli" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Dirección</label>
                    <textarea name="direccionCli" id="direccionCli" class="form-control" row="3"></textarea>
                </div>
            </div>
            <div class="col-6">
                <h3>Datos del destinatario</h3>
                <div class="form-group">
                    <label for="">Nombre</label>
                    <input type="text" name="nombreRec" id="nombreRec" class="form-control"> 
                    <!-- nombreRec: Rec es de recibe -->
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" name="emailRec" id="emailRec" class="form-control">
                </div>
                <div class="form-group">
                    <label for="">Dirección</label>
                    <textarea name="direccionRec" id="direccionRec" class="form-control" row="3"></textarea>
                </div>
                <div class="form-check">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input" id="jalar" >
                    Completar con los datos del cliente.
                  </label>
                </div>
            </div>
        </div>
    </div>
<?php
} else {
?>
    <div class="mt-5 text-center">
        Debe <a href="login.php">iniciar sesión</a> o <a href="registro.php">registrarse</a>
    </div>
<?php

}
?> 