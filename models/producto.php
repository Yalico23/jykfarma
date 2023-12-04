<?php

namespace Model;

class Producto extends ActiveRecord
{
    protected static $tabla = 'producto';
    protected static $columnasBD = ['Id', 'Nombre','Descripcion','Precio','Stock','Imagen','IdProveedor'];

    public $Id;
    public $Nombre;
    public $Descripcion;
    public $Precio;
    public $Stock;
    public $Imagen;
    public $IdProveedor;


    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? '';
        $this->Nombre = $args['Nombre'] ?? '';
        $this->Descripcion = $args['Descripcion'] ?? '';
        $this->Precio = $args['Precio'] ?? '';
        $this->Stock = $args['Stock'] ?? '';
        $this->Imagen = $args['Imagen'] ?? '';
        $this->IdProveedor = $args['IdProveedor'] ?? '';
    }

    public function validar()
    {

        !$this->Nombre ? self::$errores[] = "Debes añadir el Nombre" : '';
        !$this->Descripcion ? self::$errores[] = "Debes añadir el Descripcion" : '';
        !$this->Precio ? self::$errores[] = "Debes añadir el Precio" : '';
        !$this->Stock ? self::$errores[] = "Debes añadir el Stock" : '';
        !$this->Imagen ? self::$errores[] = "Debes añadir el Imagen" : '';
        !$this->IdProveedor ? self::$errores[] = "Debes añadir al proveedor" : '';

        return self::$errores;
    }
}
