<?php

require '../../includes/app.php';

use App\Vendedor;

estadoAutenticado();

$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if(!$id) {
    header('location: /admin');
}

// Obtener los datos del vendedor
$vendedor = Vendedor::find($id);

// Arreglo con mensajes de errores
$errores = Vendedor::getErrores();


// Ejecutar el código despues de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Asignar los atributos
    $args = $_POST['vendedor'];

    $vendedor->sincronizar($args);

    // Validar
    $errores = $vendedor->validar();

    if (empty($errores)) {

        // Guarda en la base de datos
        $resultado = $vendedor->actualizar();

    }
}
incluirTemplate('header');
?>


<main class="contenedor seccion">
    <h1>Actualizar Vendedor</h1>

    <a href="/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) { ?>

        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php } ?>

    <form class="formulario" method="POST">

        <?php include '../../includes/templates/formulario_vendedores.php' ?>

        <input type="submit" value="Guardar Cambios" class="boton boton-verde">

    </form>

</main>

<?php
incluirTemplate('footer');
?>