<?php

function ordenarPorRecientes($arrayBlogs) {

    $arrayOrdenado = array();

    for ($i = count($arrayBlogs) - 1; $i >= 0; $i--) { 
        $cuerpo = "\n" . preg_replace("[\n|\r|\n\r]", "", $arrayBlogs[$i]);
        
        $i--;
        $titulo = "\n" .  preg_replace("[\n|\r|\n\r]", "", $arrayBlogs[$i]);

        $i--;
        $fecha = "\n" .  preg_replace("[\n|\r|\n\r]", "", $arrayBlogs[$i]);

        $i--;
        $imagen = "\n" .  preg_replace("[\n|\r|\n\r]", "", $arrayBlogs[$i]);

        $i--;
        if(empty($arrayOrdenado)) {
            $id = preg_replace("[\n|\r|\n\r]", "", $arrayBlogs[$i]);
        } else {
            $id = "\n" . preg_replace("[\n|\r|\n\r]", "", $arrayBlogs[$i]);
        }

        array_push($arrayOrdenado, $id, $imagen, $fecha, $titulo, $cuerpo);

    }

    return $arrayOrdenado;
}

function obtenerBiografia() {

    $biografiaArray = file("data/biografia.txt");

    $contenido = "";
    $contenido .= "<img class='top_responsible img_perfil' src='$biografiaArray[0]' alt='Foto de Cristian'>";

    for ($i=1; $i < count($biografiaArray); $i++) { 
        $contenido .= "<p>";
        $contenido .= $biografiaArray[$i];
        $contenido .= "</p>";
    }

    echo $contenido;
}

function obtener3EntradasDeBlogs() {

    $blogsArrayDesordenado = file("data/blog.txt");
    $blogsArray = ordenarPorRecientes($blogsArrayDesordenado);

    $contenido = "";

    for ($i=0; $i < count($blogsArray); $i++) { 
        
        $contenido .= "<a class='entrada_de_blog' href='blog.php?id=$blogsArray[$i]'>";

        $i++;
        $contenido .= "<img class='imagen_blog' src='$blogsArray[$i]' alt='Imagen del blog' >";
        $contenido .= "<div  class='datos_previos'>";

        $i++;
        $contenido .= "<p>$blogsArray[$i]</p>";
        
        $i++;
        $contenido .= "<p class='titulo_vista'><b>$blogsArray[$i]</b></p>";

        $i++;

        $vistaPrevia = substr($blogsArray[$i], 0, 80) . "...";
        $contenido .= "<p>$vistaPrevia</p>";

        $contenido .= "</div> </a>";

        if($i == 14) {
            break;
        } 
    }

    $contenido .= "<br/>";

    echo $contenido;
}

function obtenerEntradasDeBlogs() {

    $blogsArrayDesordenado = file("data/blog.txt");
    $blogsArray = ordenarPorRecientes($blogsArrayDesordenado);

    $contenido = "";
 
    $pageActual = isset($_GET["page"]) ? $_GET["page"] : 1;

    $posicionInicio = ($pageActual * 25) - 25;
    $posicionFin = ($pageActual * 25);

    $cantidadPaginas = ceil((count($blogsArray) / 5) / 5);

    $paginaAnterior = $pageActual - 1;
    $paginaSiguiente = $pageActual + 1;

    for ($i = $posicionInicio; $i < $posicionFin; $i++) { 

        if($i >= count($blogsArray)) {
            break;
        }
        
        $contenido .= "<a class='entrada_de_blog' href='blog.php?id=$blogsArray[$i]'>";

        $i++;
        $contenido .= "<img class='imagen_blog' src='$blogsArray[$i]' alt='Imagen del blog' >";
        $contenido .= "<div  class='datos_previos'>";

        $i++;
        $contenido .= "<p>$blogsArray[$i]</p>";
        
        $i++;
        $contenido .= "<p class='titulo_vista'><b>$blogsArray[$i]</b></p>";

        $i++;

        $vistaPrevia = substr($blogsArray[$i], 0, 80) . "...";
        $contenido .= "<p>$vistaPrevia</p>";
        
        $contenido .= "</div> </a>";
    }

    $contenido .= "<div id='navegacion'>";

    if($pageActual > 1) {
        $contenido .= "<a class='entrada_de_blog' href='blogs.php?page=$paginaAnterior' id='botonAnterior'> < Anterior </a>";
    }

    for ($i=0; $i < $cantidadPaginas; $i++) { 
        $idBoton = $i + 1;
        $contenido .= "<a class='entrada_de_blog' href='blogs.php?page=$idBoton' id='boton$idBoton' ";

        if($idBoton == $pageActual) {
            $contenido .= " style='background-color : blue; color: white;' ";
        }
        
        $contenido .= " > $idBoton </a>";
    }
    
    if($pageActual < $cantidadPaginas) {
        $contenido .= "<a class='entrada_de_blog' href='blogs.php?page=$paginaSiguiente' id='botonSiguiente' > Siguiente > </a>"; 
    }

    $contenido .= " </div>";
    
    echo $contenido;
}

