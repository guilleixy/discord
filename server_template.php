<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Discord</title>
		<link  rel="stylesheet" type="text/css" href="../estilos/app.css?v=10">
		<link  rel="stylesheet" type="text/css" href="../estilos/reset.css">
        <link  rel="stylesheet" type="text/css" href="../estilos/server.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Cabin">
        <script src="https://kit.fontawesome.com/b13fab0a20.js" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	</head>

	<body>
        <?php

            $user_id = $_COOKIE['user_id'];



            if(!isset($server_id)){
                $server_id =  $_COOKIE['server_id'];
                setcookie('server_id', '', time() - 3600);
            }
            else{
                $server_id = $server_id;
            }

            

            include '../conex_bbdd.php';

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

            $sql = "SELECT server_name FROM servidores WHERE server_id LIKE $server_id";

            $resultado = $conexion->query($sql);

            $server_name = $resultado->fetch_assoc();

            /*impide que se pueda acceder a cuenta sin iniciar sesión antes
            if($activity == 0){
                header("Location:login.html");
            }
            */
            $conexion->close();
        ?>
        <div id="servers" class="flex column align-center">
            <?php include '../servers.php' ?>
        </div>
        <div id="canales">
            <div>
                <div>
                    <h1><?php echo $server_name ?></h1>
                </div>
                <div>
                    <h3>CANALES DE TEXTO</h3>

                </div>
                <div>
                    <h3>CANALES DE VOZ</h3>
                </div>
            </div>
            <div id="user-tools" class="align-center">
                <div class="pp_wrapper">
                    <img class="pp round" src="/discord/<?php echo $user_pp?>" alt="profile picture">
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
            </nav>
            <div class="flex all">
            <div id="center">
                <div id="chat-holder">
                    <iframe id="chatFrame" src="../chat.php?chat_id=<?php echo $server_id;?>"></iframe>
                    <form>
                        <svg width="24" height="24" viewBox="0 0 24 24" class="chat-input-button chat-input-hover"><path class="attachButtonPlus-3IYelE" fill="currentColor" d="M12 2.00098C6.486 2.00098 2 6.48698 2 12.001C2 17.515 6.486 22.001 12 22.001C17.514 22.001 22 17.515 22 12.001C22 6.48698 17.514 2.00098 12 2.00098ZM17 13.001H13V17.001H11V13.001H7V11.001H11V7.00098H13V11.001H17V13.001Z"></path></svg>
                        <input id="msgInput" name="message" class="chat-input" type="text" placeholder="Enviar mensaje a #general">
                        <div class="chat-input-button chat-input-div">
                            <svg width="24" height="24" aria-hidden="true" role="img" viewBox="0 0 24 24" class="chat-input-hover"><path fill="currentColor" fill-rule="evenodd" clip-rule="evenodd" d="M16.886 7.999H20C21.104 7.999 22 8.896 22 9.999V11.999H2V9.999C2 8.896 2.897 7.999 4 7.999H7.114C6.663 7.764 6.236 7.477 5.879 7.121C4.709 5.951 4.709 4.048 5.879 2.879C7.012 1.746 8.986 1.746 10.121 2.877C11.758 4.514 11.979 7.595 11.998 7.941C11.9991 7.9525 11.9966 7.96279 11.9941 7.97304C11.992 7.98151 11.99 7.98995 11.99 7.999H12.01C12.01 7.98986 12.0079 7.98134 12.0058 7.97287C12.0034 7.96282 12.0009 7.95286 12.002 7.942C12.022 7.596 12.242 4.515 13.879 2.878C15.014 1.745 16.986 1.746 18.121 2.877C19.29 4.049 19.29 5.952 18.121 7.121C17.764 7.477 17.337 7.764 16.886 7.999ZM7.293 5.707C6.903 5.316 6.903 4.682 7.293 4.292C7.481 4.103 7.732 4 8 4C8.268 4 8.519 4.103 8.707 4.292C9.297 4.882 9.641 5.94 9.825 6.822C8.945 6.639 7.879 6.293 7.293 5.707ZM14.174 6.824C14.359 5.941 14.702 4.883 15.293 4.293C15.481 4.103 15.732 4 16 4C16.268 4 16.519 4.103 16.706 4.291C17.096 4.682 17.097 5.316 16.707 5.707C16.116 6.298 15.057 6.642 14.174 6.824ZM3 13.999V19.999C3 21.102 3.897 21.999 5 21.999H11V13.999H3ZM13 13.999V21.999H19C20.104 21.999 21 21.102 21 19.999V13.999H13Z"></path></svg>
                            <svg width="24" height="24" class="icon-1d5zch chat-input-hover" aria-hidden="true" role="img" viewBox="0 0 24 24"><path d="m2 2c-1.1046 0-2 0.89543-2 2v16c0 1.1046 0.89543 2 2 2h20c1.1046 0 2-0.8954 2-2v-16c0-1.1046-0.8954-2-2-2h-20zm2.4846 13.931c0.55833 0.375 1.2 0.5625 1.925 0.5625 0.96667 0 1.6958-0.3333 2.1875-1l0.2375 0.825h1.475v-4.9h-3.7625v1.625h1.9875v1.075c-0.15833 0.225-0.38333 0.4042-0.675 0.5375-0.28333 0.125-0.59583 0.1875-0.9375 0.1875-0.76667 0-1.3542-0.2458-1.7625-0.7375-0.40833-0.4916-0.6125-1.1916-0.6125-2.1 0-0.9 0.20417-1.5958 0.6125-2.0874 0.40833-0.5 0.99583-0.75 1.7625-0.75 0.84167 0 1.475 0.39166 1.9 1.175l1.4125-1.0124c-0.30003-0.575-0.74586-1.0208-1.3375-1.3375-0.58333-0.31667-1.2458-0.475-1.9875-0.475-0.875 0-1.6292 0.19166-2.2625 0.575-0.625 0.38333-1.1042 0.9125-1.4375 1.5875-0.325 0.67495-0.4875 1.45-0.4875 2.325 0 0.8834 0.15417 1.6667 0.4625 2.35 0.30833 0.675 0.74167 1.2 1.3 1.575zm7.4509 0.3875h1.825v-8.625h-1.825v8.625zm3.5767 0h1.825v-3.275h3.2v-1.65h-3.2v-2.05h3.9375v-1.65h-5.7625v8.625z" clip-rule="evenodd" fill-rule="evenodd" fill="currentColor"></path></svg>
                            <svg width="24" height="24" class="stickerIcon-3Jx5SE chat-input-hover" aria-hidden="true" role="img" viewBox="0 0 20 20"><path fill="currentColor" class="" fill-rule="evenodd" clip-rule="evenodd" d="M12.0002 0.662583V5.40204C12.0002 6.83974 13.1605 7.99981 14.5986 7.99981H19.3393C19.9245 7.99981 20.222 7.29584 19.8055 6.8794L13.1209 0.196569C12.7043 -0.219868 12.0002 0.0676718 12.0002 0.662583ZM14.5759 10.0282C12.0336 10.0282 9.96986 7.96441 9.96986 5.42209V0.0583083H1.99397C0.897287 0.0583083 0 0.955595 0 2.05228V18.0041C0 19.1007 0.897287 19.998 1.99397 19.998H17.9457C19.0424 19.998 19.9397 19.1007 19.9397 18.0041V10.0282H14.5759ZM11.9998 12.2201C11.9998 13.3245 11.1046 14.2198 10.0002 14.2198C8.8958 14.2198 8.00052 13.3245 8.00052 12.2201H6.66742C6.66742 14.0607 8.15955 15.5529 10.0002 15.5529C11.8408 15.5529 13.3329 14.0607 13.3329 12.2201H11.9998ZM4.44559 13.331C4.44559 13.9446 3.94821 14.442 3.33467 14.442C2.72112 14.442 2.22375 13.9446 2.22375 13.331C2.22375 12.7175 2.72112 12.2201 3.33467 12.2201C3.94821 12.2201 4.44559 12.7175 4.44559 13.331ZM16.6657 14.442C17.2793 14.442 17.7766 13.9446 17.7766 13.331C17.7766 12.7175 17.2793 12.2201 16.6657 12.2201C16.0522 12.2201 15.5548 12.7175 15.5548 13.331C15.5548 13.9446 16.0522 14.442 16.6657 14.442Z"></path><path fill="currentColor" class="hidden-334jci" fill-rule="evenodd" clip-rule="evenodd" d="M12.0002 0.662583V5.40204C12.0002 6.83974 13.1605 7.99981 14.5986 7.99981H19.3393C19.9245 7.99981 20.222 7.29584 19.8055 6.8794L13.1209 0.196569C12.7043 -0.219868 12.0002 0.0676718 12.0002 0.662583ZM14.5759 10.0282C12.0336 10.0282 9.96986 7.96441 9.96986 5.42209V0.0583083H1.99397C0.897287 0.0583083 0 0.955595 0 2.05228V18.0041C0 19.1007 0.897287 19.998 1.99397 19.998H17.9457C19.0424 19.998 19.9397 19.1007 19.9397 18.0041V10.0282H14.5759ZM12 13H11.2H8.8H8C8 14.1046 8.89543 15 10 15C11.1046 15 12 14.1046 12 13ZM17.7766 13.331C17.7766 13.9446 17.2793 14.442 16.6657 14.442C16.0522 14.442 15.5548 13.9446 15.5548 13.331C15.5548 12.7175 16.0522 12.2201 16.6657 12.2201C17.2793 12.2201 17.7766 12.7175 17.7766 13.331ZM2 12.2361L2.53532 11L5.62492 12.7835C5.79161 12.8797 5.79161 13.1203 5.62492 13.2165L2.53532 15L2 13.7639L3.32339 13L2 12.2361Z"></path></svg>
                            <img src="/discord/img/emoji.svg" width="24" height="24" class="chat-input-emoji">
                        </div>
                        <input id="user_id" type="hidden" name="user_id" value="<?php echo $user_id ?>">
                        <input id="chat_id" type="hidden" name="chat_id" value="<?php echo $server_id ?>">
                    </form>
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const form = document.querySelector('form');
                            const messageInput = document.getElementById('msgInput');

                            messageInput.addEventListener('keydown', function(e) {
                                if (e.key === 'Enter') {
                                    e.preventDefault();
                                    
                                    const message = messageInput.value;
                                    if (message.trim() !== '') {
                                        const userId = document.getElementById('user_id').value;
                                        const chatId = document.getElementById('chat_id').value;
                                        console.log(userId, chatId);
                                        sendMessage(message, userId, chatId);
                                    }

                                    messageInput.value = '';
                                }
                            });
                        });

                        function sendMessage(message, userId, chatId) {
                            console.log(userId, chatId);
                            const xhr = new XMLHttpRequest();
                            xhr.open('POST', '../save_msg.php', true);
                            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                            xhr.onload = function() {
                                if (xhr.status === 200) {
                                    const chatFrame = document.getElementById('chatFrame');
                                    chatFrame.contentWindow.location.reload();
                                }
                            };
                            const data = 'message=' + encodeURIComponent(message) + '&user_id=' + encodeURIComponent(userId) + '&chat_id=' + encodeURIComponent(chatId);
                            console.log(data);
                             xhr.send(data);
                        }
                        // Obtener la ID del chat desde algún lugar de tu aplicación
                        const chatId = document.getElementById('chat_id').value; // Ejemplo: ID del chat

                        // Establecer la URL del archivo SSE con el parámetro chat_id
                        const sseUrl = `../sse.php?chat_id=${encodeURIComponent(chatId)}`;
                        console.log(sseUrl);
                        // Función para manejar los eventos SSE
                        function handleSSEEvent(event) {
                            // Recargar el iframe cuando se reciba un nuevo mensaje
                            document.getElementById('chatFrame').contentWindow.location.reload();
                            console.log("reloaded");
                        }

                        // Crear el objeto EventSource y escuchar eventos SSE
                        const eventSource = new EventSource(sseUrl);
                        eventSource.addEventListener('message', handleSSEEvent);


                    </script>
                    <script src="/discord/sse.js"></script>
                </div>
            </div>
            <div id="actividad">
                <?php
                        include '..//conex_bbdd.php';
                        
                        $sql = "SELECT usuario_id FROM miembros_servidores WHERE servidor_id LIKE $server_id";
                        $resultado = $conexion->query($sql);

                        $miembros = [];

                        if($resultado->num_rows > 0) {
                            while ($miembro = $resultado->fetch_assoc()) {
                                $miembros[] = $miembro['usuario_id'];
                            }
                        }

                        $miembrosonline = [];

                        $miembrosoffline = [];

                        foreach ($miembros as $miembro) {
                            $sql = "SELECT * FROM usuarios WHERE user_id = '$miembro'";
                            $resultado = $conexion->query($sql);
                            while ($fila = $resultado->fetch_assoc()) {
                                $actividad = $fila['activity'];
                                if ($actividad == 1) {
                                    $miembrosonline[] = $fila;
                                } else {
                                    $miembrosoffline[] = $fila;
                                }
                            }
                        }
                        //!! cuando la imagen para el servidor que se sube tiene un nombre muy largo no se guarda bien por le tamaño de la variable en la base de datos
                        echo "<h2>EN LINEA - ".count($miembrosonline)."</h2>";
                        
                        echo "<ul class='server-members-ul'>";

                        foreach ($miembrosonline as $miembro) {
                            echo "<li class='server-member-li'><div class='pp_wrapper'><img class='pp round' src=/discord/".$miembro['profile_picture']."><div class='status active'></div></div><div>".$miembro['username']."</div></li>";
                        }

                        echo "</ul>";

                        echo "<h2>DESCONECTADO - ".count($miembrosoffline)."</h2>";

                        echo "<ul class='server-members-ul'>";

                        foreach ($miembrosoffline as $miembro) {
                            echo "<li class='server-member-li'><div class='pp_wrapepr'><img class='pp round' src=/discord/".$miembro['profile_picture']."><div class='status active'></div></div><div>".$miembro['username']."</div></li>";
                        }

                        echo "</ul>";

                        $conexion->close();
                ?>
            </div>
        </div>
        </div>
    </body>
</html>