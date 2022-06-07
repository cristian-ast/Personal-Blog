<?php include_once "components/head.php"; ?>

<div class="contenedor_biografia">
    <div class="biografia_cuerpo">
        <?php 
            include "biblioteca.php"; 
            obtenerBiografia();
            echo '<br/> <hr/>';
            echo '<div class="cabecera_blog">';
            echo '<img class="img_blog_logo" src="img/blog logo.png" alt="Foto de Blogs" >';
            echo '<p><b>Blogs más recientes</b></p> <a href="blogs.php" class="boton">Ver más</a> </div>';

            obtener3EntradasDeBlogs();
        ?>

    </div>
</div>

<?php include_once "components/footer.php"; ?>