function obtenerEntradasEditarBlogs() {

    $blogsArrayDesordenado = file("data/blog.txt");
    $blogsArray = ordenarPorRecientes($blogsArrayDesordenado);
    
    $contenido = "";
 
    $pageActual = isset($_GET["page"]) ? $_GET["page"] : 1;

    $posicionInicio = ($pageActual * 25) - 25;
    $posicionFin = ($pageActual * 25);

    $cantidadPaginas = ceil((count($blogsArray) / 5) / 5);

    $paginaAnterior = $pageActual - 1;
    $paginaSiguiente = $pageActual + 1;

    for ($i = $posicionInicio; $i < $posicionFin; $i++) { 

        if($i >= count($blogsArray)) {
            break;
        }
        
        $id = $blogsArray[$i];
        $i++;
        $src = $blogsArray[$i];
        $i++;
        $fecha = $blogsArray[$i];
        $i++;
        $titulo = $blogsArray[$i];
        $i++;
        $parrafo = substr($blogsArray[$i], 0, 70) . "...";

        $contenido .= "<div class='entrada_editar_blog'>"; 
        $contenido .= "<img class='imagen_blog' ";
        $contenido .= "src='$src' ";
        $contenido .= " alt='Sin Imagen'>";
        $contenido .= "<div class='datos_previos'> <p>$fecha</p>";
        $contenido .= "<p class='titulo_vista'><b>$titulo</b></p> ";
        $contenido .= "<p> $parrafo </p> </div> ";
        $contenido .= "<div class='options'>";
        $contenido .= "<a href='editarBlog.php?id=$id'><img src='img/editar.png' alt='Logo editar'></a>";
        $contenido .= "<a href='confirmarCambios.php?process=e&id=$id'><img src='img/borrar.png' alt='Logo borrar'> </a> </div> </div> ";

    }

    $contenido .= "<div id='navegacion'>";

    if($pageActual > 1) {
        $contenido .= "<a class='entrada_de_blog' href='dashboard.php?page=$paginaAnterior' id='botonAnterior'> < Anterior </a>";
    }

    for ($i=0; $i < $cantidadPaginas; $i++) { 
        $idBoton = $i + 1;
        $contenido .= "<a class='entrada_de_blog' href='dashboard.php?page=$idBoton' id='boton$idBoton' ";

        if($idBoton == $pageActual) {
            $contenido .= " style='background-color : blue; color: white;' ";
        }
        
        $contenido .= " > $idBoton </a>";
    }
    
    if($pageActual < $cantidadPaginas) {
        $contenido .= "<a class='entrada_de_blog' href='dashboard.php?page=$paginaSiguiente' id='botonSiguiente' > Siguiente > </a>"; 
    }

    $contenido .= " </div>";
    
    echo $contenido;
}

