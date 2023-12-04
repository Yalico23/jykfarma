<table class="elementos">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Fecha Ingreso</th>
            <th>Telefono</th>
            <th>Cargo</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php

        use Model\Empleado;

        foreach ($empleados as $empleado) : ?>
            <tr>
                <td> <?php echo $empleado->Id; ?> </td> <!--Se cambio para iterar para objetos-->
                <td> <?php echo $empleado->Nombre; ?> </td>
                <td> <?php echo $empleado->Apellido; ?> </td>
                <td> <?php echo $empleado->CorreoFarma; ?> </td>
                <td> <?php echo $empleado->FechaIngreso; ?> </td>
                <td> <?php echo $empleado->Telefono; ?> </td>
                <td> <?php echo  $resultado = Empleado::getCargo($empleado->IdCargo) ?> </td>
                <td><img src="/imagenes/<?php echo $empleado->Imagen ?>" class="imagen-tabla" alt="imagen"></td>
                <td>
                    <form method="POST" class="w-100" action="/empleado/eliminar">
                        <input type="hidden" name="Id" value="<?php echo $empleado->Id; ?>">
                        <input type="hidden" name="tipo" value="empleado">
                        <input type="submit" class="boton-rojo boton" value="Eliminar">
                    </form>
                    <a href="/empleado/actualizar?id=<?php echo $empleado->Id ?>&Tipo=<?php echo $tipoEmpleado ?>" class="boton-amarillo 
                    boton">Actualizar</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>