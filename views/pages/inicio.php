<?php include_once __DIR__ . '/header.php'?>

<section class="section-projects" id="proyectos">
    <div class="div-container container noLR_padding">
        <h3 class="section-title white">Proyectos</h3>
        <?php 
        include_once __DIR__ . '/proyectos_section.php';
        $projects = 6;
        
        ?>
        <div class="button-div">
            <a href="/proyectos" class="button">Más Proyectos</a>
        </div>
    </div>
</section>
<section class="section-us" id="nosotros">
    <div class="div-container container">
    <h3 class="section-title">Nosotros</h3>
        <?php include_once __DIR__ . '/nosotros_section.php'?>
        <div class="button-div">
            <a href="/nosotros" class="button">Más Sobre Nosotros</a>
        </div>
    </div>
</section>
<section class="section-servicios" id="servicios">
    <div class="div-container container">
        <h3 class="section-title white">Servicios</h3>
        <ul class="services_ul">

                <li>Construcción electromecánica de residencias</li>
                <li>Construcción electromecánica de locales comerciales</li>
                <li>Construcción electromecánica de edificios</li>
                <li>Redes eléctricas en baja tensión</li>
                <li>Redes eléctricas en media tensión</li>
                <li>Redes de telecomunicaciones en cobre</li>
                <li>Redes de telecomunicaciones en Fibra Óptica.</li>
                <li>Sistemas de fontanería y redes mecánicas.</li>
                <li>Sistemas de supresión de incendios</li>
                <li>Sistemas de alarmas contra incendios</li>
                <li>Sistemas de aire comprimido.</li>
                <li>Sistemas de redes de gas</li>
                <li>Servicio de mantenimiento a las obras</li>
        </ul>
        <div class="button-div">
            <a href="/servicios" class="button">Más Información</a>
        </div>
   </div>
</section>

<section class="section-clients" id="clientes">
    <div class="div-container container">
        <h3 class="section-title">Clientes</h3>
        <div class="clients">
        <img src="/../../build/img/logo-es.png" alt="logo cliente 1">
        <img src="/../../build/img/prodesco-logo.png" alt="logo cliente 2">
            <p>Constructora <br>HG Dos</p>
            <p>Buena suerte <br>Catorce</p>
            <p>Flawless <br>View</p>
        </div>
    </div>
</section>

<section class="section-certifications" id="certificaciones">
<?php include_once __DIR__ . '/certificaciones_section.php'?>
</section>
<?php include_once __DIR__ . '/cta.php'?>
<?php 
    include_once __DIR__ . '/footer.php';
?>