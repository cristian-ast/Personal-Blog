<?php include_once "components/head.php"; ?>

<div class="contenedor_blogs">
    <div class="blogs_cuerpo">
        
        <h1 class="top_responsible h1_dashboard">Administar</h1>
        
        <div class="contenedor_configuraciones">
            <a href="nuevoBlog.php"><button class="boton_submit">Nuevo Blog</button></a>
            <a href="editarbiografia.php"><button class="boton_submit">Editar Biografía</button></a>
            <a href="cambiarPassword.php"><button class="boton_submit">Cambiar Contraseña</button></a>
        </div>

        <div>
            <h2 class="h2_dashboard">Editar Blogs</h2>

            <?php 
                include "biblioteca.php"; 
                obtenerEntradasEditarBlogs();
            ?>
            
        </div>
    </div>
</div>

<?php include_once "components/footer.php"; ?>