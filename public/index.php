<?php 
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AdminController; //Nota: la clase siempre debe de tener el nombre del archivo
use Controllers\ProveedorController;
use Controllers\ProductosController;
use Controllers\EmpleadoController;
use Controllers\ClienteController;
use Controllers\PaginasController;


$router = new Router();

//debuguear([PropiedadController::class, 'index']);  //un arreglo [ruta de la funcioi,nombre funcion]

$router->get("/admin", [AdminController::class, 'index']);

$router->get("/proveedor/crear", [ProveedorController::class, 'crear']);
$router->post("/proveedor/crear", [ProveedorController::class, 'crear']);
$router->get("/proveedor/actualizar", [ProveedorController::class, 'actualizar']);
$router->post("/proveedor/actualizar", [ProveedorController::class, 'actualizar']);
$router->post("/proveedor/eliminar", [ProveedorController::class, 'eliminar']);

$router->get("/producto/crear", [ProductosController::class, 'crear']);
$router->post("/producto/crear", [ProductosController::class, 'crear']);
$router->get("/producto/actualizar", [ProductosController::class, 'actualizar']);
$router->post("/producto/actualizar", [ProductosController::class, 'actualizar']);
$router->post("/producto/eliminar", [ProductosController::class, 'eliminar']);

$router->get("/empleado/crear", [EmpleadoController::class, 'crear']);
$router->post("/empleado/crear", [EmpleadoController::class, 'crear']);
$router->get("/empleado/actualizar", [EmpleadoController::class, 'actualizar']);
$router->post("/empleado/actualizar", [EmpleadoController::class, 'actualizar']);
$router->post("/empleado/eliminar", [EmpleadoController::class, 'eliminar']);

$router->get("/cliente/crear", [ClienteController::class, 'crear']);
$router->post("/cliente/crear", [ClienteController::class, 'crear']);
$router->get("/cliente/actualizar", [ClienteController::class, 'actualizar']);
$router->post("/cliente/actualizar", [ClienteController::class, 'actualizar']);
$router->post("/cliente/eliminar", [ClienteController::class, 'eliminar']);

//public
$router->get("/", [PaginasController::class, 'index']);
$router->post("/", [PaginasController::class, 'index']);
$router->get("/login", [PaginasController::class, 'login']);
$router->post("/login", [PaginasController::class, 'login']);
$router->get("/producto", [PaginasController::class, 'producto']);


$router->comprobarRutas();
?>