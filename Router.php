<?php

namespace MVC;

class Router
{

    public $rutasGET = []; 
    public $rutasPOST = [];

    public function  get($url, $fn)
    {
        $this->rutasGET[$url] = $fn; 
    }
    
    public function  post($url, $fn)
    {
        $this->rutasPOST[$url] = $fn; 
    }

    public function comprobarRutas()
    {
        $urlActual =  strtok($_SERVER['REQUEST_URI'], '?') ?? '/'; 

        $metodo = $_SERVER['REQUEST_METHOD']; 
        
        if ($metodo === 'GET') {
            $fn = $this->rutasGET[$urlActual] ?? null; 
        }elseif($metodo === 'POST'){
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        if ($fn) {
            call_user_func($fn, $this);
        } else {
            echo "Pagina no encontrada ERROR 404";
        }
    }

    public function render($view, $datos = [])
    {

        foreach ($datos as $key => $value) {
            $$key = $value;
        }
        ob_start(); //Inicia el almacenamiento de memoria
        include __DIR__ . "/views/$view.php";
        $contenidoInsideLayout = ob_get_clean(); //lo guarda y lo limpia , se encuentra en el layout
        include __DIR__ . "/views/layout.php";
    }
}
