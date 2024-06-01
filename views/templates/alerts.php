<?php foreach($alerts as $type => $messages){ 
    foreach($messages as $message) {?>
        <div class="alert <?php echo $type?>">
            <?php echo $message?>
        </div>
<?php }} ?>