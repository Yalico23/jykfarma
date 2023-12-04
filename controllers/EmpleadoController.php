<?php
namespace Controllers;

use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;
use Model\Empleado;
use Model\Cargo;

class EmpleadoController
{

    public static function crear(Router $router)
    {
        $empleado = new Empleado();
        $errores = Empleado::getErrores();
        $tipoEmpleado = $_GET['Tipo'] ?? null;
        $cargos = Cargo::all();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empleado = new Empleado($_POST);

            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            if ($_FILES['Imagen']['tmp_name']) {
                $Imagen = Image::make($_FILES['Imagen']['tmp_name'])->fit(800, 600);
                $empleado->SetFiles($nombreImagen);
            }

            $errores = $empleado->validar();

            if (empty($errores)) {
                //Crear la carpeta para subir imagenes
                if (!is_dir(CARPETA_IMAGENES)) {
                    mkdir(CARPETA_IMAGENES);
                }
                //Guardar la Imagen en el servidor
                $Imagen->save(CARPETA_IMAGENES . $nombreImagen);
                //Guardar en la base de datos
                $empleado->guardar($tipoEmpleado);
            }
        }

        $router->render('empleado/crear', [
            'tipoEmpleado' => $tipoEmpleado,
            'errores' => $errores,
            'empleado' => $empleado,
            'cargos' => $cargos
        ]);
    }

    public static function actualizar(Router $router)
    {
        $id = $_GET['id'];
        $tipoEmpleado = $_GET['Tipo'] ?? null;
        $errores = Empleado::getErrores();
        $empleado = Empleado::find($id);
        $cargos = Cargo::all();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $empleado->sincronizar($_POST);
          
            $nombreImagen = md5(uniqid(rand(), true)) . '.jpg';

            if ($_FILES['Imagen']['tmp_name']) {
                $Imagen = Image::make($_FILES['Imagen']['tmp_name'])->fit(800, 600);
                $empleado->SetFiles($nombreImagen);
            }

            $errores = $empleado->validar();
           
            if (empty($errores)) {
                //Guardar la Imagen en el servidor
                if (isset($Imagen)) {
                    $Imagen->save(CARPETA_IMAGENES . $nombreImagen);
                }
                //Guardar en la base de datos
                $empleado->guardar($tipoEmpleado);
            }
        }

        $router->render('empleado/actualizar', [
            'tipoEmpleado' => $tipoEmpleado,
            'errores' => $errores,
            'empleado' => $empleado,
            'cargos' => $cargos
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
                $empleado = empleado::find($Id);
                $empleado->eliminar($tipoEmpleado);
            }
        }
    }
}

