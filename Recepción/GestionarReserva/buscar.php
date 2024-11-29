<?php
include("../../abrirconexion.php"); // Incluir la conexión a la base de datos

$results = [];
if (!empty($_POST['dni'])) {
    $dni = $_POST['dni'];
    $query = "SELECT 
                r.idReserva,
                m.codMesa,
                r.nomcliReserva,
                r.DNIcliReserva,
                r.fecReserva,
                r.hoReserva,
                e.descEstado
              FROM reservas AS r
              INNER JOIN mesa AS m ON m.idMesa = r.idMesa
              INNER JOIN estado_reserva AS e ON e.idEstado = r.idEstado
              WHERE r.DNIcliReserva = 75198769 and r.fecReserva >= NOW()
              ORDER BY r.fecReserva
              LIMIT 1;";

    $result = mysqli_query($enlace, $query);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $results[] = $row;
        }
    } else {
        $message = "No se encontraron reservas para el DNI proporcionado.";
    }
}
?>