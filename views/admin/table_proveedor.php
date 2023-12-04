<table class="elementos">
    <thead>
        <tr>
            <th>ID</th>
            <th>Empresa</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>DNI</th>
            <th>Telefono</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($proveedores as $proveedor) : ?>
            <tr>
                <td> <?php echo $proveedor->Id; ?> </td> <!--Se cambio para iterar para objetos-->
                <td> <?php echo $proveedor->Empresa; ?> </td>
                <td> <?php echo $proveedor->Nombre; ?> </td>
                <td> <?php echo $proveedor->Direccion; ?> </td>
                <td> <?php echo $proveedor->DNI; ?> </td>
                <td> <?php echo $proveedor->Telefono; ?> </td>
                <td><img src="/imagenes/<?php echo $proveedor->Imagen ?>" class="imagen-tabla" alt="imagen"></td>
                <td>
                    <form method="POST" class="w-100" action="/proveedor/eliminar">

                        <input type="hidden" name="Id" value="<?php echo $proveedor->Id; ?>">
                        <input type="hidden" name="tipo" value="proveedor">
                        <input type="submit" class="boton-rojo boton" value="Eliminar">
                    </form>
                    <a href="/proveedor/actualizar?id=<?php echo $proveedor->Id ?>&Tipo=<?php echo $tipoEmpleado ?>" class="boton-amarillo 
                    boton">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>