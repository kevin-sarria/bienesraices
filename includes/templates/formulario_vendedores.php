


<fieldset>
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" placeholder="Nombre Vendedor" name="vendedor[nombre]" value="<?php echo s($vendedor->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" placeholder="Apellido Vendedor" name="vendedor[apellido]" value="<?php echo s($vendedor->apellido); ?>">


    <label for="telefono">Telefono:</label>
    <input type="number" id="telefono" placeholder="Telefono Aquí" name="vendedor[telefono]" value="<?php echo s($vendedor->telefono); ?>">

</fieldset>