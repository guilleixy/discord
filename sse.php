
<?php
// Establecer encabezados para SSE
header('Content-Type: text/event-stream');
header('Cache-Control: no-cache');
header('Connection: keep-alive');

// Establecer la ruta del archivo de mensajes
$chatId = $_GET['chat_id'];
$folder = 'chats/';
$file = $folder . 'chat'.$chatId.'.txt';

// Establecer el último ID de evento enviado
$lastEventId = 0;

// Leer el archivo de mensajes
while (true) {
    // Verificar si el archivo ha cambiado desde la última vez
    clearstatcache();
    $currentEventId = filemtime($file);
    if ($currentEventId > $lastEventId) {
        // Leer el contenido del archivo línea por línea
        $fileContent = file($file);

        // Enviar cada línea como un evento SSE separado
        foreach ($fileContent as $line) {
            echo "data: $line";
            echo "event: message\n\n";
        }

        // Flushing de salida para asegurar que se envíe inmediatamente
        ob_flush();
        flush();

        // Actualizar el ID del último evento
        $lastEventId = $currentEventId;
    }

    // Dormir durante un breve período para evitar consumir demasiados recursos del servidor
    usleep(100000); // Esperar 100ms antes de verificar nuevamente
}

?>

