<?php include_once __DIR__ . '/header_panel.php'?>
    <form action="/crear_proyecto" method="POST" class="form" enctype="multipart/form-data" novalidate>
        <?php include_once __DIR__ . '/form_project.php'?>

        <input type="submit" class="button" value="Crear">
    </form>
<?php include_once __DIR__ . '/footer_panel.php'?>
