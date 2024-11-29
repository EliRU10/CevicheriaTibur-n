<?php 
    $servidor = "sql100.infinityfree.com";
    $usuario = "if0_37611933";
    $clave = "Debocambiar1234";
    $basededatos = "if0_37611933_cevicheria_tiburon";  // Aquí se añadió el punto y coma

    // Creando la conexión
    $enlace = new mysqli($servidor, $usuario, $clave, $basededatos);
    $enlace ->set_charset("utf8");
?>
