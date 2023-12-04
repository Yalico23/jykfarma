<main>
    <h1>Actualizar Producto</h1>

    <div class="contenedor">
    <a href="/admin?Tipo=<?php echo $tipoEmpleado ?>" class="boton-amarillo">Regresar</a>
        <?php foreach ($errores as $error) : ?> <!-- Por cada arreglo que tenga funcionara -->
            <div class="alerta error"> <!--Creamos hoja de estilo para las alertas de error-->
                <?php echo $error ?>
            </div>
        <?php endforeach ?> <!--Gustos personales pero funciona-->
        <form action="" class="f-formulario" enctype="multipart/form-data" method="post">
            <?php include __DIR__ . '/form_productos.php'; ?>
            <input type="submit" value="Actualziar" class="boton-amarillo boton">
        </form>
    </div>
</main>