<?php include_once __DIR__ . '/header_en.php'?>
<div class="project">
    <h1><?php echo $title?></h1>
    <a href="/projects" class="back_button">&lt; Projects</a>
    <p>Information about the project:</p>
    <div class="project_info">
        <div class="projectP">
            <p class="projectP_label">Name:</p><p class="projectP_info"><?php echo $project->name;?></p>
        </div>
        <div class="projectP">
            <p class="projectP_label">Type:</p><p class="projectP_info"><?php echo $project->type;?></p>
        </div>
        <?php if(!empty($project->client)){ ?>
            <div class="projectP">
                <p class="projectP_label">Client:</p><p class="projectP_info"><?php echo $project->client;?></p>
            </div>
        <?php } ?>
        <?php if(!empty($project->budget)){ ?>
            <div class="projectP">
                <p class="projectP_label">Budget:</p><p class="projectP_info"><?php echo $project->budget;?></p>
            </div>
        <?php } ?>
        <?php if(!empty($project->location)){ ?>
            <div class="projectP">
                <p class="projectP_label">Location:</p><p class="projectP_info"><?php echo $project->location;?></p>
            </div>
        <?php } ?>
        <?php if(!empty($project->durationEng)){ ?>
            <div class="projectP">
                <p class="projectP_label">Duration:</p><p class="projectP_info"><?php echo $project->durationEng;?></p>
            </div>
        <?php } ?>
        <?php if(!empty($project->endDate)){ ?>
            <div class="projectP">
                <p class="projectP_label">Completion:</p><p class="projectP_info"><?php echo $project->endDate;?></p>
            </div>
        <?php } ?>
        <?php if(!empty($project->detailsEng)){ ?>
            <div class="projectP">
                <p class="projectP_label">Summary:</p><p class="projectP_info"><?php echo $project->detailsEng;?></p>
            </div>
        <?php } ?>
    </div>

    <hr>

    <div class="project_photos">
        <?php foreach ($projectPhotos as $photo): ?>
            <div class="photos">
                <img src="<?php echo $photo->route; ?>" alt="Project photo" data-id="<?php echo $photo->id;?>">
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include_once __DIR__ . '/cta_en.php'?>
<?php include_once __DIR__ . '/footer_en.php'?>
