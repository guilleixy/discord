<?php
    include 'conex_bbdd.php';

    $pending_requests = array();    // en estos deberia salir solo lo de dejar de enviar la solicitud
/*
    $sql = "SELECT id_amigo FROM amistades WHERE id_usuario like '$user_id' AND estado=0";

    $resultado1 = $conexion->query($sql);

    while($fila = $resultado1->fetch_assoc()){
        $pending_requests[] = $fila['id_amigo'];
    }
 */
    $sql = "SELECT id_usuario FROM amistades WHERE id_amigo like '$user_id' AND estado=0";

	$resultado2 = $conexion->query($sql);

    while($fila = $resultado2->fetch_assoc()){
        $pending_requests[] = $fila['id_usuario'];
    }


    $count = 0;
        // Obtener los datos de cada usuario
    $usuarios = array();
    foreach($pending_requests as $amigo) {
        $sql = "SELECT username, profile_picture, user_code, user_id FROM usuarios WHERE user_id = '$amigo'";
        $resultado = $conexion->query($sql);
        if($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            $usuarios[] = $usuario;
            $count++;
        }
    }

    echo "<h1>PENDIENTES - ".$count."</h1><hr class='center-hr'>";

    echo "<ul class='pending-friends-list'>";
    // Mostrar a cada usuario
    foreach($usuarios as $usuario) {
        echo "<li class='friends-list-li flex pointer'><div class='flex li-text-wrapper'><div class='img-wrapper'><img class='pp round' src='".$usuario["profile_picture"]."'>
        <div class='status active'></div></div><div><div class='flex'><h2>".$usuario["username"]."</h2><h4>#".$usuario["user_code"]."</h4></div>
        <div>Solicitud de amistad entrante</div></div></div><div><button id='yes-friend' data-id=".$usuario["user_id"]." class='round pointer padre accept-friend-button'><div id='mensaje' class='modal-hover-wrapper hijo'>
        <div class='modal-hover modal-bg hijo'>
            Aceptar
        </div>
        <div class='flechita-modal modal-bg'>
        </div>
    </div>
        <i class='fa-solid fa-check'></i></button><button data-id=".$usuario["user_id"]." id='no-friend' class='round pointer padre deny-friend-button'><div id='mensaje' class='modal-hover-wrapper hijo'>
        <div class='modal-hover modal-bg hijo'>
            Ignorar
        </div>
        <div class='flechita-modal modal-bg'>
        </div>
    </div><i class='fa-solid fa-x'></i></button></div></li>";
    }
    echo "</ul>";
    echo "<br>";
    echo "hola";

?>

<script>
    $(document).ready(function() {
        $('#yes-friend').click(function() {
            let friend_id = $(this).data('id');
            $.ajax({
                url: 'accept_friend.php', // La URL del archivo PHP que ejecuta la orden en la base de datos
                type: 'post',
                data: {user_id: <?php echo $user_id?>, friend_id: friend_id}, // Los datos que deseas enviar al archivo PHP
                success: function(response) {
                    location.reload();
                },
                error: function() {
                    alert('Error al ejecutar la orden.');
                }
            });
        });
        $('#no-friend').click(function() {
            let friend_id = $(this).data('id');
            $.ajax({
                url: 'deny_friend.php', // La URL del archivo PHP que ejecuta la orden en la base de datos
                type: 'post',
                data: {user_id: <?php echo $user_id?>, friend_id: friend_id}, // Los datos que deseas enviar al archivo PHP
                success: function(response) {
                    location.reload();
                },
                error: function() {
                    alert('Error al ejecutar la orden.');
                }
            });
        });
    });
</script>
<script src="hover_modals2.js"></script>