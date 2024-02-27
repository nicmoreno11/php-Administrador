<?php
    require_once('clases/class.php');
    $dato = new Trabajo();
    //$datos = $trabajo->iniciar_sesion()
    session_start();
    if(isset($_POST['Enviar'])){
        $email=$_POST['correo'];
        $contraseña=$_POST['contraseña'];
        $dato->iniciar_sesion($email,$contraseña);
    
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="imagenes/corazon.png">
    <link rel="stylesheet" href="Diseño/estilos.css">
    <title>Iniciar sesión</title>
</head>
<body>
    <div class="contenido">
    <section class="formulario">
    <form method="POST" class="formu">
    <h1 class="titulo">Iniciar sesión</h1>
    <div class="cont-form">
        <input type="email" name="correo" class="texto" placeholder="Email" id="">
        <input type="password" name="contraseña" class="texto" id="contraseña" placeholder="Contraseña">
        <img class="" id="showPassword" src="imagenes/ojo.png" name="contraseña" alt="" onclick="togglePasswordVisibility()">
        <input class="texto" type="submit" value="Ingresar" name="Enviar">
        </div>
    </form>
    </section>
    <section class="lado">
        <img src="imagenes/fondoin.jpg" alt="">
    </section>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("contraseña");
            const showPasswordButton = document.getElementById("showPassword");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordButton.textContent = "Ocultar contraseña";
            } else {
                passwordInput.type = "password";
                showPasswordButton.textContent = "Mostrar contraseña";
            }
        }

</script>
</div>
</body>
</html>