function mostrarBlog() {

    $blogsArray = file("data/blog.txt");
    $contenido = "";
    $encontrado = false;
    $src = "";
    $fecha = "";
    $titulo = "";
    $parrafos = "";
 
    $id = isset($_GET["id"]) ? $_GET["id"] : -1;

    if($id == -1) {
        echo "<div class='top_responsible parrafos_blog'><p><b>404</b></p></div>";
        return;
    } else {
        for ($i=0; $i < count($blogsArray); $i++) { 
            if($id == $blogsArray[$i]) {
                $encontrado = true;
                $i++;
                $src = $blogsArray[$i];
                $i++;
                $fecha = $blogsArray[$i];
                $i++;
                $titulo = $blogsArray[$i];
                $i++;
                $parrafos = $blogsArray[$i];
                break;
            }
        }

        if($encontrado) {
            $contenido .= "<div class='top_responsible parrafos_blog'><p><b>$fecha</b></p></div>";
            $contenido .= "<div class='img_y_titulo'> <img class='img_blog' src='$src' alt=Imagen de Blog >";
            $contenido .= "<h3>$titulo</h3> </div>";

            $parrafo = explode("|", $parrafos);

            for ($i=0; $i < count($parrafo); $i++) {
                $contenido .= "<div class='parrafos_blog'><p>$parrafo[$i]</p> </div>";
            }
            
            echo $contenido;
        } else {
            echo "<div class='top_responsible parrafos_blog'><p><b>404</b></p></div>";
        }
    }
}

function obtenerFormularioEditarBiografia() {

    $biografiaArray = file("data/biografia.txt");
    $src = $biografiaArray[0];
    $cuerpo = "";
    $contenido = "";
    $claseImagenNuevoBlog = '"imagenNuevoBlog"';
    

    for ($i=1; $i < count($biografiaArray); $i++) { 
        $cuerpo .= $biografiaArray[$i];

        $j = $i + 1;
        if($j < count($biografiaArray)) {
            $cuerpo .= "\n";
        }
    }

    $contenido .= "<form id='editarBiografiaForm' class='formulario' action='confirmarCambios.php?process=d' method='post'>"; 

    $contenido .= "<div class='img_y_titulo'>";
    $contenido .= "<img id='imagenNuevoBlog' class='img_blog' src='$src' alt='Imagen de Blog' >";
    $contenido .= "<p>(Asegúrate de que la Imagen cargue bien antes de Enviar Cambios)</p> </div><br><br>";

    $contenido .= "<div class='div_edict'> ";
    $contenido .= "<label for='imagen'><b>URL Imagen de Perfil <span id='alertImagen' class='alert'>*</span> </b> (Cuadrada, Recomendable 200 x 200) :</label>";
    $contenido .= "<input type='text' name='imagen' id='imagen' value='$src' onchange='setSrc($claseImagenNuevoBlog, this.value)' > </div>";

    $contenido .= "<div class='div_edict'>\n";
    $contenido .= "<label for='cuerpo'><b>Biografía <span id='alertCuerpo' class='alert'>*</span> </b> :</label>\n";
    $contenido .= "<textarea name='cuerpo' id='cuerpo' cols='30' rows='20'>$cuerpo</textarea> </div>\n";

    $contenido .= "<div class='div_edict'>\n";
    $contenido .= "<label for='password'><b>Contraseña <span id='alertPassword' class='alert'>*</span> : </b></label>\n";
    $contenido .= "<input type='password' name='password' id='password' > </div>\n";
        
    $contenido .= "<div class='div_options'>\n";
    $contenido .= "<input type='reset' value='Restablecer'>\n";
    $contenido .= "<input type='submit' value='Enviar'>\n";
    $contenido .= "</div> </form>\n";

    echo $contenido;
}

