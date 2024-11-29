<?php
    // Verifica si se presionó el botón "ingresar"
    if (!empty($_POST["ingresar"])) {
        // Verifica si los campos usuario y contraseña están vacíos
        if (empty($_POST["usuario"]) || empty($_POST["contraseña"])) {
            echo "<script type='text/javascript'>alert('Los campos están vacíos');</script>";
        } else {
            include("abrirconexion.php");
            // Obtener los valores de los campos de formulario
            $usuario = $_POST["usuario"];
            $contraseña = $_POST["contraseña"];
            
            // Preparar la consulta para evitar SQL Injection
            $stmt = $enlace->prepare("SELECT NomUsuario, contraseña FROM usuarios WHERE nomUsuario = ? AND contraseña = ? AND estUsuario ='1'");
            $stmt->bind_param("ss", $usuario, $contraseña); // "ss" significa que ambos parámetros son de tipo string
            $stmt->execute();
            $resultado = $stmt->get_result();
            
            // Verificar si se encontró el usuario y contraseña
            if ($datos = $resultado->fetch_object()) {
                // Redirige al usuario si las credenciales son correctas
                header("Location: Recepción/index.php");
                exit();
            } else {
                // Muestra un mensaje si no se encontró la cuenta
                echo "<script type='text/javascript'>alert('No se encontró la cuenta solicitada');</script>";
            }
        }
    }
?>
