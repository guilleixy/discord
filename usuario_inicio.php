<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Discord</title>
		<link  rel="stylesheet" type="text/css" href="estilos/app.css?v=10">
		<link  rel="stylesheet" type="text/css" href="estilos/reset.css">
        <link  rel="stylesheet" type="text/css" href="estilos/server.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin">
        <script src="https://kit.fontawesome.com/b13fab0a20.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	</head>

	<body>
        <?php
            $user_id = $_GET['user_id'];
            include 'conex_bbdd.php';

            $sql = "SELECT profile_picture FROM usuarios WHERE user_id like '$user_id'";

            $resultado = $conexion->query($sql);
        
            if ($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_assoc()) {
                    $user_pp = $fila['profile_picture'];
                }
            } else {
                echo "pp not found";
            }

            $sql = "SELECT username FROM usuarios WHERE user_id like '$user_id'";

            $resultado = $conexion->query($sql);
        
            if ($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_assoc()) {
                    $username = $fila['username'];
                }
            } else {
                echo "username not found";
            }

            $sql = "SELECT user_code FROM usuarios WHERE user_id like '$user_id'";

            $resultado = $conexion->query($sql);
        
            if ($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_assoc()) {
                    $user_code = $fila['user_code'];
                }
            } else {
                echo "user_code not found";
            }
            $sql = "SELECT activity FROM usuarios WHERE user_id like '$user_id'";

            $resultado = $conexion->query($sql);
        
            if ($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_assoc()) {
                    $activity = $fila['activity'];
                }
            } else {
                echo "activity not found";
            }
            /*impide que se pueda acceder a cuenta sin iniciar sesión antes
            if($activity == 0){
                header("Location:login.html");
            }
            */
        ?>
        <div id="servers" class="flex column align-center">
            <?php include 'servers.php' ?>
        </div>
        <div id="chats">
            <div>
                <div id="new_chat">
                    <button class="new-chat-button round-border text-left pointer">Busca o inicia una conversación</button>
                </div>
                <hr>
                <div id="friends-menu" class="flex column">
                    <button class="friends-button text-left"><i class="fa-solid fa-child-reaching icono-padding-right"></i> Amigos</button>
                    <button class="friends-button text-left"><i class="fa-solid fa-wheelchair-move icono-padding-right"></i> Nitro</button>
                </div>
                <div id="mensajes-directos">
                    <div class="msj-dir-wrapper">
                        <h2 class="msj-dir" >MENSAJES DIRECTOS</h2> <button class="msj-dir msj-dir-bt pointer">+</button>
                            <div id="chats-wrapper"></div>
                    </div>
                </div>
            </div>
            <div id="user-tools" class="align-center">
                <div class="pp_wrapper">
                    <img class="pp round" src="<?php echo $user_pp?>" alt="profile picture">
                    <div class="status active"></div>
                </div>
                <div id="user_info">
                    <h5><?php echo $username ?></h5>
                    <h7>#<?php echo $user_code ?></h7>
                </div>
                <div id="user-options">
                    <i class="fa-solid fa-microphone"></i>
                    <i class="fa-solid fa-headphones"></i>
                    <i class="fa-solid fa-gear"></i>
                </div>
            </div>
        </div>
        <div id="right-wrapper">
            <nav id="nav">
                <ul>
                    <li><i class="fa-solid fa-child-reaching"></i> Amigos</li>
                    <li><button onClick="handle_nav('en-linea')" class="nav-button pointer en-linea">En línea</button></li>
                    <li><button onClick="handle_nav('all-friends')" class="nav-button pointer all-friends">Todos</button></li>
                    <li><button onClick="handle_nav('pendientes')" class="nav-button pointer pendientes">Pendiente</button></li>
                    <li><button onClick="handle_nav('bloqueados')" class="nav-button pointer bloqueados" >Bloqueado</button></li>
                    <li><button onClick="handle_nav('anadir-amigos')" class="nav-button pointer anadir-amigos anadir-amigos-boton">Añadir amigo</button></li>
                </ul>
            </nav>
            <hr>
            <div id="center">
                <div id="en-linea">
                    <?php include 'enlinea.php' ?>
                </div>
                <div id="all-friends">
                    <?php include 'get_friends.php' ?>
                </div>
                <div id="pendientes"> 
                    <?php include 'pending_friends.php' ?>
                </div>
                <div id="bloqueados"></div>
                <div id="anadir-amigos">
                    <?php include 'add_friend.php' ?>
                </div>
            </div>
            <div id="actividad"></div>
        </div>
        <script>//esto hace que al cerrar la ventana se cierre sesion pero va mal
            /*$(window).on('beforeunload', function() {
                // Enviar petición AJAX para actualizar la actividad del usuario a 0
                $.ajax({
                    type: 'POST',
                    url: 'actualizar_actividad.php',
                    data: {
                        user_id: '<?php //echo $user_id; ?>' !!quitar // antes del echo
                    },
                    async: true // asegura que la petición AJAX se complete antes de que la página se cierre
                });
            });
            console.log("llego"); */
        </script>
        <script src="nav_handler.js"></script>
    </body>
</html>