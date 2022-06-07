function $(element_id) {
    return document.getElementById(element_id);
}

function setSrc(element_id, src) {
    var element = $(element_id);
    if(src.trim() == "") {
        element.src = 'img/no-image.png';
    } else {
        element.src = src;
    }
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("cambiarPasswordForm").addEventListener('submit', validarPassword); 
});

function validarPassword(evento) {
    evento.preventDefault();

    var passwordActual =  document.getElementById('password').value;
    const alertPassword =  document.getElementById('alertPassword');
    const inputPasswordActual = document.getElementById('password');

    var passwordNueva =  document.getElementById('passwordNueva').value;
    const inputPasswordNueva = document.getElementById('passwordNueva');
    const alertPasswordNeva = document.getElementById('alertPasswordNueva');

    var passwordNuevaRepetida =  document.getElementById('passwordNuevaRepetida').value;
    const inputPasswordNuevaRepetida = document.getElementById('passwordNuevaRepetida');
    const alertPasswordNuevaRepetida = document.getElementById('alertPasswordNuevaRepetida');

    // Formatendalo en caso de no haber error
    inputPasswordActual.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertPassword.textContent = ' * ';

    inputPasswordNueva.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertPasswordNeva.textContent = ' * ';

    inputPasswordNuevaRepetida.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertPasswordNuevaRepetida.textContent = ' * ';


    if(passwordActual.length < 8) {
        inputPasswordActual.style.border = '1px solid red'; 
        alertPassword.textContent = ' * Mínimo 8 caracteres requeridos';
        return;
    }

    if(passwordNueva.length < 8) {
        inputPasswordNueva.style.border = '1px solid red'; 
        alertPasswordNeva.textContent = ' * Mínimo 8 caracteres requeridos';
        return;
    }

    if(passwordNuevaRepetida.length < 8) {
        inputPasswordNuevaRepetida.style.border = '1px solid red'; 
        alertPasswordNuevaRepetida.textContent = ' * Mínimo 8 caracteres requeridos';
        return;
    }

    if(passwordNuevaRepetida != passwordNueva) {
        inputPasswordNuevaRepetida.style.border = '1px solid red'; 
        alertPasswordNuevaRepetida.textContent = ' * Ambas contraseñas deben ser iguales';
        return;
    }

    this.submit();
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("nuevoBlogForm").addEventListener('submit', validarNuevoBlog); 
});

function validarNuevoBlog(evento) {
    evento.preventDefault();

    var titulo =  document.getElementById('titulo').value;
    const tituloInput  =  document.getElementById('titulo');
    const alertTitulo =  document.getElementById('alertTitulo');

    var imagen =  document.getElementById('imagen').value;
    const imagenInput  =  document.getElementById('imagen');
    const alertImagen =  document.getElementById('alertImagen');

    var cuerpo =  document.getElementById('cuerpo').value;
    const cuerpoInput  =  document.getElementById('cuerpo');
    const alertCuerpo =  document.getElementById('alertCuerpo');

    var password =  document.getElementById('password').value;
    const passwordInput = document.getElementById('password');
    const alertPassword =  document.getElementById('alertPassword');

    // Formatendalo en caso de no haber error
    tituloInput.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertTitulo.textContent = ' * ';

    imagenInput.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertImagen.textContent = ' * ';

    cuerpoInput.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertCuerpo.textContent = ' * ';

    passwordInput.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertPassword.textContent = ' * ';

    if(titulo.trim() == "") {
        alertTitulo.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
        tituloInput.style.border = '1px solid red'; 
        alertTitulo.textContent = ' * Campo requerido';
        return;
    }

    if(imagen.trim() == "") {
        alertImagen.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
        imagenInput.style.border = '1px solid red'; 
        alertImagen.textContent = ' * Campo requerido';
        return;
    }

    if(cuerpo.trim() == "") {
        alertCuerpo.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
        cuerpoInput.style.border = '1px solid red'; 
        alertCuerpo.textContent = ' * Campo requerido';
        return;
    }
    
    if(password.length < 8) {
        alertPassword.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
        passwordInput.style.border = '1px solid red'; 
        alertPassword.textContent = ' * Mínimo 8 caracteres requeridos';
        return;
    }

    this.submit();
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("editarBlogForm").addEventListener('submit', validarEditarBlog); 
});

