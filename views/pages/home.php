<?php include_once __DIR__ . '/header_en.php'?>

<section class="section-projects" id="proyectos">
    <div class="div-container container noLR_padding">
        <h3 class="section-title white">Projects</h3>
        <?php 
        include_once __DIR__ . '/projects_section.php';
        $projects = 6;
        
        ?>
        <div class="button-div">
            <a href="/proyectos" class="button">More Projects</a>
        </div>
    </div>
</section>
<section class="section-us" id="nosotros">
    <div class="div-container container">
    <h3 class="section-title">About Us</h3>
        <?php include_once __DIR__ . '/us_section.php'?>
        <div class="button-div">
            <a href="/nosotros" class="button">More About Us</a>
        </div>
    </div>
</section>
<section class="section-servicios" id="servicios">
    <div class="div-container container">
        <h3 class="section-title white">Services</h3>
        <ul class="services_ul orangeBS">

                <li>Residential electromechanical construction</li>
                <li>Commercial electromechanical construction</li>
                <li>Building electromechanical construction</li>
                <li>Low-voltage electrical networks</li>
                <li>Medium-voltage electrical networks</li>
                <li>Copper telecommunications networks</li>
                <li>Fiber Optic Telecommunications Networks</li>
                <li>Plumbing systems and mechanical networks</li>
                <li>Fire suppression systems</li>
                <li>Fire alarm systems</li>
                <li>Compressed air systems</li>
                <li>Gas network systems</li>
                <li>Maintenance service for works</li>
        </ul>
        <div class="button-div">
            <a href="/servicios" class="button">More Information</a>
        </div>
   </div>
</section>

<section class="section-clients" id="clientes">
    <div class="div-container container">
        <h3 class="section-title">Clients</h3>
        <div class="clients">
        <img src="/../../build/img/logo-es.png" alt="client logo 1">
        <img src="/../../build/img/prodesco-logo.png" alt="client logo 2">
            <p>Constructora <br>HG Dos</p>
            <p>Buena suerte <br>Catorce</p>
            <p>Flawless <br>View</p>
        </div>
    </div>
</section>

<section class="section-certifications" id="certificaciones">
<?php include_once __DIR__ . '/certifications_section.php'?>
</section>
<?php include_once __DIR__ . '/cta_en.php'?>
<?php 
    include_once __DIR__ . '/footer_en.php';
?>
