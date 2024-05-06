<?php include_once __DIR__ . '/header.php'?>
<div class="project">
    <h1><?php echo $title?></h1>
    <a href="/proyectos" class="back_button">&lt; Proyectos</a>
    <h4>Información sobre el proyecto:</h4>
    <div class="project_info">
        <div class="projectP">
            <p class="projectP_label">Nombre:</p><p class="projectP_info"><?php echo $project->name;?></p>
        </div>
        <div class="projectP">
            <p class="projectP_label">Tipo:</p><p class="projectP_info"><?php echo $project->type;?></p>
        </div>
        <?php if(!empty($project->client)){ ?>
            <div class="projectP">
                <p class="projectP_label">Cliente:</p><p class="projectP_info"><?php echo $project->client;?></p>
            </div>
        <?php } ?>
        <?php if(!empty($project->budget)){ ?>
            <div class="projectP">
                <p class="projectP_label">Presupuesto:</p><p class="projectP_info"><?php echo $project->budget;?></p>
            </div>
        <?php } ?>
        <?php if(!empty($project->location)){ ?>
            <div class="projectP">
                <p class="projectP_label">Zona:</p><p class="projectP_info"><?php echo $project->location;?></p>
            </div>
        <?php } ?>
        <?php if(!empty($project->duration)){ ?>
            <div class="projectP">
                <p class="projectP_label">Duración:</p><p class="projectP_info"><?php echo $project->duration;?></p>
            </div>
        <?php } ?>
        <?php if(!empty($project->endDate)){ ?>
            <div class="projectP">
                <p class="projectP_label">Culminación:</p><p class="projectP_info"><?php echo $project->endDate;?></p>
            </div>
        <?php } ?>
        <?php if(!empty($project->details)){ ?>
            <div class="projectP">
                <p class="projectP_label">Resumen:</p><p class="projectP_info"><?php echo $project->details;?></p>
            </div>
        <?php } ?>
    </div>

    <hr>

    <div class="project_photos">
        <?php foreach ($projectPhotos as $photo): ?>
            <div class="photos">
                <img src="<?php echo $photo->route; ?>" alt="Foto del proyecto" data-id="<?php echo $photo->id;?>">
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include_once __DIR__ . '/cta.php'?>
<?php include_once __DIR__ . '/footer.php'?>