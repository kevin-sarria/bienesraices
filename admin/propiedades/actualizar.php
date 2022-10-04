<?php

    require '../../includes/funciones.php';
    $auth = estadoAutenticado();

    if(!$auth) {
        header('location: /');
    }


    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if(!$id) {
        header('location: /admin');
    }


    //var_dump($id);

    // Base de datos
    require '../../includes/config/database.php';

    $db = conectarDB();



    // Obtener los datos de la propiedad
    $consultaPropiedad = "SELECT * FROM propiedades WHERE id=${id}";
    $resultadoPropiedad =  mysqli_query($db,    $consultaPropiedad);
    $propiedad = mysqli_fetch_assoc($resultadoPropiedad);

    // echo "<pre>";
    // var_dump($propiedad);
    // echo "</pre>";



    // Consultar para obtener los vendedores
    $consulta = "SELECT * FROM vendedores";
    $resulado = mysqli_query($db, $consulta);


    // Arreglo con mensajes de errores
    $errores = [];

    $titulo = $propiedad['titulo'];
    $precio = $propiedad['precio'];
    $descripcion = $propiedad['descripcion'];
    $habitaciones = $propiedad['habitaciones'];
    $wc = $propiedad['wc'];
    $estacionamiento = $propiedad['estacionamiento'];
    $vendedorID = $propiedad['vendedorId'];
    $imagenPropiedad = $propiedad['imagen'];

    // Ejecutar el código despues de que el usuario envia el formulario
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorID = mysqli_real_escape_string($db, $_POST['vendedorId']);

    // Asignar files hacia una variable
    $imagen = $_FILES['imagen'];


    if(!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }

    if(!$precio) {
        $errores[] = "Debes añadir un precio";
    }

    if(strlen($descripcion) < 50 ) {
        $errores[] = "La descripción es obligatoria y debe tener al menos 50 caracteres";
    }

    if(!$habitaciones) {
        $errores[] = "El número de habitaciones es obligatorio";
    }

    if(!$wc) {
        $errores[] = "El número de baños es obligatorio";
    }

    if(!$estacionamiento) {
        $errores[] = "El número de estacionamientos es obligatorio";
    }

    if(!$vendedorID) {
        $errores[] = "Elige un vendedor";
    }



    // Validar por tamaño
    $medida = 1000 * 1000;


    if($imagen['size'] > $medida || $imagen['error']) {
        $errores[] = 'La Imagen es muy pesada';
    }



    // Revisar que el Array de errores este vacio.
    if(empty($errores)) {


        // Crear carpeta
        $carpetaImagenes = '../../imagenes/';

        if(!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $nombreImagen = '';

        /*  SUBIDA DE ARCHIVOS */

        if($imagen['name']) {
            // Eliminar la imagen previa
            unlink($carpetaImagenes . $propiedad['imagen']);

            // Generar un nombre unico
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // Subir la imagen
            move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);


        }else {
            $nombreImagen = $propiedad['imagen'];
        }


        




        // Insertar en la base de datos
        $query = " UPDATE propiedades SET titulo = '${titulo}', precio = '${precio}', imagen = '${nombreImagen}',  descripcion = '${descripcion}', habitaciones = ${habitaciones}, wc = ${wc}, estacionamiento = ${estacionamiento}, vendedorId = '${vendedorID}' WHERE id= ${id}";

        $resultado = mysqli_query($db, $query);

        if($resultado) {
            header('location: /admin?resultado=2');
        }
    }


    
}

    incluirTemplate('header');
?>


    <main class="contenedor seccion">
        <h1>Actualizar</h1>

        <a href="/admin" class="boton boton-verde">Volver</a>

        <?php foreach($errores as $error){ ?>

        <div class="alerta error">
            <?php echo $error; ?>
        </div>

        <?php } ?>

        <form class="formulario" method="POST" enctype="multipart/form-data">

            <fieldset>
                <legend>Información General</legend>

                <label for="titulo">Titulo:</label>
                <input type="text"id="titulo" placeholder="Titulo Propiedad" name="titulo" value="<?php echo $titulo; ?>">

                <label for="precio">Precio:</label>
                <input type="number"id="precio" placeholder="Precio Propiedad" name="precio" value="<?php echo $precio; ?>">


                <label for="imagen">Imagen:</label>
                <input type="file" id="imagen" accept="image/jpeg, image/png" name="imagen">

                <img src="/imagenes/<?php echo $imagenPropiedad; ?>" class="imagen-small">


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
                    <option>-- Seleccione vendedor --</option>
                    <?php while($vendedor = mysqli_fetch_assoc($resulado)): ?>
                        <option <?php echo $vendedorID == $vendedor['id'] ? 'selected' : '' ?> value="<?php echo $vendedor['id']; ?>"><?php echo $vendedor['nombre'] . " " . $vendedor['apellido']; ?></option>
                    <?php endwhile; ?>
                </select>

            </fieldset>

            <input type="submit" value="Actualizar Propiedad" class="boton boton-verde">

        </form>

    </main>

<?php
    incluirTemplate('footer');
?>