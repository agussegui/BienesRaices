<?php

namespace Controllers;
use MVC\Router;
use Model\propiedad;
use Model\vendedor;
use Intervention\Image\ImageManagerStatic as Image;


class PropiedadController{

    public static function index(Router $router){
        
        $propiedades = Propiedad::all();

        $vendedor = Vendedor::all();
        //Muestra mensaje condicional
        $resultado = $_GET['resultado'] ?? null; // buscar el valor resultado y si no existe entonces le asigna null



        $router->render('propiedades/admin',[
            'propiedades' => $propiedades,
            'resultado' => $resultado,
            'vendedores' => $vendedor
        ]);
    }

    public static function crear(Router $router){

        $propiedad = new Propiedad;
        $vendedor = Vendedor::all();
        //Arreglo con mensaje de errores
        $errores = Propiedad::getErrores();

    
        //Ejecutar el codigo despues de que el usuario envia el formulario y SERVER nos trae mas detalladamente 
        //la informacion que hay adentro de un servidor
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            // los sanitizadores van a limpiar tus variables y van a eliminar lo que no es nesesario
            $propiedad = new Propiedad($_POST['propiedad']);
            

            //Generar un nombre unico a la imagen
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";

            //Realiza un resize a la imagen con intervetion Libreria
            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600); 
                $propiedad->setImagen($nombreImagen);
            }

            
        
            //Validar
            $errores = $propiedad->validar();

            //Revisar que el array este vacio
            if(empty($errores)){
            

                //Crear la carpeta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                //guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //guarda en la base de datos
                //crea una nueva instancia
                $propiedad->guardar();
            }
        }

        $router->render('propiedades/crear',[
            'propiedad' => $propiedad,
            'vendedor' => $vendedor,
            'errores' => $errores
        ]);{}
         
    }

    public static function actualizar(Router $router){
        
        $id =validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);

        $vendedor = Vendedor::all();

        $errores = Propiedad::getErrores();

        //Ejecutar el codigo despues de que el usuario envia el formulario y SERVER nos trae mas detalladamente la informacion que hay adentro de un servidor
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //asignar los atributos
            $args = $_POST['propiedad'];

            $propiedad->sincronizar($args);   

            //validacion
            $errores = $propiedad->validar();

            //subir archivos
            //Generar un nombre unico a la imagen
            $nombreImagen = md5( uniqid( rand(), true) ) . ".jpg";

            if($_FILES['propiedad']['tmp_name']['imagen']){
                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800,600); 
                $propiedad->setImagen($nombreImagen);
            }

            //Revisar que el array este vacio
            if(empty($errores)){
                if($_FILES['propiedad']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                //almacenar la imagen
                $propiedad->guardar();
            }
        }

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad,
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar(){
        //revisa el request_method 
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            //validar id
            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);
            if($id){
                $tipo = $_POST['tipo'];
                if(validarTipoContenido($tipo)){
                    //compara lo que vamos a eliminar
                    $propiedad = Propiedad::find($id);
                    $propiedad->eliminar();
                    
                }  
            }
        }
    }
}