<?php

namespace Model;

class Empleado extends ActiveRecord
{
    protected static $tabla = 'empleado';
    protected static $columnasBD = ['Id', 'Nombre','Apellido','CorreoFarma','Imagen','FechaIngreso','Telefono','Password','IdCargo'];

    public $Id;
    public $Nombre;
    public $Apellido;
    public $CorreoFarma;
    public $Imagen;
    public $FechaIngreso;
    public $Telefono;
    public $Password;
    public $IdCargo;


    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? '';
        $this->Nombre = $args['Nombre'] ?? '';
        $this->Apellido = $args['Apellido'] ?? '';
        $this->CorreoFarma = $args['CorreoFarma'] ?? '';
        $this->Imagen = $args['Imagen'] ?? '';
        date_default_timezone_set('America/Lima');
        $this->FechaIngreso = date('Y/m/d H:i:s');
        $this->Telefono = $args['Telefono'] ?? '';
        $this->Password = $args['Password'] ?? '';
        $this->IdCargo = $args['IdCargo'] ?? '';
    }
   
    public function validar()
    {

        !$this->Nombre ? self::$errores[] = "Debes añadir el Nombre" : '';
        !$this->Apellido ? self::$errores[] = "Debes añadir el Apellido" : '';
        !$this->CorreoFarma ? self::$errores[] = "Debes añadir el correo" : '';
        !$this->Imagen ? self::$errores[] = "Debes añadir Imagen" : '';
        !$this->Telefono ? self::$errores[] = "Debes añadir el Telefono" : '';
        !$this->Password ? self::$errores[] = "Debes añadir una contraseña" : '';
        !$this->IdCargo ? self::$errores[] = "Debes añadir un Cargo" : '';

        return self::$errores;
    }

    public static function getCargo($Id)
{
    $query = "SELECT Cargo FROM cargo WHERE Id = $Id LIMIT 1";
    $resultado = self::$db->query($query);
    
    if ($resultado) {
        $fila = $resultado->fetch_assoc();
        if ($fila) {
            return $fila['Cargo'];
        }
    }

    return null; // Devuelve null si no se encuentra ningún resultado.
}

}
