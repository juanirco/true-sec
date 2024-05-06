<aside class="sidebar_background">
    <div class="sidebar">
        <div class="upper_div">
            <div class="up_bar">
                <a href="/panel" class="logo">
                    <h1>RSL</h1>
                </a>
                <img src="../build/img/expand.svg" alt="expand icon" class="bar_action_icon expand_icon">
                <img src="../build/img/collapse.svg" alt="collapse icon" class="bar_action_icon collapse_icon">
            </div>
            <nav class="nav_bar">
                <a href="/panel" class="bar_link"><img src="../build/img/panel.svg" alt="link icono" class="link_icon"><p class="link_text">Proyectos</p></a>
                <a href="/crear_proyecto" class="bar_link"><img src="../build/img/add.svg" alt="link icono" class="link_icon"><p class="link_text">Crear Proyecto</p></a>
                <a href="/equipo" class="bar_link"><img src="../build/img/team.svg" alt="link icono" class="link_icon"><p class="link_text">Miembros del Equipo</p></a>
                <a href="/perfil" class="bar_link"><img src="../build/img/profile.svg" alt="link icono" class="link_icon"><p class="link_text">Perfil</p></a>
            </nav>
        </div>
        <div class="under_div">
            <p>Hola: <span><?php echo $_SESSION['name'];?></span></p>
            <a href="/logout" class="button">Cerrar Sesión</a>
            <a href="/logout"><img src="../build/img/logout.svg" alt="link icono" class="logout_icon"></a>
        </div>
    </div>

</aside>

<?php 
    $script = '<script src="build/js/sidebar.js"></script>';
?>