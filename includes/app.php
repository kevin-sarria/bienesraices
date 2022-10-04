<?php 


require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../clases/propiedad.php';


// Coenctarnos a la base de datos
$db = conectarDB();



use App\Propiedad;

Propiedad::setDB($db);