function validarEditarBlog(evento) {
    evento.preventDefault();

    var titulo =  document.getElementById('titulo').value;
    const tituloInput  =  document.getElementById('titulo');
    const alertTitulo =  document.getElementById('alertTitulo');

    var imagen =  document.getElementById('imagen').value;
    const imagenInput  =  document.getElementById('imagen');
    const alertImagen =  document.getElementById('alertImagen');

    var cuerpo =  document.getElementById('cuerpo').value;
    const cuerpoInput  =  document.getElementById('cuerpo');
    const alertCuerpo =  document.getElementById('alertCuerpo');

    var password =  document.getElementById('password').value;
    const passwordInput = document.getElementById('password');
    const alertPassword =  document.getElementById('alertPassword');

    // Formatendalo en caso de no haber error
    tituloInput.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertTitulo.textContent = ' * ';

    imagenInput.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertImagen.textContent = ' * ';

    cuerpoInput.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertCuerpo.textContent = ' * ';

    passwordInput.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertPassword.textContent = ' * ';

    if(titulo.trim() == "") {
        alertTitulo.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
        tituloInput.style.border = '1px solid red'; 
        alertTitulo.textContent = ' * Campo requerido';
        return;
    }

    if(imagen.trim() == "") {
        alertImagen.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
        imagenInput.style.border = '1px solid red'; 
        alertImagen.textContent = ' * Campo requerido';
        return;
    }

    if(cuerpo.trim() == "") {
        alertCuerpo.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
        cuerpoInput.style.border = '1px solid red'; 
        alertCuerpo.textContent = ' * Campo requerido';
        return;
    }
    
    if(password.length < 8) {
        alertPassword.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
        passwordInput.style.border = '1px solid red'; 
        alertPassword.textContent = ' * Mínimo 8 caracteres requeridos';
        return;
    }

    this.submit();
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("editarBiografiaForm").addEventListener('submit', validarEditarBiografia); 
});

function validarEditarBiografia(evento) {
    evento.preventDefault();

    var imagen =  document.getElementById('imagen').value;
    const imagenInput  =  document.getElementById('imagen');
    const alertImagen =  document.getElementById('alertImagen');

    var cuerpo =  document.getElementById('cuerpo').value;
    const cuerpoInput  =  document.getElementById('cuerpo');
    const alertCuerpo =  document.getElementById('alertCuerpo');

    var password =  document.getElementById('password').value;
    const passwordInput = document.getElementById('password');
    const alertPassword =  document.getElementById('alertPassword');

    // Formatendalo en caso de no haber error
    imagenInput.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertImagen.textContent = ' * ';

    cuerpoInput.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertCuerpo.textContent = ' * ';

    passwordInput.style.border = '0.5px solid rgb(202, 202, 202)'; 
    alertPassword.textContent = ' * ';

    if(imagen.trim() == "") {
        alertImagen.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
        imagenInput.style.border = '1px solid red'; 
        alertImagen.textContent = ' * Campo requerido';
        return;
    }

    if(cuerpo.trim() == "") {
        alertCuerpo.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
        cuerpoInput.style.border = '1px solid red'; 
        alertCuerpo.textContent = ' * Campo requerido';
        return;
    }
    
    if(password.length < 8) {
        alertPassword.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
        passwordInput.style.border = '1px solid red'; 
        alertPassword.textContent = ' * Mínimo 8 caracteres requeridos';
        return;
    }

    this.submit();
}

document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("eliminarBlogForm").addEventListener('submit', validarBorrarBlog); 
});

function validarBorrarBlog(evento) {
    evento.preventDefault();

    var password =  document.getElementById('password').value;
    const passwordInput = document.getElementById('password');
    const alertPassword =  document.getElementById('alertPassword');

    if(password.length < 8) {
        alertPassword.scrollIntoView({
            behavior: "smooth",
            block: "start",
            inline: "nearest"
        });
        passwordInput.style.border = '1px solid red'; 
        alertPassword.textContent = ' * Mínimo 8 caracteres requeridos';
        return;
    }

    this.submit();
}