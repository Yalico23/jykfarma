<fieldset>
            <div>
                <label for="Nombre">Nombre</label>
                <input type="text" placeholder="name..." name="Nombre" value="<?php echo $cliente->Nombre ?>">
                
                <label for="Apellido">Apellido</label>
                <input type="text" placeholder="name..." name="Apellido" value="<?php echo $cliente->Apellido ?>">

                <label for="Correo">Correo</label>
                <input type="email" placeholder="correo@correo.com" name="Correo" value="<?php echo $cliente->Correo ?>">
            </div>
            <div>
                <label for="Direccion">Direccion</label>
                <input type="text" placeholder="SJL ..." name="Direccion" value="<?php echo $cliente->Direccion ?>">

                <label for="Telefono">Telefono</label>
                <input type="number" placeholder="+51 999 999 999" name="Telefono" value="<?php echo $cliente->Telefono ?>">
            </div>
        </fieldset>