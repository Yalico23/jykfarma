<?php
namespace Model;

class Proveedor extends ActiveRecord
{
    protected static $tabla = 'proveedor';
    protected static $columnasBD = ['Id', 'Nombre','Empresa','Direccion','Imagen','DNI','Telefono'];

    public $Id;
    public $Nombre;
    public $Empresa;
    public $Direccion;
    public $Imagen;
    public $DNI;
    public $Telefono;


    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? '';
        $this->Nombre = $args['Nombre'] ?? '';
        $this->Empresa = $args['Empresa'] ?? '';
        $this->Imagen = $args['Imagen'] ?? '';
        $this->Direccion = $args['Direccion'] ?? '';
        $this->Telefono = $args['Telefono'] ?? '';
        $this->DNI = $args['DNI'] ?? '';
    }

    public function validar()
    {

        !$this->Nombre ? self::$errores[] = "Debes añadir el Nombre" : '';
        !$this->Empresa ? self::$errores[] = "Debes añadir  Empresa" : '';
        !$this->Imagen ? self::$errores[] = "Debes añadir el Imagen" : '';
        !$this->Direccion ? self::$errores[] = "Debes añadir el Direccion" : '';
        !$this->Telefono ? self::$errores[] = "Debes añadir el Telefono" : '';
        !$this->DNI ? self::$errores[] = "Debes añadir el DNI" : '';

        return self::$errores;
    }
}
