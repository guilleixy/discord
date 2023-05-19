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
        <div id="right-wrapper" class="servers-wrapper">
            <div id="discover-servers-inicio">
                <div class="server-form-container">
                    <h1>Encuentra tu comunidad en Discord</h1>
                    <div>Desde juegos, a música y enseñanza, aquí encontrarás tu sitio.</div>
                    <div class="search-input-wrapper"><input class="server-input" type="text" placeholder="Explora comunidades" id="server-search-input"><svg class="searchIcon" aria-label="Buscar" aria-hidden="false" role="img" width="24" height="24" viewBox="0 0 24 24"><path fill="currentColor" d="M21.707 20.293L16.314 14.9C17.403 13.504 18 11.799 18 10C18 7.863 17.167 5.854 15.656 4.344C14.146 2.832 12.137 2 10 2C7.863 2 5.854 2.832 4.344 4.344C2.833 5.854 2 7.863 2 10C2 12.137 2.833 14.146 4.344 15.656C5.854 17.168 7.863 18 10 18C11.799 18 13.504 17.404 14.9 16.314L20.293 21.706L21.707 20.293ZM10 16C8.397 16 6.891 15.376 5.758 14.243C4.624 13.11 4 11.603 4 10C4 8.398 4.624 6.891 5.758 5.758C6.891 4.624 8.397 4 10 4C11.603 4 13.109 4.624 14.242 5.758C15.376 6.891 16 8.398 16 10C16 11.603 15.376 13.11 14.242 14.243C13.109 15.376 11.603 16 10 16Z"></path></svg></div>
                </div>
                <div id="default-servers">
                    <h3>Comunidades destacadas</h3>
                </div>
            </div>
            <div id="búsqueda-server"></div>
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