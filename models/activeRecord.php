<?php

namespace Model;

class ActiveRecord
{
    protected static $db;
    protected static $columnasBD = []; 
    protected static $tabla = '';
    protected static $errores = [];
    public $Id;
    public $Imagen;   
    /******************************************** */
    public static function setDB($database)
    {
        self::$db = $database;
    }

    /************************************************************** */
    public static function getErrores()
    {
        return static::$errores;
    }

    public function validar() 
    {
        static::$errores = [];
        return static::$errores;
    }
    /************************************************************************ */
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasBD as $columna) {
            if ($columna === 'Id') continue; 
            $atributos[$columna] = $this->$columna; 
        }
        return $atributos;
        
    }

    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = []; 
        foreach ($atributos as $key => $value) { 
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
    /******************************************** */
    //Subida de archivos
    public function SetFiles($Imagen)
    {
        if ($this->Id != '') {
            $this->BorrarImagen();
        }
        if ($Imagen) {
            $this->Imagen = $Imagen;
        }
    }
    public function BorrarImagen()
    {
        $existeimagen = file_exists(CARPETA_IMAGENES . $this->Imagen);
        if ($existeimagen) {
            unlink(CARPETA_IMAGENES . $this->Imagen);
        }
    }
    /******************************************** */
    public function guardar($tipoEmpleado)
    {
        if ($this->Id != '') {
            return $this->actualizar($tipoEmpleado);
        } else {
            return $this->crear($tipoEmpleado);
        }
    }

    public function crear($tipoEmpleado)
    {
        $atributos = $this->sanitizarAtributos();

        $columnas = join(', ', array_keys($atributos));
        $filas = join("', '", array_values($atributos));

        //*  Consulta para insertar datos
        $query = "INSERT INTO " . static::$tabla . " ($columnas) VALUES ('$filas')";

        $resultado = self::$db->query($query);
        if($resultado) {
            // Redireccionar al usuario.
            header("Location: /admin?resultado=1&Tipo=$tipoEmpleado");
        }
    }
    public function actualizar($tipoEmpleado)
    {
        $atributos = $this->sanitizarAtributos();
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "$key = '$value' ";
        }
        $update = join(', ', $valores);
        $query = "UPDATE " . static::$tabla . " SET $update ";
        $query .= " WHERE Id = '" . self::$db->escape_string($this->Id) . "'";
        $query .= " LIMIT 1";
        $resultado = self::$db->query($query);
        if ($resultado) {
            header("Location: /admin?resultado=2&Tipo=$tipoEmpleado");
        }
    }
    public function eliminar($tipoEmpleado)
    {
        //debuguear("ELiminar....". $this->Id);
        $query = "DELETE FROM " . static::$tabla . " WHERE Id = " . self::$db->escape_string($this->Id) . " LIMIT 1";
        //debuguear($query);
        $resultado = self::$db->query($query);
        if ($resultado) {
            $this->BorrarImagen();
            header("Location: /admin?resultado=3&Tipo=$tipoEmpleado");
        }
    }

    public static function all()
    {
        $query = "SELECT * FROM " . static::$tabla; 
        $resultado = self::consultaSQL($query);
        return $resultado;
    }
    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad; 
        $resultado = self::consultaSQL($query);
        return $resultado;
    }
    public static function find($Id)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE Id = $Id LIMIT 1";
        $resultado = self::consultaSQL($query);
        $resultado = array_shift($resultado);
        return $resultado; 
    }

    public static function consultaSQL($query)
    {
        $resultado = self::$db->query($query);
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }
        $resultado->free();
        return $array;
    }
    protected static function crearObjeto($registro)
    {
        $objeto = new static; 

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    public function sincronizar($args = [])
    { 
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }
}
