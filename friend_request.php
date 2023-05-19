<?php
    include 'conex_bbdd.php';

    $user_id = $_POST['user_id'];

    $friend_info = $_POST['friend_info'];

    $partes = explode("#", $friend_info);

    $friend_user = $partes[0];

    $friend_code = $partes[1];

	$sql = "SELECT user_id FROM usuarios WHERE username like '$friend_user' AND user_code like '$friend_code'";

	$resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
            $friend_id = $fila['user_id'];
        }
        echo $friend_id;
        echo $user_id;
        echo "<br>";

        $sql = "SELECT * FROM amistades WHERE id_usuario = '$user_id' AND id_amigo = '$friend_id'";
        $resultado = $conexion->query($sql);
        
        if($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                $estado = $fila['estado'];
            }
            if($estado == 2){
                echo "bloqueado";
            }
            if($estado == 1){
                echo "ya amigos";
            }
            //$sql = "UPDATE amistades SET estado = 0 WHERE id_usuario = '$user_id' AND id_amigo = '$friend_id'";
        } else {
            $sql = "SELECT * FROM amistades WHERE id_usuario = '$friend_id' AND id_amigo = '$user_id'";
            $resultado = $conexion->query($sql);
            if($resultado->num_rows > 0){
                while($fila = $resultado->fetch_assoc()) {
                    $estado = $fila['estado'];
                }
                if($estado == 0){ // si ambos han solicitado ser amigos automaticamente se acepta
                    $sql = "UPDATE amistades SET estado = 1 WHERE id_usuario = '$friend_id' AND id_amigo = '$user_id'";
                }   
                if($estado == 1){
                    echo "ya amigos";
                }
                if($estado == 2){
                    echo "bloqueado";
                }
            }
            else{
                $sql = "INSERT INTO amistades (id_usuario, id_amigo, estado) VALUES ('$user_id', '$friend_id', 0)";
            }
    
        }
        $conexion->query($sql);
        $conexion->close();
		header("Location:usuario_inicio.php?user_id=$user_id");
		exit;
    } else {
        echo "0 results";
        $conexion->close(); // no eficiente
    }

?>  