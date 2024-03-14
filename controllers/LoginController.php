<?php 

namespace Controllers;
use MVC\Router;
use Model\admin;


class LoginController{

    public static function login(Router $router){
        
        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $auth = new admin($_POST);

            $errores = $auth->validar();

            if(empty($errores)){
                //verificar si el usuario existe
                $resultado = $auth->existeUsuario();

                if(!$resultado){
                    //verificar si el usuario existe o no
                    $errores = admin::getErrores();

                } else{
                    //verificar el password
                    $autenticado = $auth->comprobarPassword($resultado);

                    if($autenticado){
                        //autenticar el usuario
                        $auth->autenticar();
                    } else{
                        //si el password es incorrecto sale el mensaje de error
                        $errores = admin::getErrores();
                    }

                    //autenticar el usuario

                }
              
            }
        }

        $router->render('auth/login',[
            'errores' => $errores
        ]);

    }

    public static function logout(){
        session_start();

        $_SESSION = [];

        HEADER('location: / ');
    }


}