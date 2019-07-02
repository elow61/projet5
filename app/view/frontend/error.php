<?php 
$title = 'Erreur | Success Mission';
ob_start();
?>

    <div class="content-error">
        <div class="textError">
            <?= $errorMessage ?>
        </div>
    </div>
    <div class="bubble_blue">
        <img src="<?= IMAGES_BUBBLE ?>bubble_blue.svg" alt="">
    </div>  
</header>


<?php 
$content = ob_get_clean();
require 'template.php';
?>