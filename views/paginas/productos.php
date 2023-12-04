<?php foreach ($productos as $producto) : ?>
    <div class="producto">
        <picture>
            <img loading="lazy" src="/imagenes/<?php echo $producto->Imagen ?>" alt="anuncio" class="img">
        </picture>
        <div class="contenido-producto">
            <h3><?php echo $producto->Nombre ?></h3>
            <p>S/. <?php echo $producto->Precio ?></p>
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
            <a class="boton-amarillo boton" href="/producto?Id=<?php echo $producto->Id ?>">Ver mas</a>
        </div>
    </div>
<?php endforeach; ?>