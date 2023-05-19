<?php
    $user_id = $_POST['user_id'];

    $server_id = $_POST['server_id'];

    include 'conex_bbdd.php';

    $sql = "INSERT INTO miembros_servidores (servidor_id, usuario_id) VALUES ('$server_id', '$user_id')";

    $conexion->query($sql);

    $conexion->close();
?>