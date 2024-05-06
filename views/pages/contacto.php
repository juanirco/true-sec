<?php include_once __DIR__ . '/header.php'?>
<div class="contact">
    <h1><?php echo $title?></h1>

    <?php include_once __DIR__ . '/../templates/alerts.php';?>
    <p>Eres de Costa Rica o vives en Costa Rica y andas buscando cotizaciones sobre servicios de electromecánica, servicios de redes electricas, redes de telecomunicaciones, sistemas de fontanería, sistemas de supresión de incendios o de sistemas de redes de gas, acá en RSL Electromicánica te ayudamos.</p>
    <p>Este es el sitio donde te respondemos cualquier duda o consulta, solo dejanos tus datos y la consulta y muy pronto tendrás una respuesta.</p>
    <form action="/contacto" class="form" method="POST">
            <div class="field">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" placeholder="Tu nombre" required>
            </div>
    
            <div class="field">
                <label for="lastname">Apellido:</label>
                <input type="text" name="lastname" id="lastname" placeholder="Tu apellido">
            </div>
            <div class="field">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Tu email" required>
            </div>

            <div class="field">
            <label for="message">Mensaje:</label>
                <textarea name="message" id="" cols="30" rows="10" placeholder="Tu Mensaje" required></textarea>
            </div>

            <input type="submit" class="button" value="Enviar Mensaje">
        </form>
</div>
<?php include_once __DIR__ . '/footer.php'?>