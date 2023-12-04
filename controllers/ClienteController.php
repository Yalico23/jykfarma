<?php
namespace Controllers;

use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Cliente;

class ClienteController
{

    public static function crear(Router $router)
    {
        $cliente = new Cliente();
        $errores = Cliente::getErrores();
        $tipoEmpleado = $_GET['Tipo'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente = new Cliente($_POST);
        
        
            $errores = $cliente->validar();
        
            if (empty($errores)) {
                $cliente->guardar($tipoEmpleado);
            }
        }

        $router->render('cliente/crear', [
            'tipoEmpleado' => $tipoEmpleado,
            'errores' => $errores,
            'cliente' => $cliente
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = $_GET['id'];
        $tipoEmpleado = $_GET['Tipo'] ?? null;
        $errores = Cliente::getErrores();
        $cliente = Cliente::find($id);
        

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cliente->sincronizar($_POST);
        
        
            $errores = $cliente->validar();
        
            if (empty($errores)) {
                $cliente->guardar($tipoEmpleado);
            }
        }

        $router->render('cliente/actualizar', [
            'tipoEmpleado' => $tipoEmpleado,
            'errores' => $errores,
            'cliente' => $cliente
        ]);
    }

    public static function eliminar(Router $router)
    {
        $tipoEmpleado = $_GET['Tipo'] ?? 1;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Id = $_POST['Id'];
            $Id = filter_var($Id, FILTER_VALIDATE_INT);
            $tipo = $_POST['tipo']; //Vendedor o propiedad

            if (validarTipoContenido($tipo)) {
                $cliente = Cliente::find($Id);
                $cliente->eliminar($tipoEmpleado);
            }
        }
    }
}

