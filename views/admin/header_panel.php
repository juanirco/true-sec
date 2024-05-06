<div class="panel">
    <?php 
        include_once __DIR__ . '/../templates/sidebar.php';
    ?>

    <div class="panel_dashboard container">
        <h2><?php echo $title?></h2>
        <hr>
    <?php 
        include_once __DIR__ . '/../templates/alerts.php';
    ?>