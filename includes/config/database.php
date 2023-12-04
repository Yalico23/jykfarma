<?php 
function conectarDB() : mysqli {
    $db = new mysqli('localhost','id21620909_rootyalico','Farma_23','id21620909_farmaucv'); 
    if (!$db) {
        echo 'Error no se pudo conectar';
        exit;
    }
    return $db; 
}
?>
