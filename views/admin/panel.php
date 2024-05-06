<?php include_once __DIR__ . '/header_panel.php'?>
    <ul class="projects_list">
        <?php foreach($projects as $project) {?>
        <li class="project">
            <div class="project_div">
                <div class="headers_div">
                    <p>Nombre</p>
                </div>
                <div class="content_div">
                    <p><?php echo $project->name?></p>
                </div>
            </div>
            <div class="project_div">
                <div class="headers_div">
                    <p>Tipo</p>
                </div>
                <div class="content_div">
                    <p><?php echo $project->type?></p>
                </div>
            </div>
            <div class="project_div">
                <div class="headers_div">
                    <p>Cliente</p>
                </div>
                <div class="content_div">
                    <p><?php echo $project->client?></p>
                </div>
            </div>
            <div class="project_div">
                <div class="headers_div">
                    <p>Presupuesto</p>
                </div>
                <div class="content_div">
                    <p><?php echo $project->budget?></p>
                </div>
            </div>
            <div class="project_actions">
                <a href="/editar_proyecto?id=<?php echo $project->id?>" class="button">Editar Proyecto</a>
                <form action="eliminar_proyecto" method="POST">
                    <button type="button" class="delete" onclick="delete_confirmation(this)" data-project-id="<?php echo $project->id?>">Eliminar Proyecto</button>
                </form>
            </div>   
        </li>
        <?php } ?>
    </ul>
<?php include_once __DIR__ . '/footer_panel.php'?>
