<?php

    session_start();

    if(isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>
    <link rel="stylesheet" href="../build/css/app.css">
    <script src="https://kit.fontawesome.com/7badbd514e.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="barra">
        <div class="mobile-menu">
            <img src="../build/img/barras.svg" alt="icono menu responsive">
        </div>
    </div>    
    <div class="navegacion">
        <div class="navegacion-left">
            <a href="/" class="box-logo-enlace">
                <img src="../build/img/logo.png"   alt="Logotipo de Bienes Raices" >
            </a>
        </div>
        <ul class="navegacion-medio">
            <li><a href="/nosotros">Nosotros</a></li>
            <li><a href="/propiedades">Anuncios</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/contacto">Contacto</a></li>
            <li><a href="/login">Iniciar Sesión</a></li>
            <li>
                <?php  if($auth):?>
                    <a href="/logout">Cerrar Sesión</a>
                <?php endif;?>
            </li>
        </ul>
        <div class="navegacion-right">
            <img src="../build/img/dark-mode.svg" alt="dark mode" class="dark-mode-boton">
        </div>
    </div>
</body>    