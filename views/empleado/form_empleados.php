<fieldset>
    <div>
        <label for="Nombre">Nombre del Empleado</label>
        <input type="text" placeholder="name..." id="Nombre" name="Nombre" value="<?php echo $empleado->Nombre ?>">

        <label for="Apellido">Apellido del Empleado</label>
        <input type="text" placeholder="apellido..." id="Apellido" name="Apellido" value="<?php echo $empleado->Apellido ?>">
        
        <label for="Telefono">Telefono del Empleado</label>
        <input type="number" placeholder="999 999 999" id="Telefono" name="Telefono" value="<?php echo $empleado->Telefono ?>">

        <label for="Imagen">Imagen</label>
        <input type="file" id="Imagen" name="Imagen" accept="image/jpeg, image/png , image/webp">
        <?php if ($empleado->Imagen) : ?>
            <img src="/imagenes/<?php echo $empleado->Imagen ?>" alt="Imagen" class="imagen-small">
        <?php endif; ?>
    </div>
    <div>
        <label for="CorreoFarma">Correo</label>
        <input type="email" placeholder="correo@correo" name="CorreoFarma" id="CorreoFarma" value="<?php echo $empleado->CorreoFarma ?>">
        
        <label for="Password">Contraseña</label>
        <input type="text" placeholder="contraseña..." name="Password" id="Password" value="<?php echo $empleado->Password ?>">

        <label for="IdCargo">Cargo</label>
        <select name="IdCargo" id="IdCargo">
            <option value="" disabled selected>--Seleccionar--</option>
            <?php foreach ($cargos as $cargo) : ?>
                <option <?php echo $empleado->IdCargo === $cargo->Id ? 'selected' : ''; ?> value="<?php echo $cargo->Id ?>"><?php echo $cargo->Cargo?></option>
            <?php endforeach; ?>

        </select>
    </div>
</fieldset>