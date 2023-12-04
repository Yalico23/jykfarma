<table class="elementos">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente) : ?>
            <tr>
                <td> <?php echo $cliente->Id; ?> </td> <!--Se cambio para iterar para objetos-->
                <td> <?php echo $cliente->Nombre; ?> </td>
                <td> <?php echo $cliente->Apellido; ?> </td>
                <td> <?php echo $cliente->Correo; ?> </td>
                <td> <?php echo $cliente->Direccion; ?> </td>
                <td> <?php echo $cliente->Telefono; ?> </td>
                <td>
                    <form method="POST" class="w-100" action="/cliente/eliminar">
                        <input type="hidden" name="Id" value="<?php echo $cliente->Id; ?>">
                        <input type="hidden" name="tipo" value="cliente">
                        <input type="submit" class="boton-rojo boton" value="Eliminar">
                    </form>
                    <a href="/cliente/actualizar?id=<?php echo $cliente->Id ?>&Tipo=<?php echo $tipoEmpleado ?>" class="boton-amarillo 
                    boton">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>