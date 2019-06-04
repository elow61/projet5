<?php 
$title = 'Tableau de bord | Success Mission';
ob_start();
?>
<div class="container-dashboard">
    <h1>Tableau de bord</h1>
    <div class="modal">
        <button type="button" class="btn btn-create" onclick="modal.viewModal();">Créer un nouveau projet</button>
        <div id="dialog" class="dialog" role="dialog" aria-hidden="true">
            <div role="document" class="container-modal">
                <button class="btn" aria-label="Fermer" title="Fermer la fenêtre" onclick="modal.closeModal();">X</button>
                <h2>Créer un projet :</h2>
                <form action="/dashboard/create" method="post">
                    <input type="text" name="project_name" id="project_name" placeholder="Entrez un nom de projet. Ex: Anniversaire Aurélie">
                    <label for="color">Veuillez choisir une couleur de référence :</label>
                    <div class="container-color">
                        <div class="color" style="background-color:rgb(163, 53, 53);"></div>
                        <div class="color" style="background-color:rgb(94, 190, 75);"></div>
                        <div class="color" style="background-color:#3fd5fb;"></div>
                        <div class="color" style="background-color:rgb(206, 216, 67);"></div>
                        <div class="color" style="background-color:#6e4eb0;"></div>
                        <div class="color" style="background-color:#333333;"></div>
                    </div>
                    <button type="submit" class="btn btn-create">Créer</button>
                </form>
            </div>
        </div>
    </div>
        <div class="container-projects">
            <?php if (is_array($projects)): ?>
                <?php foreach ($projects as $project): ?>
                    <a href="/workspace/<?=$projects['id_project']?>">
                        <div class="project">
                            <h3><?= htmlspecialchars_decode($project['p_name'])?></h3>
                        </div>
                    </a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    <div class="bubble-blue">
        <img src="<?= IMAGES ?>bubble_blue.svg" alt="">
    </div>
</div>

<!-- <div class="container-dashboard">
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
</div> -->

<?php 
$content = ob_get_clean();
require 'template.php';
?>