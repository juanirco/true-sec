<?php include_once __DIR__ . '/header_en.php'?>
<div class="contact">
    <main class="hero">
        <div class="hero_content">
            <img loading="lazy" src="../build/img/isotipo.svg" alt="True Sec Isotype">
            <h1>Contact</h1>
        </div>
    </main>

    <section class="contact_section">
        <?php include_once __DIR__ . '/../templates/alerts.php';?>
        <h2 class="contact_title">Contact Us!</h2>
        <p>This is the place where we answer any questions or inquiries you may have. Just leave us your details and inquiry, and you will have a response soon.</p>
            <form action="/contacto" class="form" method="POST">
                <div class="field">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Your name" required>
                </div>
        
                <div class="field">
                    <label for="lastname">Last Name:</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Your last name">
                </div>
                <div class="field">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Your email" required>
                </div>

                <div class="field">
                <label for="message">Message:</label>
                    <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>
                </div>
            <!-- reCAPTCHA Widget -->
                <div class="g-recaptcha" data-sitekey="6Lebs_ApAAAAAM_Rpvztc9j8Vvd0XRy8eZNmv7Kp"></div>
                <input type="submit" class="button_trnsp" value="Send Message">
            </form>
    </section>
</div>
<?php include_once __DIR__ . '/footer_en.php';?>
