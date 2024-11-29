<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Reserva</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="../../Imagenes/logo2.ico">
</head>
<body>
    <!-- Botón para activar/desactivar alto contraste -->
    <button id="toggle-contrast-btn" onclick="toggleHighContrast()">Modo Alto Contraste</button>

    <div class="container">
        <h2>Formulario de Reserva</h2>
        <form action="" method="post">
            <?php include("guardar.php");?>
            <div class="form-group">
                <label for="nombre">Nombre del Cliente:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese su nombre">
            </div>
            <div class="form-group">
                <label for="dni">DNI del Cliente:</label>
                <input type="text" id="dni" name="dni" placeholder="Ingrese su DNI">
            </div>
            <div class="form-group">
                <label for="fecha">Fecha de Reserva:</label>
                <input type="date" id="fecha" name="fecha">
            </div>
            <div class="form-group">
                <label for="hora">Hora de Reserva:</label>
                <input type="time" id="hora" name="hora">
            </div>
            <div class="form-group">
                <label for="opciones">Elegir Mesa:</label>
                <select id="opciones" name="opciones">
                    <?php
                        include("../../abrirconexion.php");
                        $sql = "SELECT m.idMesa, m.codMesa FROM mesa as m
                                WHERE m.idMesa NOT IN (SELECT r.idMesa FROM reservas as r WHERE r.idEstado = 1 or r.idEstado = 2)";
                        $resultado = mysqli_query($enlace, $sql);
                        while($mostrar = mysqli_fetch_array($resultado)){
                    ?>
                    <option value="<?php echo $mostrar['idMesa']; ?>"><?php echo $mostrar['codMesa']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
            <input type="submit" class="btn" name="btn" value="Reservar">
        </form>
    </div>

    <script>
        function toggleHighContrast() {
            document.body.classList.toggle('alto-contraste');
        }
    </script>
</body>
</html>
