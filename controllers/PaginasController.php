<?php

namespace Controllers;

use MVC\Router;
use Model\Producto;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController
{
    public static function index(Router $router)
    {
        $productos = Producto::all();
        $inicio = true;
        $mensaje = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Valores del formulario
            $respuestas = $_POST;

            //Crear una instancia de PHPMAiler
            $mail = new PHPMailer();
            //configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '0c6a2f346a492d';
            $mail->Password = '053456164e857b';
            $mail->SMTPSecure = 'tls'; //No esta pero lo agrega - es la seguridad
            $mail->Port = 2525;

            //Configurar contenido del email
            $mail->setFrom('admin@farma.com'); //Quien mando el email
            $mail->addAddress('admin@farma.com', 'J&K Farma'); //Quien lo recibe
            $mail->Subject = 'Tienes un nuevo mensaje';

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";

            //Definir el Contenido

            $contenido = "<html>";
            $contenido .= "<p>Tienes un nuevo mensaje</p>";
            $contenido .= "<p>Nombre: " . $respuestas['nombre'] . " </p>";
            $contenido .= "<p>Email: " . $respuestas['email'] . " </p>";
            $contenido .= "<p>Telefono: " . $respuestas['telefono'] . " </p>";
            $contenido .= "<p>Mensaje: " . $respuestas['mensaje'] . " </p>";
            $contenido .= "<p>Prefiere ser contactado por: " . $respuestas['contacto'] . " </p>";
            $contenido .= "<p>Fecha Contacto: " . $respuestas['fecha'] . " </p>";
            $contenido .= "<p>Hora Contacto: " . $respuestas['hora'] . " </p>";
            $contenido .= "</html>";

            $mail->Body = $contenido;
            $mail->AltBody = "Esto es texto alternativo sin HTML";

            //Enviar el email
            if ($mail->send()) {
                $mensaje = "Mensaje Enviado Correctamente";
            } else {
                $mensaje = "El mensaje no fue enviado correctament";
            }
        }
        $router->render('paginas/index', [
            "inicio" => $inicio,
            "productos" => $productos,
            "mensaje" => $mensaje
        ]);
    }

    public static function login(Router $router)
    {
        $inicio = false;

        $db = conectarDB();
        $errores = [];
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Correofarma = mysqli_real_escape_string($db, filter_var($_POST['Correofarma'], FILTER_VALIDATE_EMAIL));
            $password = mysqli_real_escape_string($db, $_POST['password']);
            !$Correofarma ? $errores[] = "El email es obligatorio" : "";
            !$password ? $errores[] = "La contraseña es obligatorio" : "";
            if (empty($errores)) {
                //Revisar si el usuario es correcto
                $query = "SELECT * FROM empleado WHERE Correofarma='$Correofarma' AND Password='$password' ";
                $resultado = mysqli_query($db, $query);
                $usuario = mysqli_fetch_assoc($resultado);
                $tipo = $usuario['IdCargo'];
                if ($resultado->num_rows > 0) {
                    header("Location: /admin?Tipo=$tipo");
                } else {
                    echo "error";
                }
            }
        }
        $router->render('paginas/login', [
            "inicio" => $inicio
        ]);
    }
    public static function producto(Router $router)
    {
        $inicio = false;
        $Id = $_GET['Id'];
        $Id = filter_var($Id, FILTER_VALIDATE_INT);
        if (!$Id) {
            header('Location: /');
        }
        $producto = Producto::find($Id);

        $router->render('paginas/producto', [
            "inicio" => $inicio,
            "producto"=>$producto
        ]);
    }
}
