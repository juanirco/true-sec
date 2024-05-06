<?php include_once __DIR__ . '/header_panel.php'?>
<form class="form" method="POST" novalidate>
    <div class="field">
        <label for="name" class="wider">Nombre:</label>
        <input type="text" name="name" id="name" placeholder="Tu nombre" value="<?php echo $user->name?>">
    </div>

    <div class="field">
        <label for="lastname" class="wider">Apellido:</label>
        <input type="text" name="lastname" id="lastname" placeholder="Tu apellido" value="<?php echo $user->lastname?>">
    </div>
    <div class="field">
        <label for="email" class="wider">Email:</label>
        <input type="email" name="email" id="email" placeholder="Tu email" value="<?php echo $user->email?>">
    </div>

    <a href="/cambiar_password" class="linkP right">>> Cambiar Password <<</a>

    <input type="submit" class="button" value="Guardar Cambios">
</form>
<?php include_once __DIR__ . '/footer_panel.php'?>