<?php
include 'conex_bbdd.php';

$user_id = $_POST['user_id'];

$sql = "UPDATE usuarios SET activity = 0 WHERE user_id = '$user_id'";
$resultado = $conexion->query($sql);

$conexion->close();
?>