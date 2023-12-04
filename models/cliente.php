<?php

namespace Model;

class Cliente extends ActiveRecord
{
    protected static $tabla = 'cliente';
    protected static $columnasBD = ['Id', 'Nombre','Apellido','Correo','Direccion','Telefono'];

    public $Id;
    public $Nombre;
    public $Apellido;
    public $Correo;
    public $Direccion;
    public $Telefono;


    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? '';
        $this->Nombre = $args['Nombre'] ?? '';
        $this->Apellido = $args['Apellido'] ?? '';
        $this->Correo = $args['Correo'] ?? '';
        $this->Direccion = $args['Direccion'] ?? '';
        $this->Telefono = $args['Telefono'] ?? '';
    }

    public function validar()
    {

        !$this->Nombre ? self::$errores[] = "Debes añadir el Nombre" : '';
        !$this->Apellido ? self::$errores[] = "Debes añadir el Apellido" : '';
        !$this->Correo ? self::$errores[] = "Debes añadir el Correo" : '';
        !$this->Direccion ? self::$errores[] = "Debes añadir el Direccion" : '';
        !$this->Telefono ? self::$errores[] = "Debes añadir el Telefono" : '';

        return self::$errores;
    }
}
