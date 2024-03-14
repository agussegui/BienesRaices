<?php

namespace Controllers;

use MVC\Router;
use Model\propiedad;
use PHPMailer\PHPMailer\PHPMailer;
use SplSubject;

class PaginasController{
    public static function index(Router $router){

        $propiedades = propiedad::get(3);
        
        $inicio = true;

        $router->render('paginas/index', [
            'propiedades' => $propiedades,
            'inicio' => $inicio

        ]);
    }

    public static function nosotros(Router $router){

        $router->render('paginas/nosotros');
    }

    public static function propiedades(Router $router){
        
        $propiedades = Propiedad::all();

        $router->render('paginas/propiedades',[
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad(Router $router ) {

        $id = validarORedireccionar('/propiedades');
        
        // Buscar la propiedad por su id
        $propiedad = Propiedad::find($id);

        $router->render('paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog(Router $router){
        
        $router->render('paginas/blog');
    }

    public static function entrada(Router $router){
        $router->render('paginas/entrada');
    }

    public static function contacto(Router $router){

        $mensaje = null;

        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $respuestas = $_POST['contacto'];

            //Crear una instancia de PHPmailer 
            $mail = new PHPMailer();

            //Configurar SMTP se utiliza para el envio emails
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true; 
            $mail->Username = '88bd9479d9db5c';
            $mail->Password = '48a2574a0f232a';
            $mail->SMTPSecure = 'tls';
            $mail->Port = '2525';
            
            
            //configurar el contenido del email
            $mail->setFrom('admin@bienesRaices.com'); //esto es quien envia el email
            $mail->addAddress('admin@bienesRaices.com','Bienes Raices.com');
            $mail->Subject ='Tienes un nuevo mensaje';

            //habilitar el HTML
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';

            //definir el contenido
            $contenido = '<html>';

            $contenido .= '<p>Tienes un nuevo mensaje</p>';
            $contenido .= '<p>Nombre: '. $respuestas['nombre'] .'</p>';

            //enviar de forma condicional algunos campos de email o telefono
            if($respuestas['contacto'] === 'telefono'){
                $contenido .= '<p> Eligio ser contacto por via Telefono </p>';
                $contenido .= '<p>Telefono: '. $respuestas['telefono'] .'</p>';
                $contenido .= '<p>Fecha de contacto: '. $respuestas['fecha'] .'</p>';
                $contenido .= '<p>Hora: '. $respuestas['hora'] .'</p>';

            }else{
                //Es email, entonces agregamos el campo email
                $contenido .= '<p> Eligio ser contacto por via Email </p>';
                $contenido .= '<p>Email: '. $respuestas['email'] .'</p>';
            }

            
            $contenido .= '<p>Mensaje: '. $respuestas['mensaje'] .'</p>';
            $contenido .= '<p>Vende o Compra: '. $respuestas['tipo'] .'</p>';
            $contenido .= '<p>Precio O Presupuesto: $ '. $respuestas['precio'] .'</p>';     
            $contenido .= '<p>Prefiere ser contactado por: '. $respuestas['contacto'] .'</p>';
            

            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = 'Esto es texto alternatico sin html';
        
            //enviar el email
            if($mail->send()){
                $mensaje = "Mensaje enviado correctamente";
            }else{
                $mensaje = "El mensaje no se pudo enviar";
            }
        
        }


       

        $router->render('paginas/contacto',[
            'mensaje' => $mensaje
        ]);
    }

    
}