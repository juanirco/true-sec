<!-- p stands for private -->
<div class="access">
    <div class="container login">
        <?php include_once __DIR__ . '../../templates/alerts.php'?>
        <div class="container-sm">
            <h4>Iniciar Sesión</h4>
            <form action="/p-login" class="form" method="POST" novalidate>
                <div class="field">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Tu email">
                </div>
        
                <div class="field">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Tu password">
                </div>

                <input type="submit" class="login-btn" value="Iniciar Sesión">
            </form>

            <a href="o-password" class="enlace-login">¿Olvidaste tu password?</a>
        </div>

    </div>
</div>