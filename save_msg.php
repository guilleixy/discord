<?php
$message = $_POST['message'];
$user_id = $_POST['user_id'];
$chat_id = $_POST['chat_id'];

$folder = 'chats/';
$file = $folder . 'chat'.$chat_id.'.txt';

$clave = 'MiClaveSecreta';

// Verificar si el archivo existe
if (!file_exists($file)) {
    file_put_contents($file, '');
}

$currentContentEnc = file_get_contents($file);

$currentContent =  openssl_decrypt($currentContentEnc, 'AES-256-CBC', $clave, 0, '1234567890123456');

$message = $user_id.'/'.date('Y-m-d H:i:s') . '/' . $message . "\n";

$text =  $currentContent. $message;

$messageEnc = openssl_encrypt($text, 'AES-256-CBC', $clave, 0, '1234567890123456');

file_put_contents($file, $messageEnc);

?>