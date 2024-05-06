<?php include_once __DIR__ . '/header_en.php'?>
<div class="contact">
    <h1><?php echo $title?></h1>

    <?php include_once __DIR__ . '/../templates/alerts.php';?>

<p>If you're from Costa Rica or live in Costa Rica and are looking for quotes on electromechanical services, electrical network services, telecommunications networks, plumbing systems, fire suppression systems, or gas network systems, here at RSL Electromechanical, we can assist you.</p>
<p>This is the place where we answer any questions or inquiries you may have. Just leave us your details and your inquiry, and you'll soon receive a response.</p>
    <form action="/contact" class="form" method="POST">
            <div class="field">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" placeholder="Your name" required>
            </div>
    
            <div class="field">
                <label for="lastname">Lastname:</label>
                <input type="text" name="lastname" id="lastname" placeholder="Your lastname">
            </div>
            <div class="field">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Your email" required>
            </div>

            <div class="field">
            <label for="message">Message:</label>
                <textarea name="message" id="" cols="30" rows="10" placeholder="Your Message" required></textarea>
            </div>

            <input type="submit" class="button" value="Send Message">
        </form>
</div>
<?php include_once __DIR__ . '/footer_en.php'?>
