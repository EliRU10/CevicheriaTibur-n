<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="Imagenes/logo2.ico">
</head>
<body>
    <div class="imagen">
        <img src="Imagenes/Logo.jpg" alt="Descripción de la imagen" width="70" height="60">
    </div> 
    <div class="formulario">
        <h1>Inicio de Sesión</h1>
        <form method="post" action="">
            <?php
                include("validar.php");
            ?>
            <div class="bloque" id="user">
                <input name="usuario" type="text" placeholder="">
                <label class="luser">Nombre de usuario</label>
            </div>
            <div class="bloque" id="pass">    
                <input name="contraseña" type="password" placeholder="">
                <label>Contraseña</label>
            </div>
            <input type="submit" name="ingresar" value="Iniciar">   
        </form>
    </div>

    <!-- Botón para activar/desactivar modo alto contraste -->
    <button id="toggle-contrast" onclick="toggleContrast()">Modo Alto Contraste</button>

    <script>
        function toggleContrast() {
            document.body.classList.toggle('alto-contraste');
        }
    </script>
</body>
</html>

