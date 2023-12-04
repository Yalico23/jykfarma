<h1>Registrar Cliente</h1>

<div class="contenedor">
<a href="/admin?Tipo=<?php echo $tipoEmpleado ?>" class="boton-amarillo">Regresar</a>
    <?php foreach ($errores as $error) : ?> <!-- Por cada arreglo que tenga funcionara -->
        <div class="alerta error"> <!--Creamos hoja de estilo para las alertas de error-->
            <?php echo $error ?>
        </div>
    <?php endforeach ?> <!--Gustos personales pero funciona-->
    <form action="" class="f-formulario" method="post">
        <?php include __DIR__.'/form_clientes.php'; ?>
        <input type="submit" value="Actualizar" class="boton-amarillo boton">
    </form>
</div>