<div class="projects_div">
    <?php foreach($projects as $project) {?>
        <a href="/proyecto?id=<?php echo $project->id;?>" class="projects_links">
            <p><?php echo $project->name;?></p>
            <?php 
            // Busca la foto correspondiente al proyecto actual
            $photoToShow = null; // Inicializa la variable para la foto a mostrar
            foreach($photos as $photo) {
                if($photo->projectId === $project->id) {
                    $photoToShow = $photo;
                    break; // Una vez que encuentres la foto, sal del bucle
                }
            }
            // Ahora, si encontraste una foto para este proyecto, muéstrala
            if ($photoToShow) { ?>
                <img src="..<?php echo $photoToShow->route;?>" alt="foto de proyecto">
            <?php } ?>
        </a>
    <?php }?>
</div>