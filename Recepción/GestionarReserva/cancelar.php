<?php
include("../../abrirconexion.php"); // Asegúrate de que la conexión esté bien establecida

if (isset($_POST['cancelar'])) {
    // Verifica si se ha enviado el formulario de validación

    $idReserva = $_POST['idReserva']; // Asume que el ID de la reserva se pasa correctamente en el formulario

    // Preparar la consulta SQL para actualizar el estado
    $stmt = mysqli_prepare($enlace, "UPDATE reservas SET idEstado = 4 WHERE idReserva = ?");
    if ($stmt === false) {
        die('Error al preparar la consulta: ' . mysqli_error($enlace));
    }

    // Vincula el parámetro
    mysqli_stmt_bind_param($stmt, "i", $idReserva);

    // Ejecuta la consulta
    $execute = mysqli_stmt_execute($stmt);
    if ($execute) {
        echo "<script>alert('La reserva ha sido cancelada');</script>";
    } else {
        echo "<script>alert('Error al cancelar la reserva');</script>";
    }

    // Cierra la consulta preparada
    mysqli_stmt_close($stmt);
}
?>