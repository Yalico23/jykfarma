<main class="contenedor seccion">
    <h1>Panel administrativo</h1>

    <?php $mensaje = mostrarNotificacion(intval($resultado));
    if ($mensaje) { ?>
        <p class="alerta exito"><?php echo $mensaje ?></p>
    <?php } ?>

    <?php
    if ($tipoEmpleado == 1) {
        echo '<a href="/cliente/crear?Tipo=' . $tipoEmpleado . '" class="boton-verde">Crear Cliente</a>';
        echo '<a href="/producto/crear?Tipo=' . $tipoEmpleado . '" class="boton-verde">Crear Producto</a>';
        echo '<a href="/proveedor/crear?Tipo=' . $tipoEmpleado . '" class="boton-verde">Crear Proveedores</a>';
        echo '<a href="/empleado/crear?Tipo=' . $tipoEmpleado . '" class="boton-verde">Crear personal</a>';

        echo "<h2>Empleados</h2>";
        include __DIR__ . '/table_empleados.php';
        echo "<h2>Clientes</h2>";
        include __DIR__ . '/table_cliente.php';
        echo "<h2>Productos</h2>";
        include __DIR__ . '/table_producto.php';
        echo "<h2>Proveedores</h2>";
        include __DIR__ . '/table_proveedor.php';
    } elseif ($tipoEmpleado == 2) {
        echo '<a href="/cliente/crear?Tipo=' . $tipoEmpleado . '" class="boton-verde">Crear Cliente</a>';
        echo '<a href="/producto/crear?Tipo=' . $tipoEmpleado . '" class="boton-verde">Crear Producto</a>';
        echo '<a href="/proveedor/crear?Tipo=' . $tipoEmpleado . '" class="boton-verde">Crear Proveedores</a>';

        echo "<h2>Clientes</h2>";
        include __DIR__ . '/table_cliente.php';
        echo "<h2>Productos</h2>";
        include __DIR__ . '/table_producto.php';
        echo "<h2>Proveedores</h2>";
        include __DIR__ . '/table_proveedor.php';
    } elseif ($tipoEmpleado == 3) {
        echo '<a href="/cliente/crear?Tipo=' . $tipoEmpleado . '" class="boton-verde">Crear Cliente</a>';
        echo "<h2>Clientes</h2>";
        include __DIR__ . '/table_cliente.php';
    }
    ?>
</main>