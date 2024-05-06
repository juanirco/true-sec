<?php include_once __DIR__ . '/header_panel.php'?>
    <form method="POST" class="form" enctype="multipart/form-data" novalidate>
        <?php include_once __DIR__ . '/form_project.php'?>

        <input type="submit" class="save_project" value="Guardar Cambios">
    </form>
    <div class="existing-photos">
    <?php foreach ($existingPhotos as $photo): ?>
        <div class="photos">
            <img src="<?php echo $photo->route; ?>" alt="Foto del proyecto">
            <form action="/eliminar_foto" method="POST" class="delete-photo-form">
                <input type="hidden" name="photo_delete" value="<?php echo $photo->id;?>">
                <button type="submit" class="photo_rmv_btn">X</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
<?php include_once __DIR__ . '/footer_panel.php'?>