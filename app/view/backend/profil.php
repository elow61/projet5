<?php 
$title = 'Espace profil | ' . $_SESSION['first_name'];
ob_start();
?>
<div class="container-profil">
    <div class="headline">
        <h1><?= $_SESSION['first_name']. ' ' . $_SESSION['last_name']?></h1> 
    </div>
    <div class="container-info__profil">
        <p><?= $_SESSION['email']; ?></p>
        <br>
        <p> <span>Date d'ajout : </span><?= $profil['date_create'] ?></p>
    </div>
    <div class="card-project">
        <i class="fas fa-tasks"></i>
        <div class="nb-project">
            <span class="nb"><?= $nb_project['nb'] ?></span>
            <span>Projet<?php if ($nb_project['nb'] > 1):?>s<?php endif;?></span>
        </div>
    </div>
</div>
<div class="bubble-blue">
    <img src="<?= IMAGES_BUBBLE ?>bubble_blue.svg" alt="">
</div>
<?php 
$content = ob_get_clean();
require 'template.php';
?>