function obtenerFormularioEditarBlog() {

    $blogsArray = file("data/blog.txt");
    $claseImagenNuevoBlog = '"imagenNuevoBlog"';
    $contenido = "";
    $cuerpo = "";
    $encontrado = false;
    $src = "";
    $titulo = "";
    $parrafos = "";
 
    $id = isset($_GET["id"]) ? $_GET["id"] : -1;

    if($id == -1) {
        echo "<div class='top_responsible parrafos_blog'><p><b>404</b></p></div>";
        return;
    } else {
        for ($i=0; $i < count($blogsArray); $i++) { 
            if($id == $blogsArray[$i]) {
                $encontrado = true;
                $i++;
                $src = $blogsArray[$i];
                $i++;
                $i++;
                $titulo = $blogsArray[$i];
                $i++;
                $parrafos = $blogsArray[$i];

                $parrafo = explode("|", $parrafos);

                for ($i=0; $i < count($parrafo); $i++) { 
                    $cuerpo .= $parrafo[$i];
            
                    $j = $i + 1;
                    if($j < count($parrafo)) {
                        $cuerpo .= "\n\n";
                    }
                }

                break;
            }
        }
    }

    if($encontrado) {
        $contenido .= "<form id='editarBlogForm' class='formulario' action='confirmarCambios.php?process=c&id=$id' method='post'>"; 

        $contenido .= "<div class='img_y_titulo'>";
        $contenido .= "<img id='imagenNuevoBlog' class='img_blog' src='$src' alt='Imagen de Blog'>";
        $contenido .= "<p>(Asegúrate de que la Imagen cargue bien antes de Enviar Cambios)</p> </div> <br><br>";

        $contenido .= "<div class='div_edict'>";
        $contenido .= "<label for='titulo'><b>Título <span id='alertTitulo' class='alert'>*</span> :</b></label>";
        $contenido .= "<input type='text' name='titulo' id='titulo' value='$titulo'> </div>";

        $contenido .= "<div class='div_edict'>";
        $contenido .= "<label for='imagen'><b>URL Imagen <span id='alertImagen' class='alert'>*</span> </b> (Cuadrada, Recomendable 200 x 200) :</label>";
        $contenido .= "<input type='text' name='imagen' id='imagen' value='$src' onchange='setSrc($claseImagenNuevoBlog, this.value)' > </div>";

        $contenido .= "<div class='div_edict'>";
        $contenido .= "<label for='cuerpo'><b>Cuerpo <span id='alertCuerpo' class='alert'>*</span></b> :</label>";
        $contenido .= "<textarea name='cuerpo' id='cuerpo' cols='30' rows='20'>$cuerpo</textarea> </div>";

        $contenido .= "<div class='div_edict'>";
        $contenido .= "<label for='password'><b>Contraseña <span id='alertPassword' class='alert'>*</span> :</b></label>";
        $contenido .= "<input type='password' name='password' id='password'> </div>";

        $contenido .= "<div class='div_options'>";
        $contenido .= "<input type='reset' value='Restablecer'>";
        $contenido .= "<input type='submit' value='Enviar'>";
        $contenido .= "</div> </form>";

    } else {
        echo "<div class='top_responsible parrafos_blog'><p><b>404</b></p></div>";
    }

    echo $contenido;
}

function procesoExitoso($mensaje) {
  
    $contenido = "<div class='top_responsible contenedorMensaje'> <img src='img/exito.png' alt='Logo exito'>";
    $contenido .= "<p>$mensaje</p></div>";

    echo $contenido;
}

function procesoError($mensaje) {
  
    $contenido = "<div class='top_responsible contenedorMensaje'> <img src='img/error.png' alt='Logo exito'>";
    $contenido .= "<p>$mensaje</p></div>";

    echo $contenido;
}


