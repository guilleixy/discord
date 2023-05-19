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
        $sql = "SELECT username, profile_picture, user_code FROM usuarios WHERE user_id = '$amigo'";
        $resultado = $conexion->query($sql);
        if($resultado->num_rows > 0) {
            $usuario = $resultado->fetch_assoc();
            $usuarios[] = $usuario;
            $count++;
        }
    }

    echo "<h1>TODOS LOS AMIGOS - ".$count."</h1><hr class='center-hr'>";

    echo "<ul class='pending-friends-list'>";
    // Mostrar a cada usuario
    foreach($usuarios as $usuario) {
        echo "<li class='friends-list-li flex pointer'><div class='flex li-text-wrapper'><div class='img-wrapper'><img class='pp round' src='".$usuario["profile_picture"]."'>
        <div class='status active'></div></div><div><div class='flex'><h2>".$usuario["username"]."</h2><h4>#".$usuario["user_code"]."</h4></div>
        <div>En línea</div></div></div><div id='padre'><button class='round pointer padre'><div id='mensaje' class='modal-hover-wrapper hijo'>
        <div class='modal-hover modal-bg'>
            Mensaje
        </div>
        <div class='flechita-modal modal-bg'>
        </div>
    </div><i class='fa-solid fa-message'></i></button><button class='round pointer padre'><div id='mensaje' class='modal-hover-wrapper hijo mas'>
    <div class='modal-hover modal-bg'>
        Más
    </div>
    <div class='flechita-modal modal-bg'>
    </div>
</div><i class='fa-solid fa-ellipsis-vertical'></i></button></div></li>";
    }
    echo "</ul>";
    //esta fuera del foreach
    //echo "<div id='hijo' class='friend-modal'><ul class='friend-modal-ul'><li><button>Iniciar videollamada</button></li><li><button>Iniciar llamada de voz</button></li><li><button data-id=".$usuario["user_id"]."id='del-friend' class='friend-modal-delete'>Eliminar amigo</button></li></ul></div>";
    echo "<div id='mensaje' class='modal-hover-wrapper hijo'>
    <div class='modal-hover modal-bg'>
        Más
    </div>
    <div class='flechita-modal modal-bg'>
    </div>
</div>";
?>

<script>
    $(document).ready(function() {
        $('#del-friend').click(function() {
            let friend_id = $(this).data('id');
            $.ajax({
                url: 'delete_friend.php', // La URL del archivo PHP que ejecuta la orden en la base de datos
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
<script src="hover_modals.js"></script>