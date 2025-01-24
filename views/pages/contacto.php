<?php include_once __DIR__ . '/header.php'?>
<div class="contact">
    <main class="hero">
        <div class="hero_content">
            <img loading="lazy" src="../build/img/isotipo.svg" alt="Isotipo de True Sec">
            <h1>Contacto</h1>
        </div>
    </main>

    <section class="contact_section">
        <?php include_once __DIR__ . '/../templates/alerts.php';?>
        <h2 class="contact_title">¡Contáctanos!</h2>
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
            <!-- reCAPTCHA Widget -->
                <!-- <div class="g-recaptcha" data-sitekey="6Lebs_ApAAAAAFbEPbCg6gLia_r1TycAPhgSOqyb"></div> -->
                <!-- <input type="submit" class="button_trnsp" value="Enviar Mensaje"> -->
            </form>
    </section>
</div>
<?php include_once __DIR__ . '/footer.php';?>