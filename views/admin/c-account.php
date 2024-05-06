<div class="access">
    <div class="container-sm">
        <h4>Crear cuenta</h4>
        <?php include_once __DIR__ . '../../templates/alerts.php'; ?>
        <form action="/c-cuenta" class="form" method="POST" novalidate>
            <div class="field">
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" placeholder="Tu nombre" value="<?php echo $user->name?>">
            </div>
    
            <div class="field">
                <label for="lastname">Apellido:</label>
                <input type="text" name="lastname" id="lastname" placeholder="Tu apellido" value="<?php echo $user->lastname?>">
            </div>
            <div class="field">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" placeholder="Tu email" value="<?php echo $user->email?>">
            </div>
    
            <div class="field">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Tu password">
            </div>
            <div class="field">
                <label for="password2">Repetir Password:</label>
                <input type="password" name="password2" id="password2" placeholder="Repite tu password">
            </div>

            <input type="submit" class="login-btn" value="Crear Cuenta">
        </form>
    </div>
</div>