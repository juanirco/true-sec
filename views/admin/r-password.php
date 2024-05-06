<!-- r stands for reset -->
<div class="access">
    <div class="container login">
        <?php include_once __DIR__ . '../../templates/alerts.php'?>
        <div class="container-sm">
            <h4>Restablecer Password</h4>
            <form class="form" method="POST" novalidate>
            <div class="field">
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Tu password">
            </div>
            <div class="field">
                <label for="password2">Repetir Password:</label>
                <input type="password" name="password2" id="password2" placeholder="Repite tu password">
            </div>

                <input type="submit" class="login-btn" value="Nuevo Password">
            </form>

        </div>

    </div>
</div>