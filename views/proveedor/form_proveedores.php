<fieldset>
    <div>
        <label for="Empresa">Nombre Proveedor</label>
        <input type="text" placeholder="Nombre Empresa" id="Empresa" name="Empresa" value="<?php echo $proveedor->Empresa?>" >

        <label for="Direccion">Direccion</label>
        <input type="text" placeholder="SJL..." id="Direccion" name="Direccion" value="<?php echo $proveedor->Direccion?>">

        <label for="Imagen">IMG Empresa</label>
        <input type="file" name="Imagen" id="Imagen" accept="image/jpeg, image/png , image/webp">
        <?php if ($proveedor->Imagen) : ?>
            <img src="/imagenes/<?php echo $proveedor->Imagen ?>" alt="Imagen" class="imagen-small">
        <?php endif; ?>
    </div>
    <div>
        <label for="Nombre">Contacto Persona</label>
        <input type="text" placeholder="Nombre Completo" id="Nombre" name="Nombre" value="<?php echo $proveedor->Nombre?>">

        <label for="Telefono">Telefono</label>
        <input type="number" placeholder="+51 999 999 999" id="Telefono" name="Telefono" value="<?php echo $proveedor->Telefono?>">

        <label for="DNI">DNI</label>
        <input type="number" placeholder="99999" name="DNI" id="DNI" value="<?php echo $proveedor->DNI?>">
    </div>
</fieldset>