<?php
    include 'conex_bbdd.php';

    $friends = array();    

    $sql = "SELECT id_amigo FROM amistades WHERE id_usuario like '$user_id' AND estado=1";

    $resultado1 = $conexion->query($sql);

    while($fila = $resultado1->fetch_assoc()){
        $friends[] = $fila['id_amigo'];
    }

    $sql = "SELECT id_usuario FROM amistades WHERE id_amigo like '$user_id' AND estado=1";

    $resultado2 = $conexion->query($sql);

    while($fila = $resultado2->fetch_assoc()){
        $friends[] = $fila['id_usuario'];
    }

    $count = 0;
        // Obtener los datos de cada usuario
    $usuarios = array();
    foreach($friends as $amigo) {
        $sql = "SELECT username, profile_picture, user_code FROM usuarios WHERE user_id = '$amigo' AND activity = 1";
        $resultado = $conexion->query($sql);
        if($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            $usuarios[] = $usuario;
            $count++;
        }
    }

    echo "<h1>CONECTADO - ".$count."</h1><hr class='center-hr'>";

    echo "<ul class='pending-friends-list'>";
    // Mostrar a cada usuario
    foreach($usuarios as $usuario) {
        echo "<li class='friends-list-li flex pointer'><div class='flex li-text-wrapper'><div class='img-wrapper'><img class='pp round' src='".$usuario["profile_picture"]."'>
        <div class='status active'></div></div><div><div class='flex'><h2>".$usuario["username"]."</h2><h4>#".$usuario["user_code"]."</h4></div>
        <div>En línea</div></div></div><div><button class='round pointer'><i class='fa-solid fa-message'></i></button><button class='round pointer'><i class='fa-solid fa-ellipsis-vertical'></i></button></div></li>";
    }
    echo "</ul>";

?>