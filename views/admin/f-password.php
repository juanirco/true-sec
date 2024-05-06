<!-- f stands for forgot -->
<div class="access">
    <div class="container login">
        <?php include_once __DIR__ . '../../templates/alerts.php'?>
        <div class="container-sm">
            <h4>Recupera tu acceso</h4>
            <form action="/o-password" class="form" method="POST" novalidate>
                <div class="field">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Tu email">
                </div>

                <input type="submit" class="login-btn" value="Enviar Instrucciones">
            </form>

            <a href="p-login" class="enlace-login">¿Recordaste tu password? Ingresa acá</a>
        </div>

    </div>
</div>