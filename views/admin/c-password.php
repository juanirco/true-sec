<?php include_once __DIR__ . '/header_panel.php'?>
<a href="/perfil" class="linkP">Volver a Perfil</a>
<form class="form" method="POST" novalidate>
    <div class="field">
        <label for="password">Password Actual:</label>
        <input type="password" name="actual_password" id="actual_password" placeholder="Tu password actual">
    </div>
    <div class="field">
        <label for="password2">Nuevo Password:</label>
        <input type="password" name="new_password" id="new_password" placeholder="Tu nuevo password">
    </div>

        <input type="submit" class="button" value="Guardar Cambios">
    </form>
<?php include_once __DIR__ . '/footer_panel.php'?>