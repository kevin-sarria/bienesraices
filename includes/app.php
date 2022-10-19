<?php 


require 'funciones.php';
require 'config/database.php';
require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../clases/ActiveRecord.php';
require __DIR__ . '/../clases/Propiedad.php';
require __DIR__ . '/../clases/Vendedor.php';



// Coenctarnos a la base de datos
$db = conectarDB();

use App\ActiveRecord;

ActiveRecord::setDB($db);


