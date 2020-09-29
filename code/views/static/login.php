<?php
require('allconfig.php');
?>
<div class="d-flex vh-100">
    <div class="d-flex w-100 justify-content-center align-self-center">
            <form action="/" method="POST" class="justify-content-center">
                <div class=" form-group">
                    <label for="idusuario" class="col-form-label">Administrador:</label>
                    <input value="<?php echo $admin_name;?>" maxlength="24" type="text" class="form-control" id="idusuario" name="idusuario">
                </div>
                <div class=" form-group">
                    <label for="passwordusuario" class="col-form-label">Contraseña:</label>
                    <input value="<?php echo $admin_pass;?>" maxlength="18" type="password" class="form-control" id="passwordusuario" name="passwordusuario">
                </div>
                <div class=" modal-footer">
                    <input type="submit" class="btn btn-primary" value="Ingresar">
                </div>
            </form>
    </div>
</div>
