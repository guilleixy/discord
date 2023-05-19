<link  rel="stylesheet" type="text/css" href="/discord/estilos/chat.css">
<link  rel="stylesheet" type="text/css" href="/discord/estilos/reset.css">
    <?php
    $chat_id = $_GET['chat_id'];
    $file = 'chats/chat'.$chat_id.'.txt';
    //deberia haber un try catch aqui
    $contentEnc = file_get_contents($file);

    $clave = 'MiClaveSecreta';

    $content = openssl_decrypt($contentEnc, 'AES-256-CBC', $clave, 0, '1234567890123456');

    if($content == ""){
        echo "Aún no hay ningún mensaje";
    }
    else{
        $messages = explode("\n", $content);

        include 'conex_bbdd.php';
    
        function convertirFecha($fecha) {
            $timestamp = strtotime($fecha);
            $nuevaFecha = date('d/m/Y H:i', $timestamp);
            $hora = date('H:i', $timestamp);
            
            return array($nuevaFecha, $hora);
        }
    
        $array_id = [];
    
        class UsuarioTexto{
            public $id;
            public $name;
            public $profilepic;
    
            function __construct($id, $name, $profilepic){
                $this->id = $id;
                $this->name = $name;
                $this->profilepic =$profilepic;
            }
        }
    
        $clase_usuarios = [];
    
        $count = 0;
    
        $prev_id="";

        //entre autores siempre hay un margen y cuando es el ultimo mensaje tambien
        
        echo  "<div class='funcionara'>";

        foreach ($messages as $message) {
            if (!empty($message)) {
                $message_parts = explode('/', $message);
                $id = $message_parts[0];
                if(in_array($id,$array_id)){
                    foreach ($clase_usuarios as $usuario) {
                        if ($usuario->id == $id) {
                            $name = $usuario->name;
                            $profilepic = $usuario->profilepic;
                            break;
                        }
                    } 
                }
                else{
    
                    $sql = "SELECT profile_picture FROM usuarios WHERE user_id = '$id'";
                    $resultado = $conexion->query($sql);
                    $profilepic = $resultado->fetch_assoc()['profile_picture'];
                    
                    $sql = "SELECT username FROM usuarios WHERE user_id = '$id'";
                    $resultado = $conexion->query($sql);
                    $name = $resultado->fetch_assoc()['username'];    
    
                    $array_id[] = $id;
                    $clase_usuarios[] = new UsuarioTexto($id, $name, $profilepic); 
    
                }
                $date = $message_parts[1];
                $text = $message_parts[2];
    
                list($nuevaFecha, $hora) = convertirFecha($date);
    
                if($prev_id == $id){
                    echo '<div class="message-wrapper message-wpr-small"><div class="time-wrapper">'.$hora.'</div>
                    <div class="msg-text-wrapper">'.htmlspecialchars($text).'</div></div>';
                }
                else{
                    echo '<div class="message-wrapper msg-with-pp"><div class="pp-wrapper"><img class="user-img-chat" src="/discord/'.$profilepic.'"></div>
                    <div class="msg-text-wrapper"><div class="msg-header"><h3>'.$name.'</h3><div class="msg-date">'.$nuevaFecha.'</div></div>'.htmlspecialchars($text).'</div></div>';
                }
               $prev_id = $id;
            }
        }
        echo "</div>";
        $conexion->close();
    }
    ?>
