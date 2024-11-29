<?php
include('buscar.php'); // Incluir la lógica de la consulta y los resultados
include("validar.php");
include("cancelar.php");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscar Reserva por DNI</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../Imagenes/logo2.ico">
</head>
<body>

    <!-- Botón para activar alto contraste -->
    <button id="toggle-contrast-btn">Activar Alto Contraste</button>

    <h1>Buscar Reserva por DNI</h1>

    <!-- Formulario de búsqueda -->
    <div class="search-container">
        <form method="POST" action="index.php">
            <input type="text" name="dni" placeholder="Ingrese DNI del cliente" value="<?php echo isset($_POST['dni']) ? $_POST['dni'] : ''; ?>">
            <button type="submit">Buscar</button>
        </form>
    </div>

    <!-- Cuadro de resultados -->
    <div class="results-container">
        <?php if (!empty($results)): ?>
            <?php foreach ($results as $row): ?>
                <div class="result-item">
                    <p><strong>ID Reserva:</strong> <?php echo $row['idReserva']; ?></p>
                    <p><strong>Mesa Reservada:</strong> <?php echo $row['codMesa']; ?></p>
                    <p><strong>Cliente:</strong> <?php echo $row['nomcliReserva']; ?></p>
                    <p><strong>DNI Cliente:</strong> <?php echo $row['DNIcliReserva']; ?></p>
                    <p><strong>Fecha Reserva:</strong> <?php echo $row['fecReserva']; ?></p>
                    <p><strong>Hora Reserva:</strong> <?php echo $row['hoReserva']; ?></p>
                    <p><strong>Estado:</strong> <?php echo $row['descEstado']; ?></p>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p><?php echo isset($message) ? $message : 'No se ha realizado ninguna búsqueda aún.'; ?></p>
        <?php endif; ?>
    </div>

    <!-- Botones de Validar y Cancelar -->
    <div class="buttons-container">
        <form method="POST" action="index.php">
            <input type="hidden" name="idReserva" value="<?php echo $row['idReserva']; ?>"> <!-- Corregido -->
            <button type="submit" class="validate-btn" name="validar">Validar</button>
            <button type="submit" class="cancel-btn" name="cancelar">Cancelar</button>
        </form>
    </div>

    <script>
        document.getElementById('toggle-contrast-btn').addEventListener('click', function() {
            document.body.classList.toggle('alto-contraste'); // Cambia el modo de contraste
        });
    </script>
</body>
</html>
