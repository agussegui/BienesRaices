<?php

namespace MVC;

class Router{

    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }
    
    public function comprobarRutas(){

        session_start();
        $auth = $_SESSION['login'] ??  null;

        //Arreglo de rutas protegias
        $rutas_protegidas = [
            '/admin', 
            '/propiedades/crear', 
            '/propiedades/actualizar',
            '/propiedades/eliminar',
            '/vendedores/crear',
            '/vendedores/actualizar',
            '/vendedores/eliminar'
        ];

        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];
        
        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
        }else{
            $fn = $this->rutasPOST[$urlActual] ?? null;
        }

        //proteger las rutas
        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header('location: /');
        }

        //hay mas rutas relacionadas con GET Y POST como PUT Y PATCH(se refiere a actualizar)
        // Y DELETE

        if($fn){
            //la URL existe y hay una funcion asociada
            call_user_func($fn, $this);
        }else{
            echo "pagina no encontrada";
        }
        
    }

    //Muestra una vista
    public function render($view, $datos = []){

        foreach($datos as $key => $value){
            $$key = $value; //
        }
        
        ob_start();//inicia el almacenamiento en memoria osea el script de views
        include_once __DIR__ . "/views/$view.php";
        
        $contenido = ob_get_clean(); // Limpia el Buffer
        include_once __DIR__ . '/views/layout.php';
    }
    
}