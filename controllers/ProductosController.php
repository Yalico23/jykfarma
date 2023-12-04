<?php

namespace Controllers;

use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Producto;
use Model\Proveedor;

class ProductosController
{

    public static function crear(Router $router)
    {
        $producto = new Producto();
        $errores = Producto::getErrores();
        $proveedores = Proveedor::all();
        $tipoEmpleado = $_GET['Tipo'] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $producto = new Producto($_POST);

            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            if ($_FILES['Imagen']['tmp_name']) {
                $Imagen = Image::make($_FILES['Imagen']['tmp_name'])->fit(800, 600);
                $producto->SetFiles($nombreImagen);
            }

            $errores = $producto->validar();

            if (empty($errores)) {
                //Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                //Guardar la Imagen en el servidor
                $Imagen->save(CARPETA_IMAGENES . $nombreImagen);
                //Guardar en la base de datos
                $producto->guardar($tipoEmpleado);
            }
        }

        $router->render('producto/crear', [
            'tipoEmpleado' => $tipoEmpleado,
            'errores' => $errores,
            'producto' => $producto,
            'proveedores' => $proveedores
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = $_GET['id'];
        $tipoEmpleado = $_GET['Tipo'] ?? null;
        $errores = Producto::getErrores();
        $producto = Producto::find($id);
        $proveedores = Proveedor::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $producto->sincronizar($_POST);

            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            if ($_FILES['Imagen']['tmp_name']) {
                $Imagen = Image::make($_FILES['Imagen']['tmp_name'])->fit(800, 600);
                $producto->SetFiles($nombreImagen);
            }

            $errores = $producto->validar();

            if (empty($errores)) {
                //Guardar la Imagen en el servidor
                if (isset($Imagen)) {
                    $Imagen->save(CARPETA_IMAGENES . $nombreImagen);
                }
                //Guardar en la base de datos
                $producto->guardar($tipoEmpleado);
            }
        }

        $router->render('producto/actualizar', [
            'tipoEmpleado' => $tipoEmpleado,
            'errores' => $errores,
            'producto' => $producto,
            'proveedores' => $proveedores
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
                $producto = Producto::find($Id);
                $producto->eliminar($tipoEmpleado);
            }
        }
    }
}
