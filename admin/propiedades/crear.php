<?php

require '../../includes/app.php';

use App\Propiedad;
use Intervention\Image\ImageManagerStatic as Image;

estadoAutenticado();

$db = conectarDB();

// Consultar para obtener los vendedores
$consulta = "SELECT * FROM vendedores";
$resulado = mysqli_query($db, $consulta);


// Arreglo con mensajes de errores
$errores = Propiedad::getErrores();




$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorID = '';
$creado = date('Y-m-d');

// Ejecutar el código despues de que el usuario envia el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    // Crea una nueva instancia
    $propiedad = new Propiedad($_POST);

    /*  SUBIDA DE ARCHIVOS */

    // Generar un nombre unico
    $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

    // Setear la imagen
    // Realiza un resize a la imagen con intervention
    if($_FILES['imagen']['tmp_name']) {
        $image = Image::make($_FILES['imagen']['tmp_name'])->fit(800, 600);
        $propiedad->setImagen($nombreImagen);
    }

    // Validar
    $errores = $propiedad->validar();

    if (empty($errores)) {

        // Crear la carpeta para subir imagenes
        if(!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
        }

        // $propiedad->guardar();

        // Guarda la imagen en el servidor
        $image->save(CARPETA_IMAGENES . $nombreImagen);

        // Guarda en la base de datos
        $resultado = $propiedad->guardar();

        // Mensaje de exito u error
        if ($resultado) {
            header('location: /bienesraices_inicio/admin?resultado=1');
        }
    }
}
incluirTemplate('header');
?>


<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/bienesraices_inicio/admin" class="boton boton-verde">Volver</a>

    <?php foreach ($errores as $error) { ?>

        <div class="alerta error">
            <?php echo $error; ?>
        </div>

    <?php } ?>

    <form action="/bienesraices_inicio/admin/propiedades/crear.php" class="formulario" method="POST" enctype="multipart/form-data">

        <fieldset>
            <legend>Información General</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" id="titulo" placeholder="Titulo Propiedad" name="titulo" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="number" id="precio" placeholder="Precio Propiedad" name="precio" value="<?php echo $precio; ?>">


            <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">


            <label for="descripcion">Descripción:</label>
            <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>

        <fieldset>
            <legend>Información Propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" id="habitaciones" placeholder="Ej: 3" min="1" max="9" name="habitaciones" value="<?php echo $habitaciones; ?>">


            <label for="wc">Baños:</label>
            <input type="number" id="wc" placeholder="Ej: 3" min="1" max="9" name="wc" value="<?php echo $wc; ?>">


            <label for="estacionamiento">Estacionamiento:</label>
            <input type="number" id="estacionamiento" placeholder="Ej: 3" min="1" max="9" name="estacionamiento" value="<?php echo $estacionamiento; ?>">
        </fieldset>


        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedorId">
                <option value="" selected>-- Seleccione vendedor --</option>
                <?php while ($vendedor = mysqli_fetch_assoc($resulado)) : ?>
                    <option <?php echo $vendedorID === $vendedor['id'] ? 'selected' : '' ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                <?php endwhile; ?>
            </select>

        </fieldset>

        <input type="submit" value="Crear Propiedad" class="boton boton-verde">

    </form>

</main>

<?php
incluirTemplate('footer');
?>