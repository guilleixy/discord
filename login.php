<?php
    include 'conex_bbdd.php';

    $email = $_POST['email'];

    $password = $_POST['password'];

	$sql = "SELECT user_id FROM usuarios WHERE email like '$email' AND password like '$password'";

	$resultado = $conexion->query($sql);

    if ($resultado->num_rows > 0) {
        while($fila = $resultado->fetch_assoc()) {
            $user_id = $fila['user_id'];
        }

        $sql = "UPDATE usuarios SET activity = 1 WHERE user_id = '$user_id'";
        $conexion->query($sql);
        $conexion->close();
        header("Location:usuario_inicio.php?user_id=$user_id");
        exit;
    } else {
        echo "0 results";
        $conexion->close(); // no eficiente
    }

?>  