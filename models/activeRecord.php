<?php

namespace Model;

class activeRecord {
    //Base de datos
    protected static $db;
    //mapear y unir los atributos
    protected static $columnasDB = [];
    protected static $tabla = '';
    protected static $errores = [];

    //Definir la conexion a la base de datos
    public static function setDB($database){
       //self hace referencia a los atributos estaticos
       //de una misma clase
       self::$db = $database;
    }

    public function guardar(){
        
        if(!is_null($this->id)){
            //actualizar
            $this->actualizar();
        }else{
            //creando un nuevo registro
            $this->crear();
        }
    }
    
    public function crear(){

        //Sanitizar los datos
        $atributos = $this->sanizitazarAtributos();


        //Insertar en la base de datos
        $query =  " INSERT INTO ".static::$tabla ." ( ";
        $query .= join(', ',array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ')";

        $resultado = self::$db->query($query);

        //mensaje de exito
        if ($resultado) {
            header('Location:/admin?resultado=3');
        }
    }

    public function actualizar(){
        //Sanitizar los datos
        $atributos = $this->sanizitazarAtributos();

        $valores = [];
        foreach ($atributos as $key => $value){
            $valores[] = "{$key}='{$value}'";
        }

        $query = "UPDATE ". static::$tabla ." SET "; 
        $query .= join(',', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id). "'";
        $query .= "LIMIT 1";

        $resultado = self::$db->query($query);

        if($resultado){
            $this->borrarImagen(); 
            //Redireccionar al usuario
            header('location:/admin?resultado=1');
        }
        
    }

    //Eliminar un registro
    public function eliminar(){
        //Eliminar la propiedad
        $query = "DELETE FROM ". static::$tabla ." WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1 "; 
        $resultado = self::$db->query($query);
        

        if($resultado){
            header('location: /admin?resultado=2');
        } 
    }

    //Identificar y unir los atributos de la BD
    public function atributos(){
        $atributos = [];
        foreach (static:: $columnasDB as $columna){
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanizitazarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    //Subida de archivos
    public function setImagen($imagen){
        //elimina la imagen previa 
        if(!is_null($this->id)){
            $this->borrarImagen();
        }
        //Asignar el atributo de imagen el nombre de la imagen
        if($imagen){
            $this->imagen = $imagen;
        }
    }

    //Elimina la imagen 
    public function borrarImagen(){
        //comprobar si exite el archivo
        $existeArchivo = file_exists(CARPETA_IMAGENES .  $this->imagen);
        if($existeArchivo){
            unlink(CARPETA_IMAGENES .  $this->imagen);
        }
    }

    //validacion
    public static function getErrores(){
        return static::$errores;
    }
   
    public function validar(){
        
        static::$errores =[];
        return static::$errores;
    }

    //Lista todas las registros
    public static function all(){
        
        $query = "SELECT * FROM " . static::$tabla ;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //obtener determinados numeros de registros
    public static function get($cantidad){
        
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad ;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    //Buscar un registro por su id
    public static function find($id){
        $query = "SELECT * FROM ". static::$tabla ." WHERE id = ${id}"; 

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }


    public static function consultarSQL($query){
        //consultar la base de datos
        $resultado = self::$db->query($query);
 
        //iterar los resultados
        $array =[];
        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }

        //liberar la memoria
        $resultado->free();

        //retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;

        foreach($registro as $key => $value){
            if( property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    //Sincroniza el objeto en memoria con los cambios realizados por el usuario
    public function sincronizar($args = []){
        foreach($args as $key => $value){
            if( property_exists($this, $key)&& !is_null($value)){
                $this->$key = $value;
            }
        }    
    }
}