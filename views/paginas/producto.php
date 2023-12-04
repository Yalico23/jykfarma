<main class="contenedor contenido-centrado producto-chico">
    <a href="/" class="boton-amarillo">Regresar</a>
    <h2><?php echo $producto->Nombre ?></h2>

    <img loading="lazy" class="imagen-chica" src="imagenes/<?php echo $producto->Imagen ?>" alt="anuncio">
    <div class="resumen-propiedad">
        <p class="precio">$ <?php echo $producto->Precio ?></p>
        <ul>
            <li>
                <picture>
                    <source srcset="build/img/stock.avif" type="image/avif">
                    <source srcset="build/img/stock.webp" type="image/webp">
                    <img src="build/img/stock.png" alt="stock">
                </picture>
                <p><?php echo $producto->Stock ?></p>
            </li>
            <li>
                <picture>
                    <source srcset="/build/img/delivery.avif" type="image/avif">
                    <source srcset="/build/img/delivery.webp" type="image/webp">
                    <img src="/build/img/delivery.png" alt="Delivey">
                </picture>
            </li>
        </ul>
        <p><?php echo $producto->Descripcion ?></p>
    </div>
</main>