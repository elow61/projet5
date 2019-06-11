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
                    <h3>Veuillez choisir une couleur de référence :</h3>
                    <div class="container-color">
                        <input type="radio" name="color" id="red" value="#BC1D35, #EB8C53">
                        <label for="red" class="red"></label>

                        <input type="radio" name="color" id="green" value="#5EBE4B,#CED843">
                        <label for="green" class="green"></label>

                        <input type="radio" name="color" id="blue" value="#3FD5FB, #f3afe4">
                        <label for="blue" class="blue"></label>

                        <input type="radio" name="color" id="yellow" value="#CED843, #D1721D">
                        <label for="yellow" class="yellow"></label>

                        <input type="radio" name="color" id="violet" value="#6362D4, #811DD1">
                        <label for="violet" class="violet"></label>

                        <input type="radio" name="color" id="black" value="#1c212e, #242d3d">
                        <label for="black" class="black"></label>
                    </div>
                    <button type="submit" class="btn btn-create">Créer</button>
                </form>
            </div>
        </div>
    </div>
        <div class="container-projects">
            <?php if (is_array($projects)): ?>
                <?php foreach ($projects as $project): ?>
                    <a href="/workspace/<?=$project['id_project']?>">
                        <div class="project" style="background:linear-gradient(<?= $project['p_color']?>);">
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
<?php 
$content = ob_get_clean();
require 'template.php';
?>