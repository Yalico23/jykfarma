<?php

namespace Model;

class Cargo extends ActiveRecord
{
    protected static $tabla = 'cargo';
    protected static $columnasBD = ['Id', 'Cargo'];

    public $Id;
    public $Cargo;


    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? '';
        $this->Cargo = $args['Cargo'] ?? '';
    }

    public function validar()
    {

        !$this->Cargo ? self::$errores[] = "Debes añadir un cargo" : '';

        return self::$errores;
    }
}
