<?php

namespace Controllers;

use MVC\Router;
use Model\Empleado;
use Model\Cliente;
use Model\Producto;
use Model\Proveedor;

class AdminController
{

    public static function index(Router $router)
    {
        $resultado = $_GET['resultado'] ?? null;
        $tipoEmpleado = $_GET['Tipo'] ?? 1;

        $empleados  = Empleado::all();
        $clientes = Cliente::all();
        $productos = Producto::all();
        $proveedores = Proveedor::all();

        $router->render('admin/admin', [
            'resultado' => $resultado,
            'tipoEmpleado' =>  $tipoEmpleado,
            'empleados' => $empleados,
            'clientes' => $clientes,
            'productos' => $productos,
            'proveedores' => $proveedores
        ]);
    }
}
