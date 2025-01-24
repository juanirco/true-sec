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

        <?php 
        // Variable to enable/disable the form
        $form_enabled = true; 

        if ($form_enabled): ?>
            <form action="/contact" class="form" method="POST">
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

                <!-- Honeypot field -->
                <div style="display: none;">
                    <label for="honeypot">Do not fill this field:</label>
                    <input type="text" name="honeypot" id="honeypot">
                </div>

                <!-- reCAPTCHA Widget -->
                <div class="g-recaptcha" data-sitekey="6Lebs_ApAAAAAFbEPbCg6gLia_r1TycAPhgSOqyb"></div>
                <input type="submit" class="button_trnsp" value="Send Message">
            </form>
        <?php else: ?>
            <p style="color: red; font-weight: bold;">
                Our contact form is temporarily disabled for maintenance. Please try again later.
            </p>
        <?php endif; ?>
    </section>
</div>
<?php include_once __DIR__ . '/footer_en.php';?>

<?php
// Server-side validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['honeypot'])) {
        die('Detected as spam.');
    }

    // Process the form as usual if the honeypot is empty
    // Your form processing logic goes here
}
?>
