<h1>Registrar Proveedor</h1>

<div class="contenedor">
<a href="/admin?Tipo=<?php echo $tipoEmpleado ?>" class="boton-amarillo">Regresar</a>
    <?php foreach ($errores as $error) : ?> <!-- Por cada arreglo que tenga funcionara -->
        <div class="alerta error"> <!--Creamos hoja de estilo para las alertas de error-->
            <?php echo $error ?>
        </div>
    <?php endforeach ?> <!--Gustos personales pero funciona-->
    <form action="" class="f-formulario" method="post" enctype="multipart/form-data">

        <?php include __DIR__ . '/form_proveedores.php' ?>
        
        <input type="submit" value="Registrar" class="boton-amarillo boton">
    </form>
</div>