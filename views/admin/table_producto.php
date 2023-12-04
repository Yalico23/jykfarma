<table class="elementos">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto) : ?>
            <tr>
                <td> <?php echo $producto->Id; ?> </td> <!--Se cambio para iterar para objetos-->
                <td> <?php echo $producto->Nombre; ?> </td>
                <td> <?php echo $producto->Precio; ?> </td>
                <td> <?php echo $producto->Stock; ?> </td>
                <td><img src="/imagenes/<?php echo $producto->Imagen ?>" class="imagen-tabla" alt="imagen"></td>
                <td>
                    <form method="POST" class="w-100" action="/producto/eliminar">
                        <input type="hidden" name="Id" value="<?php echo $producto->Id; ?>">
                        <input type="hidden" name="tipo" value="producto">
                        <input type="submit" class="boton-rojo boton" value="Eliminar">
                    </form>
                    <a href="/producto/actualizar?id=<?php echo $producto->Id ?>&Tipo=<?php echo $tipoEmpleado ?>" class="boton-amarillo 
                    boton">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>