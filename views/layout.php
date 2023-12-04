<?php if ($inicio) : ?>
    
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>J & K Farma</title>
        <link rel="stylesheet" href="build/css/app.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Raleway:ital,wght@1,300;1,500&family=Roboto&display=swap" rel="stylesheet">
        <link rel="icon" href="/build/img/icono.jpg">
    </head>

    <body>
        <header>
            <div class="encabezado contenedor fondo">
                <div>
                    <picture class="logo">
                        <source srcset="/build/img/logo.avif" type="image/avif">
                        <source srcset="/build/img/logo.webp" type="image/webp">
                        <img src="/build/img/logo.jpg" alt="logo">
                    </picture>

                </div>
                <div class="usuario">
                    <picture class="picture">
                        <source class="m-img" srcset="/build/img/avatar.avif" type="image/avif">
                        <source class="m-img" srcset="/build/img/avatar.webp" type="image/webp">
                        <img class="m-img" src="/build/img/avatar.png" alt="">
                    </picture>
                    <a href="login" class="ingresar">Ingresar</a>
                </div>
            </div>

        </header>

        <div class="mobile-menu">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-menu-2" width="52" height="52" viewBox="0 0 24 24" stroke-width="1.5" stroke="#009BF9" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 6l16 0" />
                <path d="M4 12l16 0" />
                <path d="M4 18l16 0" />
            </svg>
        </div>

        <div class="contenedor-nav">
            <nav class="contenedor nav">
                <a class="home" href="">Home</a>
                <a href="#productos">Nuestros Productos</a>
                <a href="#nosotros">Nosotros</a>
                <a href="#contacto">Contactanos</a>
            </nav>
        </div>
    <?php else : ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>J & K Farma</title>
            <link rel="stylesheet" href="../build/css/app.css">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Raleway:ital,wght@1,300;1,500&family=Roboto&display=swap" rel="stylesheet">
            <link rel="icon" href="../build/img/icono.jpg">
        </head>

        <body>
            <header>
                <div class="encabezado contenedor fondo">
                    <div>
                        <a href="/">
                            <picture class="logo">
                                <source srcset="/build/img/logo.avif" type="image/avif">
                                <source srcset="/build/img/logo.webp" type="image/webp">
                                <img src="/build/img/logo.jpg" alt="logo">
                            </picture>
                        </a>
                    </div>
                    <div>
                        <img src="/build/img/rule.jpg" alt="regla">
                    </div>
                </div>
            </header>
        <?php endif; ?>
        <?php echo  $contenidoInsideLayout ?>

        <footer class="footer">
            <?php
            date_default_timezone_set('America/Lima');
            ?>
            <p class="copyright">Todos los derechos Reservados <?php echo date('d-m-y') ?> &copy; - Grupo 6</p>
        </footer>
        <script src="../build/js/app.js"></script>
        </body>

        </html>