<?php
    $user_id = $_POST['user_id'];
    $friend_id = $_POST['friend_id'];

    $sql = "DELETE FROM amistades WHERE (id_usuario = '$user_id' AND id_amigo = '$friend_id') OR (id_usuario = '$friend_id' AND id_amigo = '$user_id')";

    $conexion->query($sql);
    $conexion->close();
    
    header("Location:usuario_inicio.php?user_id=$user_id");

?>