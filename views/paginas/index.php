    <main>
        <div class="contenedor">
            <div class="imagen-principal">
                <div class="imagen-principal-hijo">
                    <h1>J & K Farma</h1>
                    <p>F & K Farma: Su mejor opción en salud y bienestar. Calidad farmacéutica, atención personalizada y confiabilidad en cada visita. Cuidando de usted, siempre.</p><!--Agregar algo mas-->
                </div>
                <div class="imagen-principal-hijo-img">
                    <picture>
                        <source srcset="/build/img/salud.avif" type="image/avif">
                        <source srcset="/build/img/salud.webp" type="image/webp">
                        <img src="/build/img/salud.png" alt="salud">
                    </picture>
                </div>
            </div>
            <div class="imagen-secundaria">
                <div class="imagen-secundaria-hijo">
                    <h3>Cuidado Personal</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="100" height="100" viewBox="0 0 24 24" stroke-width="1" stroke="#009BF9" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4" />
                        <path d="M15 19l2 2l4 -4" />
                    </svg>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi nesciunt.</p>
                </div>
                <div class="imagen-secundaria-hijo">
                    <h3>Medicina y Salud</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-vaccine-bottle" width="100" height="100" viewBox="0 0 24 24" stroke-width="1" stroke="#009BF9" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 3m0 1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 -1 1h-4a1 1 0 0 1 -1 -1z" />
                        <path d="M10 6v.98c0 .877 -.634 1.626 -1.5 1.77c-.866 .144 -1.5 .893 -1.5 1.77v8.48a2 2 0 0 0 2 2h6a2 2 0 0 0 2 -2v-8.48c0 -.877 -.634 -1.626 -1.5 -1.77a1.795 1.795 0 0 1 -1.5 -1.77v-.98" />
                        <path d="M7 12h10" />
                        <path d="M7 18h10" />
                        <path d="M11 15h2" />
                    </svg>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi nesciunt.</p>
                </div>
                <div class="imagen-secundaria-hijo">
                    <h3>Dieta y Fitness</h3>
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-apple" width="100" height="100" viewBox="0 0 24 24" stroke-width="1" stroke="#009BF9" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 14m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M12 11v-6a2 2 0 0 1 2 -2h2v1a2 2 0 0 1 -2 2h-2" />
                        <path d="M10 10.5c1.333 .667 2.667 .667 4 0" />
                    </svg>
                    <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quasi nesciunt.</p>
                </div>
            </div>
        </div>
    </main>
    <section class="contenedor-productos contenedor" id="productos">
        <div class="productos">
            <?php include 'productos.php' ?>
        </div>
    </section>

    <section class="contenedor-nosotros contenedor" id="nosotros">
        <div class="nosotros">
            <div class="nosotros-info">
                <h2>Sobre Nosotros</h2>
                <p>En F & K Farma, nuestra dedicación a la salud y el bienestar de nuestros clientes es insuperable. Con años de experiencia en el cuidado farmacéutico, nos enorgullece ser su aliado confiable para todas sus necesidades de salud. Nuestra misión es brindar servicios farmacéuticos de alta calidad, asesoramiento experto y un ambiente acogedor donde su salud siempre es nuestra prioridad. Confíe en nosotros para cuidar de usted y su familia con el compromiso y la excelencia que nos caracterizan en F & K Farma.</p>
            </div>
            <div class="nosotros-img">
                <picture>
                    <source srcset="/build/img/nosotros.avif" type="image/avif">
                    <source srcset="/build/img/nosotros.webp" type="image/webp">
                    <img src="/build/img/nosotros.png" alt="nosotros">
                </picture>
            </div>
        </div>
    </section>

    <section class="contenedor-contactanos contenedor" id="contacto">
        <h1>CONTACTANOS</h1>
        <div class="img-contenedor">
            <picture>
                <source srcset="/build/img/contactanos.avif" type="image/avif">
                <source srcset="/build/img/contactanos.webp" type="image/webp">
                <img src="/build/img/contactanos.jpg" alt="">
            </picture>
        </div>
        <h2>Llene el formulario de contacto</h2>
        
        <?php if ($mensaje) : ?>
            <p class="alerta exito"><?php echo $mensaje ?></p>
        <?php endif; ?>

        <form class="formulario" action="" method="post">
            <fieldset>
                <legend>Informacion personal</legend>

                <label for="nombre">Nombre</label>
                <input type="text" placeholder="Tu nombre" id="nombre" name="nombre" required>

                <label for="email">E-mail</label><!--Cuando des al nombre puedas escribir por el for del label y el id del input-->
                <input type="email" placeholder="Tu E-mail" id="email" name="email" required>

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="Tu telefono" id="telefono" name="telefono">

                <label for="mensaje">Mensaje: </label>
                <textarea id="mensaje" name="mensaje" required></textarea>
            </fieldset>

            <fieldset>

                <legend>Información sobre la propiedad</legend>

                <p>Como desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Teléfono</label>
                    <input name="contacto" type="radio" value="telefono" id="contactar-telefono" required>

                    <label for="contactar-email">E-mail</label>
                    <input name="contacto" type="radio" value="email" id="contactar-email" required><!--el name me sirve para leerlo en php y solo uno pueda ser escogido-->
                </div>

                <div id="contacto">

                </div>
                <p>Si Eligio telefono, elija la fecha y la hora </p>

                <label for="fecha">Fecha</label>
                <input type="date" id="fecha" name="fecha">

                <label for="hora">Hora</label>
                <input type="time" id="hora" min="07:00" max="22:00" name="hora">

            </fieldset>
            <input type="submit" value="Enviar" class="boton-verde">
        </form>
    </section>