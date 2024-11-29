<?php
    // Verifica si se presionó el botón "ingresar"
    if (!empty($_POST["btn"])) {
        // Verifica si los campos usuario y contraseña están vacíos
        if (empty($_POST['nombre']) || empty($_POST["dni"]) || empty($_POST["fecha"]) || empty($_POST["hora"]) || empty($_POST['opciones'])) {
            echo "<script type='text/javascript'>alert('Los campos están vacíos');</script>";
        } else {
            include("../../abrirconexion.php");
            // Obtener los valores de los campos de formulario
            $nombre = $_POST['nombre'];
            $dni = $_POST['dni'];
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $mesa = $_POST['opciones'];
            
            // Preparar la consulta para evitar SQL Injection
            $insertar = "INSERT INTO reservas (idMesa,nomcliReserva,DNIcliReserva,fecReserva,hoReserva,idEstado)
                values ('$mesa','$nombre','$dni','$fecha','$hora',1)";
            $query = mysqli_query($enlace,$insertar);
            
            // Verificar si se encontró el usuario y contraseña
            if($query){
                echo '<script> alert("Guardado Correctamente"); </script>';
            }
            else{
                echo '<script> alert("Ha ocurrido un error"); </script>';
            }
        }
    }
?>