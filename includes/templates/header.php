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
    <link rel="stylesheet" href="/bienesraices_inicio/build/css/app.css">
</head>
<body>
    

    <header class="header <?php echo $inicio ? 'inicio' : ''; ?>">
        <div class="contenedor contenido-header">
            <h1>Venta de Casas y Departamentos Exclusivos de Lujo </h1>
            <div class=" contenedor header-resumen">
                <div class="header-resumen-box">
                    <h2 class="header-resumen-title">650</h2>
                    <p class="header-resumen-paragraph">Productos Premium</p>
                </div>
                <div class="header-resumen-box">
                    <h2 class="header-resumen-title">+2500</h2>
                    <p class="header-resumen-paragraph">Clientes Felices</p>
                </div>
                <div class="header-resumen-box">
                    <h2 class="header-resumen-title">12</h2>
                    <p class="header-resumen-paragraph" >Años Vendiendo</p>
                </div>
            </div>
            <div class="header-box">
                <button class="header-box-button">
                    <img src="../build/img/flecha.svg" alt="flecha">
                </button>
            </div>
        </div>
    </header> 
