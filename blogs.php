<?php include_once "components/head.php"; ?>

<div class="contenedor_blogs">
    
    <div class="blogs_cuerpo">

        <div class="top_responsible cabecera_blog">
            <img 
                class="img_blog_logo"
                src="img/blog logo.png"
                alt="Foto de Blogs"
            >
            <p><b>Blogs más recientes</b></p>
        </div>

        <?php 
            include "biblioteca.php"; 
            obtenerEntradasDeBlogs();
        ?>

    </div>
</div>

<?php include_once "components/footer.php"; ?>