

<?php

    require 'includes/app.php';
    incluirTemplate('header');
    ?>



    <main class="contenedor seccion">
        <h1>Conoce sobre nosotros</h1>


        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="build/img/nosotros.webp" type="image/webp">
                    <source srcset="build/img/nosotros.jpg" type="image/jpeg">
                    <img loading="lazy" src="build/img/nosotros.jpg" alt="Sobre Nosotros">
                </picture>
            </div>

            <div class="texto-nosotros">
                <blockquote>25 Años de experiencia</blockquote>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium, optio sed nam nemo explicabo maxime ratione officia! Deleniti quis at excepturi enim libero tempora modi mollitia molestias nisi eius. Aliquam facere non in blanditiis ea recusandae totam. Incidunt corrupti quidem nemo sed nisi, aperiam earum consequatur ad. Consectetur, debitis vero at dignissimos porro dolor perspiciatis commodi quod illum cupiditate minima?</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat sequi adipisci amet, maiores aliquid, neque, recusandae dolor veritatis repudiandae asperiores deleniti optio iusto cum. Iusto, dolorum explicabo optio temporibus laboriosam incidunt necessitatibus dolorem nemo natus veritatis velit quaerat laborum a.</p>

            </div>


        </div>
    </main>


    <!-- Iconos Parte Inferior -->

    <section class="contenedor seccion">
        <h1>Más sobre nosotros</h1>

        <div class="iconos-nosotros">
            <div class="icono">
                <img src="build/img/icono1.svg" alt="Icono seguridad" loading="lazy">
                <h3>Seguridad</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta assumenda harum nobis maiores enim cumque facere veritatis ullam, eveniet sunt expedita at minus, explicabo nam. Aliquam similique sed quia, sint impedit quae quod ipsum voluptatibus et a incidunt libero laborum!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono2.svg" alt="Icono precio" loading="lazy">
                <h3>Precio</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta assumenda harum nobis maiores enim cumque facere veritatis ullam, eveniet sunt expedita at minus, explicabo nam. Aliquam similique sed quia, sint impedit quae quod ipsum voluptatibus et a incidunt libero laborum!</p>
            </div>

            <div class="icono">
                <img src="build/img/icono3.svg" alt="Icono tiempo" loading="lazy">
                <h3>Tiempo</h3>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta assumenda harum nobis maiores enim cumque facere veritatis ullam, eveniet sunt expedita at minus, explicabo nam. Aliquam similique sed quia, sint impedit quae quod ipsum voluptatibus et a incidunt libero laborum!</p>
            </div>

        </div>

    </section>



    <?php
        incluirTemplate('footer');
    ?>

</body>

</html>