<?php 

require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';

//Conectarnos a la base de datos

// Añadir Dotenv
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

use Model\activeRecord;

activeRecord::setDB($db);