<?php
define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');

function incluirTemplate( string $nombre, bool $inicio = false, bool $es_pagina_administracion = false){
    include TEMPLATES_URL . "/{$nombre}.php";
}



function estaAuntenticado(){
    session_start();
    if($_SESSION['login']){
        header('location: /bienesraices_inicio/index.php');
    }


}

function debuguear($variable){
    echo "<prev>">
    var_dump($variable);
    echo "</prev>";
    exit;
}

//Escapa / sanitizar el html
function s($html) : string{
    $s = htmlspecialchars($html);
    return $s; 
}

//validar tipo de contenido
function validarTipoContenido($tipo){
    $tipos =['vendedor','propiedad'];

    return in_array($tipo,$tipos);
}
//muestra los mensajes
function mostrarNotificacion($codigo){
    $mensaje ='';

    switch($codigo){
        case 1:
            $mensaje = 'Actualizado Correctamente';
            break;
        case 2:
            $mensaje = 'Eliminado Correctamente';
            break;
        case 3:
            $mensaje = 'Creado Correctamente';
            break; 
        default:
            $mensaje = false;
            break;
    
    }   
    return $mensaje;
}

function validarORedireccionar(string $url){
    //Validar la URL por ID valido
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id){
        header("Location: ${url}");
    }

    return $id;
}