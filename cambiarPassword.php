<?php include_once "components/head.php"; ?>

<div class="contenedor_blogs">
    <div class="blogs_cuerpo">
        
        <h1 class="top_responsible h1_dashboard">Cambiar Contraseña</h1>
        <form id="cambiarPasswordForm" class="formulario" action="confirmarCambios.php?process=a" method="post">
            <div class="div_edict">
                <label for="password">
                    <b>Contraseña Actual <span id="alertPassword" class="alert">*</span> : </b>
                </label>
                <input id="password" type="password" name="password">
            </div>
            <div class="div_edict">
                <label for="passwordNueva"><b>Nueva Contraseña <span id="alertPasswordNueva" class="alert">*</span> : </b></label>
                <input id="passwordNueva" type="password" name="passwordNueva">
            </div>
            <div class="div_edict">
                <label for="passwordNuevaRepetida"><b>Repite la Nueva Contraseña <span id="alertPasswordNuevaRepetida" class="alert">*</span> : </b></label>
                <input id="passwordNuevaRepetida" type="password" name="passwordNuevaRepetida">
            </div>
            
            <div class="div_options">
                <input type="reset" value="Borrar">
                <input type="submit" value="Enviar">
            </div>
        </form>
       
    </div>
</div>

<?php include_once "components/footer.php"; ?>