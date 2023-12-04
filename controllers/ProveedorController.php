<?php

namespace Controllers;

use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Proveedor;

class ProveedorController
{

    public static function crear(Router $router)
    {
        $tipoEmpleado = $_GET['Tipo'] ?? null;
        $errores = Proveedor::getErrores();
        $proveedor = new Proveedor();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proveedor = new Proveedor($_POST);

            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            if ($_FILES['Imagen']['tmp_name']) {
                $Imagen = Image::make($_FILES['Imagen']['tmp_name'])->fit(800, 600);
                $proveedor->SetFiles($nombreImagen);
            }

            $errores = $proveedor->validar();

            if (empty($errores)) {
                //Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                //Guardar la Imagen en el servidor
                $Imagen->save(CARPETA_IMAGENES . $nombreImagen);
                //Guardar en la base de datos
                $proveedor->guardar($tipoEmpleado);
            }
        }

        $router->render('proveedor/crear', [
            'tipoEmpleado' => $tipoEmpleado,
            'errores' => $errores,
            'proveedor' => $proveedor
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = $_GET['id'];
        $tipoEmpleado = $_GET['Tipo'] ?? null;
        $errores = Proveedor::getErrores();
        $proveedor = Proveedor::find($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proveedor->sincronizar($_POST);

            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            if ($_FILES['Imagen']['tmp_name']) {
                $Imagen = Image::make($_FILES['Imagen']['tmp_name'])->fit(800, 600);
                $proveedor->SetFiles($nombreImagen);
            }

            $errores = $proveedor->validar();

            if (empty($errores)) {
                //Guardar la Imagen en el servidor
                if (isset($Imagen)) {
                    $Imagen->save(CARPETA_IMAGENES . $nombreImagen);
                }
                //Guardar en la base de datos
                $proveedor->guardar($tipoEmpleado);
            }
        }

        $router->render('proveedor/actualizar', [
            'tipoEmpleado' => $tipoEmpleado,
            'errores' => $errores,
            'proveedor' => $proveedor
        ]);
    }

    public static function eliminar (Router $router)
    {
        $tipoEmpleado = $_GET['Tipo'] ?? 1;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Id = $_POST['Id'];
            $Id = filter_var($Id, FILTER_VALIDATE_INT);
            $tipo = $_POST['tipo']; //Vendedor o propiedad
            
            if (validarTipoContenido($tipo)) {
                $proveedor = Proveedor::find($Id);
                $proveedor->eliminar($tipoEmpleado);
            }
        }
    }
}
