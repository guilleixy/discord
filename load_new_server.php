<?php

include 'conex_bbdd.php';

$user_id = $_POST['user_id'];

$server_name = $_POST['server_name'];
$rutaArchivo = '';

if(isset($_FILES['server_icon']) && $_FILES['server_icon']['error'] !== UPLOAD_ERR_NO_FILE) {
    $nombreArchivo = $_FILES['server_icon']['name'];
    $rutaArchivo = 'img/server_icons/' . $nombreArchivo; //deberia añadirse el id del servidor (_1)

    // Mueve el archivo a la carpeta destino
    if(move_uploaded_file($_FILES['server_icon']['tmp_name'], $rutaArchivo)) {
        echo "Archivo subido correctamente.";
    } else {
        echo "Hubo un error al subir el archivo.";
        $rutaArchivo = '';
    }
}

$sql = "INSERT INTO servidores (server_name, server_icon)  VALUES ('$server_name','$rutaArchivo')";
$resultado = $conexion->query($sql);

if($resultado) {
    $server_id = mysqli_insert_id($conexion);

    $sql = "INSERT INTO miembros_servidores (servidor_id, usuario_id)  VALUES ('$server_id','$user_id')";
    $conexion->query($sql);

    setcookie('user_id', $user_id);

    setcookie('server_id', $server_id);

    $rutaDir = 'server_template.php';

    $contenido_servidor = file_get_contents($rutaDir);

    //setcookie('user_id', '', time() - 3600);

    $nombreArchivo = $server_name . '_' . $server_id . '.php';

    $rutaCarpeta = "servidores/";

    $rutaCompleta = $rutaCarpeta . $nombreArchivo;

    if(file_put_contents($rutaCompleta, $contenido_servidor)) {
        $conexion->close();
        echo "<script>window.location.href = '$rutaCompleta';</script>";
    } else {
        echo "Error al guardar el archivo del servidor.";
    }
} else {
    echo "Error al insertar el servidor en la base de datos.";
}

?>
