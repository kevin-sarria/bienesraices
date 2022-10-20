<?php

require 'includes/app.php';
$db = conectarDB();

$errores = [];


if($_SERVER['REQUEST_METHOD'] === 'POST') {
    

    $email = mysqli_real_escape_string($db, filter_var($_POST['email'], FILTER_VALIDATE_EMAIL));

    $password = mysqli_real_escape_string($db, $_POST['password']);

    if(!$email) {
        $errores[] = "El email es obligatorio o no es válido";
    }

    if(!$password) {
        $errores[] = "La contraseña es obligatoria o no es válida";
    }

    if(empty($errores)) {
        
        // Revisar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '${email}'";
        $resultado = mysqli_query($db, $query);

        

        if($resultado->num_rows) {
            // Revisar si el password es correcto
            $usuario = mysqli_fetch_assoc($resultado);

            // Verificar si es password es correcto o no
            $auth = password_verify($password, $usuario['password']);

            if($auth) {
                // El usuario esta autenticado
                session_start();

                // Llenar el arreglo de la sesión
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('location: /admin/index.php');
                

            }else {
                $errores[] = "La contraseña es incorrecta";    
            }


        }else {
            $errores[] = "El usuario no existe";
        }

    }


}

incluirTemplate('header');



?>

<main class="contenedor seccion contenido-centrado">
    
    <h1>Iniciar sesion</h1>

    <?php foreach($errores as $error): ?>

    <div class="alerta error">
        <?php echo $error ?>
    </div>

    <?php endforeach; ?>

    <form method="POST" class="formulario" novalidate>
    
        <legend>Correo y Contraseña</legend>

        <label for="email">Email</label>
        <input type="email" name="email" id="email" placeholder="Tu correo" required>

        <label for="password">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Tu contraseña" required>

        <input type="submit" value="Iniciar Sesion" class="boton boton-verde">

    </form>


</main>

<?php
incluirTemplate('footer');
?>