function procesarCambios() {
    
    $passwordArray = file("data/password.txt");
    $blogsArray = file("data/blog.txt");

    $proceso  = isset($_GET["process"]) ? $_GET["process"] : -1;

    if($proceso == 'e') {

        $id = isset($_GET["id"]) ? $_GET["id"] : -1;
        $encontrado = false;

        $src = "";
        $fecha = "";
        $titulo = "";
        $parrafos = "";

        for ($i=0; $i < count($blogsArray); $i++) { 
            if($id == $blogsArray[$i]) {
                $encontrado = true;
                $i++;
                $src = $blogsArray[$i];
                $i++;
                $fecha = $blogsArray[$i];
                $i++;
                $titulo = $blogsArray[$i];
                $i++;
                $parrafos = substr($blogsArray[$i], 0, 120) . "...";
                break;
            }
        }

        if($encontrado) {
            $contenido = "<div class='top_responsible contenedorPregunta'> <img src='img/pregunta.png' alt='Logo exito'>";
            $contenido .= "<p>¿Estas seguro de eliminar la siguiente publicación?</p>";

            $contenido .= "<div class='entrada_editar_blog'>"; 
            $contenido .= "<img class='imagen_blog' ";
            $contenido .= "src='$src' ";
            $contenido .= " alt='Sin Imagen'>";
            $contenido .= "<div class='datos_previos'> <p>$fecha</p>";
            $contenido .= "<p class='titulo_vista'><b>$titulo</b></p> ";
            $contenido .= "<p> $parrafos </p> </div> ";
            $contenido .= "</div> ";

            $contenido .= "<form id='eliminarBlogForm' action='confirmarCambios.php?process=f&id=$id' class='formulario' method='post'>"; 

            $contenido .= "<div class='div_edict'>";
            $contenido .= "<label for='password'><b>Envia la Contraseña para confirmar <span id='alertPassword' class='alert'>*</span> :</b></label>";
            $contenido .= "<input type='password' name='password' id='password'> </div>";

            $contenido .= "<div class='div_options'>";
            $contenido .= "<input type='reset' value='Restablecer'>";
            $contenido .= "<input type='submit' value='Enviar'>";
            $contenido .= "</div> </form></div>";

            echo $contenido;

            return;

        } else {

            procesoError("Error 404");
            return;

        }
    }
    
    $passwordResivida = $_POST['password'];
    
    if($passwordResivida != $passwordArray[0]) {
        procesoError("¡Contraseña Incorrecta!");
        return;
    }
    
    $proceso  = isset($_GET["process"]) ? $_GET["process"] : -1;

    switch ($proceso) {
        case 'a':

            # Cambiar Password
            $passwordNueva = $_POST["passwordNueva"];
            
            file_put_contents("data/password.txt", $passwordNueva);

            procesoExitoso("¡Contraseña cambiada de manera exitosa!");

            break;

        case 'b':
            # Nuevo Blog
            $titulo = $_POST["titulo"];
            $imagen = $_POST["imagen"];
            $cuerpo = $_POST["cuerpo"];
            $ultimoId = $blogsArray[count($blogsArray) - 5];
            $id = $ultimoId + 1;
            $fecha =  date('d-m-Y');

            $nuevoCuerpo = "";

            $arrayCuerpo = explode("\n", $cuerpo);

            for ($i=0; $i < count($arrayCuerpo); $i++) { 

                $cadenalimpia = preg_replace("[\n|\r|\n\r]", "", $arrayCuerpo[$i]);

                if (trim($cadenalimpia) != "") {

                    if(trim($nuevoCuerpo) != "") {
                        $nuevoCuerpo .= "|";
                    }

                    $nuevoCuerpo .= $cadenalimpia;
                }
            }

            $nuevoRegistro = "\n$id\n$imagen\n$fecha\n$titulo\n$nuevoCuerpo";

            file_put_contents("data/blog.txt", $nuevoRegistro, FILE_APPEND);

            procesoExitoso("¡Publicación creada de manera exitosa!");

            break;

        case 'c':
            # Editar Blog
            $id = isset($_GET["id"]) ? $_GET["id"] : -1;
            $fecha = "";

            $posicionSRC = -1;
            $posicionTitulo = -1;
            $posicionCuerpo = -1;

            if($id == -1) {
                procesoError("Error 404");
                return;
            }

            $encontrado = false;

            for ($i=0; $i < count($blogsArray); $i++) { 
                if($id == $blogsArray[$i]) {

                    $encontrado = true;

                    $i++;
                    $posicionSRC = $i;
                    $i++;
                    $i++;
                    $posicionTitulo = $i;
                    $i++;
                    $posicionCuerpo = $i;
                    break;
                }
            }
    
            if($encontrado) {

                $titulo = $_POST["titulo"];
                $imagen = $_POST["imagen"];
                $cuerpo = $_POST["cuerpo"];
                

                $nuevoCuerpo = "";

                $arrayCuerpo = explode("\n", $cuerpo);

                for ($i=0; $i < count($arrayCuerpo); $i++) { 

                    $cadenalimpia = preg_replace("[\n|\r|\n\r]", "", $arrayCuerpo[$i]);

                    if (trim($cadenalimpia) != "") {

                        if(trim($nuevoCuerpo) != "") {
                            $nuevoCuerpo .= "|";
                        }

                        $nuevoCuerpo .= $cadenalimpia;
                    }
                }

                $blogsArray[$posicionSRC] = $imagen . "\n";
                $blogsArray[$posicionTitulo] = $titulo . "\n";
                $blogsArray[$posicionCuerpo] = $nuevoCuerpo . "\n";

                file_put_contents("data/blog.txt", $blogsArray);

                procesoExitoso("¡Publicación modificada de manera exitosa!");

            } else {

                procesoError("Error 404");
                return;
                
            }

            break;

        case 'd':
            # Editar Biografía
            $imagen = $_POST["imagen"];
            $cuerpo = $_POST["cuerpo"];

            $nuevoCuerpo = "";

            $arrayCuerpo = explode("\n", $cuerpo);

            for ($i=0; $i < count($arrayCuerpo); $i++) { 

                $cadenalimpia = preg_replace("[\n|\r|\n\r]", "", $arrayCuerpo[$i]);

                if (trim($cadenalimpia) != "") {

                    if(trim($nuevoCuerpo) != "") {
                        $nuevoCuerpo .= "\n";
                    }

                    $nuevoCuerpo .= $cadenalimpia;
                }
            }

            $nuevaBiografia = $imagen . "\n" . $nuevoCuerpo;

            file_put_contents("data/biografia.txt", $nuevaBiografia);

            procesoExitoso("¡Biografía modificada de manera exitosa!");

            break;
        
        case 'f':
            #Borrar una Publicacion
            $id = isset($_GET["id"]) ? $_GET["id"] : -1;

            $encontrado = false;

            for ($i=0; $i < count($blogsArray); $i++) { 
                if($id == $blogsArray[$i]) {

                    $encontrado = true;
                    $arrayBlogsNuevo = [];

                    $blogsArray[$i] = "";
                    $i++;
                    $blogsArray[$i] = "";
                    $i++;
                    $blogsArray[$i] = "";
                    $i++;
                    $blogsArray[$i] = "";
                    $i++;
                    $blogsArray[$i] = "";

                    for ($j=0; $j < count($blogsArray); $j++) { 

                        $cadenalimpia = preg_replace("[\n|\r|\n\r]", "", $blogsArray[$j]);
                        
                        if (trim($cadenalimpia) != "") {

                            if($j == 0) {
                                $cadenaNueva = $cadenalimpia;
                            } else {
                                $cadenaNueva = "\n" . $cadenalimpia;
                            }
                            
                            array_push($arrayBlogsNuevo, $cadenaNueva);
                        }
                    }

                    file_put_contents("data/blog.txt", $arrayBlogsNuevo);

                    break;
                }
            }
    
            if($encontrado) {
                procesoExitoso("Publicación eliminada de manera exitosa");
            } else {
                procesoError("Error 404");
            }

            break;
                     
        default:
            procesoError("Error 404");
            break;
    }
}