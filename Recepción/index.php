<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Reservas</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../Imagenes/logo2.ico">
</head>
<body>
    <h1>Ver Reservas</h1>
    
    <!-- Botón para activar/desactivar alto contraste -->
    <button id="toggle-contrast-btn" onclick="toggleHighContrast()">Modo Alto Contraste</button>


    <div class="main-container">
        <!-- Botones a la izquierda -->
        <div class="buttons">
            <h2>Opciones</h2> 
            <button type="submit" class="botones" onclick="abrircrear()">Crear Reserva</button>
            <button type="button" class="botones" onclick="abrirgestion()">Gestionar Reserva</button>
            <button type="button" class="botones" onclick="document.location.reload();">Actualizar Lista</button>
        </div>

        <!-- Tabla principal en el centro -->
        <table class="tabla">
            <tr>
                <th>ID de la Reserva</th>
                <th>Mesa Reservada</th>
                <th>Nombre del Cliente</th>
                <th>DNI del Cliente</th>
                <th>Fecha de reserva</th>
                <th>Hora de reserva</th>
                <th>Estado de la reserva</th>
            </tr>
            <?php
            include("../abrirconexion.php");
            $sql = "SELECT 
                    r.idReserva,
                    m.codMesa,
                    r.nomcliReserva,
                    r.DNIcliReserva,
                    r.fecReserva,
                    r.hoReserva,
                    e.descEstado 
                    FROM 
                    reservas AS r
                    INNER JOIN 
                    mesa AS m ON m.idMesa = r.idMesa
                    INNER JOIN 
                    estado_reserva AS e ON e.idEstado = r.idEstado
                    WHERE r.idEstado = 1 or r.idEstado = 2";
            $resultado = mysqli_query($enlace, $sql);
            while ($mostrar = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
                <td><?php echo $mostrar['idReserva']; ?></td>
                <td><?php echo $mostrar['codMesa']; ?></td>
                <td><?php echo $mostrar['nomcliReserva']; ?></td>
                <td><?php echo $mostrar['DNIcliReserva']; ?></td>
                <td><?php echo $mostrar['fecReserva']; ?></td>
                <td><?php echo $mostrar['hoReserva']; ?></td>
                <td><?php echo $mostrar['descEstado']; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>

        <!-- Tabla secundaria a la derecha -->
        <table id="tabla2" class="tabla">
            <tr>
                <th>Mesas Disponibles</th>
            </tr>
            <?php
            include("../abrirconexion.php");
            $sql = "SELECT m.codMesa FROM mesa AS m
                    WHERE m.idMesa NOT IN (SELECT r.idMesa FROM reservas AS r WHERE r.idEstado = 1 OR r.idEstado = 2)";
            $resultado = mysqli_query($enlace, $sql);
            while ($mostrar = mysqli_fetch_array($resultado)) {
            ?>
            <tr>
                <td><?php echo $mostrar['codMesa']; ?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>

    <script>
        // Abre una ventana emergente para "Crear Reserva"
        function abrircrear() {
            window.open("CrearReserva/index.php", "Ventana Emergente", "width=600,height=650,resizable=yes,scrollbars=yes");
        }

        // Abre una ventana emergente para "Gestionar Reserva"
        function abrirgestion() {
            window.open("GestionarReserva/index.php", "Ventana Emergente", "width=600,height=600,resizable=yes,scrollbars=yes");
        }

        // Actualiza la página al hacer clic en "Actualizar Lista"
        function actualizarPagina() {
            document.location.reload();
        }

        // Alternar entre modo estándar y alto contraste
        function toggleHighContrast() {
        document.body.classList.toggle('alto-contraste');
        }

    </script>
</body>
</html>
