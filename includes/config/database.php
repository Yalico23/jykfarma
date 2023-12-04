<?php 
function conectarDB() : mysqli {
    $db = new mysqli('localhost','root','yalico23','farma'); 
    if (!$db) {
        echo 'Error no se pudo conectar';
        exit;
    }
    return $db; 
}
?>
