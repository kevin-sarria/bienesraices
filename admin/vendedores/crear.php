<?php

require '../../includes/app.php';

use App\Vendedor;

estadoAutenticado();


$vendedor = new Vendedor;

// Arreglo con mensajes de errores
$errores = Vendedor::getErrores();


// Ejecutar el código despues de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Crea una nueva instancia
    $vendedor = new Vendedor($_POST['vendedor']);

    // Validar
    $errores = $vendedor->validar();

    if (empty($errores)) {

        // Guarda en la base de datos
        $vendedor->guardar();

    }
}
incluirTemplate('header');
?>


<main class="contenedor seccion">
    <h1>Registrar Vendedor</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) { ?>

        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php } ?>

    <form class="formulario" method="POST">

        <?php include '../../includes/templates/formulario_vendedores.php' ?>

        <input type="submit" value="Registrar Vendedor" class="boton boton-verde">

    </form>

</main>

<?php
incluirTemplate('footer');
?>