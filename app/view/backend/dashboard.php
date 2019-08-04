<?php 
ob_start();
?>

<div class="container-dashboard">
    <div class="headline">
        <h1>Tableau de bord</h1>
    </div>
    <div class="container-modals">
        <div class="modal">
            <button type="button" class="create-project btn" onclick="modal.viewModal();">Créer un projet</button>
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

                            <input type="radio" name="color" id="violet" value="#6362D4, #f3afe4">
                            <label for="violet" class="violet"></label>

                            <input type="radio" name="color" id="white" value="#40454A, #B1B9B9">
                            <label for="white" class="white"></label>
                        </div>
                        <button type="submit" class="btn btn-create">Créer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal">
            <button type="button" class="create-project btn" onclick="modal2.viewModal();">Supprimer un projet</button>
            <div id="dialog2" class="dialog" role="dialog" aria-hidden="true">
                <div role="document" class="container-modal">
                    <button class="btn" aria-label="Fermer" title="Fermer la fenêtre" onclick="modal2.closeModal();">X</button>
                    <h2>Supprimer un projet :</h2>
                    <form action="/dashboard/delete" method="post">
                        <div class="container-choice-project">
                            <?php foreach ($projects as $project): ?>
                            <?php if ($project['main_user'] == $_SESSION['id']):?>
                                <div class="container-input">
                                    <input type="radio" name="choice-project" value="<?= $project['p_id'] ?>">
                                    <label><?= $project['p_name'] ?></label>
                                </div>
                                <?php endif;?>
                            <?php endforeach; ?>
                        </div>
                        <button type="submit" class="btn btn-create">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal">
            <button type="button" class="create-project btn" onclick="modal3.viewModal();">Modifier un projet</button>
            <div id="dialog3" class="dialog" role="dialog" aria-hidden="true">
                <div role="document" class="container-modal">
                    <button class="btn" aria-label="Fermer" title="Fermer la fenêtre" onclick="modal3.closeModal();">X</button>
                    <h2>Modifier le nom de quel projet : </h2>
                    <form action="/dashboard/update" method="post">
                        <div class="container-choice-project">
                            <?php foreach ($projects as $project): ?>
                            <?php if ($project['main_user'] == $_SESSION['id']):?>
                                <div class="container-input">
                                    <input type="radio" name="choice-project" value="<?= $project['p_id'] ?>" onclick="updateProject(this);">
                                    <label><?= $project['p_name'] ?></label>
                                </div>
                                <?php endif;?>
                            <?php endforeach; ?>
                            <input type="text" name="newName" id="newName">
                        </div>
                        <button type="submit" class="btn btn-create">Modifier</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    <div class="container-space__dashboard">
        <div>
            <h3 class="list-projects">Mes projets</h3>
            <hr>
        </div>
        <div class="container-projects">
            <?php if (is_array($projects)): ?>
                <?php foreach ($projects as $project): ?>
                    <?php if ($project['main_user'] == $_SESSION['id']):?>
                        <a href="/workspace/<?=$project['id_project']?>">
                            <div class="project" style="background:linear-gradient(<?= $project['p_color']?>);">
                                <h3><?= htmlspecialchars_decode($project['p_name'])?></h3>
                                <div class="container-bubble">
                                    <div class="bubble bubble-top"></div>
                                    <div class="bubble bubble-bottom"></div>
                                </div>
                            </div>
                        </a>
                    <?php endif;?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="container-space__dashboard project-invit">
        <div>
            <h3 class="list-projects">Mes projets invités</h3>
            <hr>
        </div>
        <div class="container-projects">
            <?php if (is_array($projects)): ?>
                <?php foreach ($projects as $project): ?>
                    <?php if ($project['main_user'] !== $_SESSION['id']):?>
                        <a href="/workspace/<?=$project['id_project']?>">
                            <div class="project" style="background:linear-gradient(<?= $project['p_color']?>);">
                                <h3><?= htmlspecialchars_decode($project['p_name'])?></h3>
                                <div class="container-bubble">
                                    <div class="bubble bubble-top"></div>
                                    <div class="bubble bubble-bottom"></div>
                                </div>
                            </div>
                        </a>
                    <?php endif;?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="bubble-end">
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="200" viewBox="0 0 157 237">                
            <defs>
                <style>
                .cls-1 {
                    fill: <?= $color ?>;
                    fill-rule: evenodd;
                    filter: url(#filter);
                }
                </style>
                <filter id="filter" x="-81" y="946" width="238" height="237" filterUnits="userSpaceOnUse">
                <feOffset result="offset" dx="-0.261" dy="2.989" in="SourceAlpha"/>
                <feGaussianBlur result="blur" stdDeviation="2.646"/>
                <feFlood result="flood" flood-opacity="0.5"/>
                <feComposite result="composite" operator="in" in2="blur"/>
                <feBlend result="blend" in="SourceGraphic" in2="blur"/>
                </filter>
            </defs>
            <path id="bulle_bleu" data-name="bulle bleu" class="cls-1" d="M36.5,949c71.009,0,123.817,75.08,111.5,110.5-9.221,26.52-53.942,21.58-80,54.5-15.368,19.42-14.161,48.64-31.5,56C4.166,1183.72-75,1130.99-75,1059.5-75,998.472-25.08,949,36.5,949Z" transform="translate(0 -946)"/>
        </svg>
    </div>
</div>
<?php 
$content = ob_get_clean();
require 'template.php';
?>