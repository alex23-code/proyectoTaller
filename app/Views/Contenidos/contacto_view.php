<body>
    
    

    

    <link rel="stylesheet" href="assets/css/estiloContacto.css">
    <header>
        <h1>Contactanos</h1>
    </header>

    <?php if (session('mensaje_consulta')){
              echo session('mensaje_consulta');
               } ?>
                
                


    <main>
        <section class="contenido">
            <section class="datos-contacto">
                <h4>Medios de contacto:</h4>
                <i class="fa-solid fa-phone"></i>
                <i class="subtitulo">Telefono de contacto: 3624546221</i><br>
                <i class="fa-brands fa-whatsapp"></i>
                <i class="subtitulo">Whatsapp: 3624772431</i><br>
                <i class="fa-solid fa-square-envelope"></i>
                <i class="subtitulo">Mail: </i>
                <i class="subtitulo">forsport@gmail.com</i><br><br>
                <h4>Estamos en:</h4>
                <i class="fa-solid fa-location-dot"></i>
                <i class="subtitulo">Güemes 434 - Corrientes - Corrientes</i> <br>
                <i class="fa-solid fa-location-dot"></i> 
                <i class="subtitulo">Av. Sarmiento 1342 - Resistencia - Chaco </i><br><br>
                <h4>Horario de Atención:</h4>
                    <p class="subtitulo">Lunes a Viernes: 8:00 a 20:00 hs 
                    <br>Sábados: 9:00 a 12:00 hs
                </p>
            </section>
           
            <section class="form-register">
                <?= validation_list_errors() ?>
                <?= form_open('contacto') ?>
                <h1 class="tituloFormulario">Formulario de Contacto Via E-Mail.</h1>
                <div class="mb3">
                <label for="nombre", class="form-label"> Nombre </label>
                <?php echo form_input(['name' => 'nombre', 'id' => 'nombre', 'type' => 'text', 'class' => 'controls form_texto_corto', 'placeholder' => 'Ingrese su nombre completo', 'value' => set_value('nombre')]); ?>
                </div>

                <div class="mb3">
                <label for="correo", class="form-label"> Correo </label>
                <?php echo form_input(['name' => 'correo', 'id' => 'correo', 'type' => 'text', 'class' => 'controls form_texto_corto', 'placeholder' => 'Ingrese su correo. Ej: nombre@gmail.com', 'value' => set_value('correo')]); ?>
                </div>
                
                <div class="mb3">
                <label for="telefono", class="form-label"> Telefono </label>
                <?php echo form_input(['name' => 'telefono', 'id' => 'telefono', 'type' => 'text', 'class' => 'controls form_texto_corto', 'placeholder' => 'Ingrese su número de telefono', 'value' => set_value('telefono')]); ?>
                </div>
            

                <div class="mb3">
                <label for="consulta", class="form-label"> Consulta </label>
                <?php echo form_input(['name' => 'consulta', 'id' => 'consulta', 'type' => 'text', 'class' => 'controls form_texto_corto', 'placeholder' => 'Describir su consulta', 'rows' => '3', 'value' => set_value('consulta')]); ?>
                </div>

                
                <?php echo form_submit('consultas', 'Enviar', "class='botons boton'"); ?>
                <?php echo form_close(); ?>

                

            </section>
        </section>
        <div> 
            <iframe style="width: 100%;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3540.922655359809!2d-58.97687372529404!3d-27.440521076336584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94450c56e6169f27%3A0x713a1c8f617d9048!2sAv.%20Sarmiento%201342%2C%20H3504AAI%20Resistencia%2C%20Chaco!5e0!3m2!1ses-419!2sar!4v1745759604882!5m2!1ses-419!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </main>
    
</body>