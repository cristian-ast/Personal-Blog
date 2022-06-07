<?php include_once "components/head.php"; ?>

<div class="contenedor_blogs">
    <div class="blogs_cuerpo">
        
        <h1 class="top_responsible h1_dashboard">Nuevo Blog</h1>
        
        <!-- Importante -->
        <form id="nuevoBlogForm" class="formulario" action="confirmarCambios.php?process=b" method="post">
            <div class='img_y_titulo'>
                <img id="imagenNuevoBlog" class='img_blog' src='img/no-image.png' alt='Imagen de Blog' >
                <p>(Asegúrate de que la Imagen cargue bien antes de Enviar Cambios)</p>
            </div>
            <br><br>
            <div class="div_edict">
                <label for="titulo"><b>Título <span id="alertTitulo" class="alert">*</span> :</b></label>
                <input type="text" name="titulo" id="titulo">
            </div>
            <div class="div_edict">
                <label for="imagen"><b>URL Imagen <span id="alertImagen" class="alert">*</span> </b> (Cuadrada, Recomendable 200 x 200) :</label>
                <input 
                    type="text" 
                    name="imagen" 
                    id="imagen"
                    onchange="setSrc('imagenNuevoBlog', this.value)"
                >
            </div>
            <div class="div_edict">
                <label for="cuerpo"><b>Cuerpo <span id="alertCuerpo" class="alert">*</span> </b> :</label>
                <textarea name="cuerpo" id="cuerpo" cols="30" rows="20"></textarea>
            </div>
            <div class="div_edict">
                <label for="password"><b>Contraseña <span id="alertPassword" class="alert">*</span> :</b></label>
                <input type="password" name="password" id="password">
            </div>
            
            <div class="div_options">
                <input type="reset" value="Borrar">
                <input type="submit" value="Enviar">
            </div>
        </form>
       
    </div>
</div>

<?php include_once "components/footer.php"; ?>