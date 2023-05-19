<?php

    $servidor = "localhost";
    $usuario = "root";
    $contrasena = "";
    $bbdd = "discord";

    $conexion = new mysqli($servidor,$usuario,$contrasena, $bbdd, 3306);

    if ($conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    }	

?>