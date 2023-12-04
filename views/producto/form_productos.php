<fieldset>
    <div>
        <label for="Nombre">Nombre Producto</label>
        <input type="text" placeholder="name..." id="Nombre" name="Nombre" value="<?php echo $producto->Nombre ?>">

        <label for="Stock">Cantidad</label>
        <input type="number" placeholder="1 - 999" id="Stock" name="Stock" value="<?php echo $producto->Stock ?>">

        <label for="IdProveedor">Proveedor</label>
        <select name="IdProveedor" id="IdProveedor">
            <option value="" disabled selected>--Seleccionar--</option>
            <?php foreach ($proveedores as $proveedor) : ?>
                <option <?php echo $producto->IdProveedor === $proveedor->Id ? 'selected' : ''; ?> value="<?php echo $proveedor->Id ?>"><?php echo $proveedor->Empresa?></option>
            <?php endforeach; ?>

        </select>
    </div>
    <div>
        <label for="Precio">Precio</label>
        <input type="number" placeholder="S/. 9999" step="any" name="Precio" id="Precio" value="<?php echo $producto->Precio ?>">

        <label for="Descripcion">Descripcion</label>
        <textarea name="Descripcion" id="Descripcion" placeholder="Texto..."><?php echo $producto->Descripcion?></textarea>

        <label for="Imagen">Imagen</label>
        <input type="file" id="Imagen" name="Imagen" accept="image/jpeg, image/png , image/webp">
        <?php if ($producto->Imagen) : ?>
            <img src="/imagenes/<?php echo $producto->Imagen ?>" alt="Imagen" class="imagen-small">
        <?php endif; ?>
    </div>
</fieldset>