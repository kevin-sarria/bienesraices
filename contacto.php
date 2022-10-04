

<?php

require 'includes/app.php';
incluirTemplate('header');
?>



    <main class="contenedor seccion">
        <h1>Contacto</h1>

        <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jpeg">
            <img loading="lazy" src="build/img/destacada.jpg" alt="Imagen Contacto">
        </picture>


        <h2>Llene el formulario</h2>

        <form class="formulario">
            <fieldset>
                <legend>Información Personal</legend>

                <label for="name">Nombre</label>
                <input type="text" name="name" id="name" placeholder="Tu nombre">

                <label for="mail">Email</label>
                <input type="email" name="mail" id="mail" placeholder="Tu correo">

                <label for="telefono">Teléfono</label>
                <input type="tel" name="telefono" id="telefono" placeholder="Tu telefono">


                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje"></textarea>

            </fieldset>

            <fieldset>
                <legend>Información sobre la propiedad</legend>
                <label for="opciones">Vende o Compra:</label>
                <select name="opciones" id="opciones">
                    <option value="" disabled selected>-- Seleccione una opcion --</option>
                    <option value="Compra">Compra</option>
                    <option value="Compra">Vende</option>
                </select>

                <label for="presupuesto">Precio o Presupuesto</label>
                <input type="number" name="presupuesto" id="presupuesto" placeholder="Tu precio o presupuesto">

            </fieldset>


            <fieldset>
                <legend>Información sobre la propiedad</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">

                    <label for="contactar-telefono">Teléfono</label>
                    <input type="radio" name="contacto" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">Email</label>
                    <input type="radio" name="contacto" value="email" id="contactar-email">

                </div>

                <p>Si eligió teléfono, elija la fecha y la hora</p>

                <label for="fecha">Fecha</label>
                <input type="date" name="fecha" id="fecha">

                <label for="hora">Hora</label>
                <input type="time" name="hora" id="hora" min="09:00" max="18:00">

            </fieldset>

            <input type="submit" value="Enviar" class="boton-verde">

        </form>



    </main>




    <?php
        incluirTemplate('footer');
    ?>
</body>

</html>