
<?php 

    if(!isset($_SESSION)) {
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
    <link rel="stylesheet" href="/bienesraices_inicio/build/css/app.css">
    <title>Bienes raices</title>
</head>

<body>

    <header class="header <?php echo $inicio ? 'inicio' : '' ?>">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/bienesraices_inicio/index.php">
                    <img src="/bienesraices_inicio/build/img/logo.svg" alt="Logotipo de Bienes Raices">
                </a>
                <div class="mobile-menu">
                    <img src="/bienesraices_inicio/build/img/barras.svg" alt="icono menu responsive">
                </div>

                <div class="derecha">

                    <img class="dark-mode-boton" src="/bienesraices_inicio/build/img/dark-mode.svg" alt="icono dark mode">

                    <nav class="navegacion">
                        <a href="/bienesraices_inicio/nosotros.php">Nosotros</a>
                        <a href="/bienesraices_inicio/anuncios.php">Anuncios</a>
                        <a href="/bienesraices_inicio/blog.php">Blog</a>
                        <a href="/bienesraices_inicio/contacto.php">Contacto</a>
                        <?php if($auth): ?>
                            <a href="/bienesraices_inicio/cerrar-sesion.php">Cerrar sesion</a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div><!-- .barra -->

            <?php
                echo $inicio ? "<h1>Venta de Casas y Departamentos Exclusivos de Lujo</h1>" : '';

            ?>

        </div>

        </div>
    </header>