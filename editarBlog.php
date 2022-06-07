<?php include_once "components/head.php"; ?>

<div class="contenedor_blogs">
    <div class="blogs_cuerpo">
        
        <h1 class="top_responsible h1_dashboard">Editar Blog</h1>

        <?php 
            include "biblioteca.php"; 
            obtenerFormularioEditarBlog();
        ?>
       
    </div>
</div>

<?php include_once "components/footer.php"; ?>