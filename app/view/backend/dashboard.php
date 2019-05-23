<?php 
$title = 'Tableau de bord | Success Mission';
ob_start();
?>

<div class="container-dashboard">
    <h1>Tableau de bord</h1>
    <div class="container-projects">
        <div class="project yellow">
            <h3>Projet 5</h3>
        </div>
        <div class="project red">
            <h3>Anniversaire Aurélie</h3>
        </div>
        <div class="project blue">
            <h3>Recherche d'emplois</h3>
        </div>
        <div class="project green">
            <h3>Recherche d'emplois</h3>
        </div>
        <div class="project violet">
            <h3>Recherche d'emplois</h3>
        </div>
        <div class="project">
            <h3>Recherche d'emplois</h3>
        </div>
    </div>
    <div class="bubble-blue">
        <img src="<?= IMAGES ?>bubble_blue.svg" alt="">
    </div>
</div>

<?php 
$content = ob_get_clean();
require 'template.php';
?>