<?php 
$title = $project['project_name'] . ' | ' . $_SESSION['first_name'];
$color = "#E6EAEC"; // white
$svg_wave = "/public/images/waves/wave-white.svg";
if ($project['color_project'] === "#BC1D35, #EB8C53")
{
    $color = "#A33535"; // Red
    $svg_wave = "/public/images/waves/wave-red.svg";
} 
elseif ($project['color_project'] === "#5EBE4B,#CED843")
{
    $color = "#5EBE4B"; // Green
    $svg_wave = "/public/images/waves/wave-green.svg";
}
elseif ($project['color_project'] === "#3FD5FB, #f3afe4")
{
    $color = "#3FD5FB"; // Blue
    $svg_wave = "/public/images/waves/wave-blue.svg";
}
elseif ($project['color_project'] === "#CED843, #D1721D")
{
    $color = "#CED843"; // Yellow
    $svg_wave = "/public/images/waves/wave-yellow.svg";
}
elseif ($project['color_project'] === "#6362D4, #f3afe4")
{
    $color = "#6e4eb0"; // Violet
    $svg_wave = "/public/images/waves/wave-violet.svg";
}
ob_start();
?>
    <div class="container-workspace">
        <div class="headline" style="background-image: url('<?= $svg_wave?>');">
            <h1><?= $project['project_name']?></h1>
        </div>
        <div id="container-list">
            <?php if (is_array($lists)): ?>
                <?php foreach ($lists as $list):?>
                    <div data-id="<?= $list['id_list'] ?>" class="list">
                        <div class="title-list">
                            <h2><?= htmlspecialchars($list['name_list']) ?></h2>
                            <div class="btn-list remove-list" data-id="<?= $list['id_list'] ?>" onclick="modal2.viewModal();"></div>
                        </div>
                        <div class="container-task">
                                <div class="task-content" data-id="<?= $list['id_list'] ?>">
                                    <?php foreach ($tasks as $task): ?>
                                        <?php if ($list['id_list'] == $task['list_id']):?>
                                            <div class="task" data-id="<?= $task['id']?>" onclick="modal4.viewModal();">
                                                <?= htmlspecialchars($task['name_task'])?>
                                            </div>
                                        <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            <div class="container-form-task" data-id="<?= $list['id_list'] ?>">
                                <!-- Create a task -->
                                <form method="POST" class="form-task">
                                    <input type="hidden" name="name_list" id="name_list" value="">
                                    <input type="hidden" class="input_id_list" name="id_list" id="id_list" value="<?= $list['id_list'] ?>">
                                    <textarea name="name_task" id="" cols="30" rows="5"></textarea>
                                    <div class="container-button">
                                        <button type="submit">Nouvelle tâche</button>
                                        <button type="button" class="cancel">X</button>
                                    </div>
                                </form>
                            </div>
                            <div class="btn-add-task" data-name="<?= $list['name_list'] ?>" data-id="<?= $list['id_list'] ?>">+ tâches</div>
                        </div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            <div class="btn-list add-list" onclick="modal.viewModal();"></div>
            <!-- Create a list -->
            <div class="modal">
                <div id="dialog" class="dialog modal-for_workspace" role="dialog" aria-hidden="true">
                    <div role="document" class="container-modal">
                        <button class="btn" style="color: <?= $color ?>;" aria-label="Fermer" title="Fermer la fenêtre" onclick="modal.closeModal();">X</button>
                        <h2 style="background-color: <?= $color ?>;">Créer une liste :</h2>
                        <form method="POST" id="form">
                            <input type="text" name="list_name" id="list_name" placeholder="Entrez le nom d'une liste. Ex: En cours">
                            <button type="submit" style="background-color: <?= $color ?>;" class="btn btn-create">Créer</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Delete a list -->
            <div class="modal">
                <div id="dialog2" class="dialog modal-for_workspace" role="dialog" aria-hidden="true">
                    <div role="document" class="container-modal">
                        <button class="btn" style="color: <?= $color ?>;" aria-label="Fermer" title="Fermer la fenêtre" onclick="modal2.closeModal();">X</button>
                        <h2 style="background-color: <?= $color ?>;">Êtes-vous sûr de vouloir supprimer cette liste ?</h2>
                        <form method="POST" id="form-delete">
                            <input id="input-list" type="hidden" name="id_list" value="">
                            <button type="submit" style="background-color: <?= $color ?>;" class="btn btn-create">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Update or delete a task -->
            <div class="modal">
                <div id="dialog4" class="dialog modal-for_workspace" role="dialog" aria-hidden="true">
                    <div role="document" class="container-modal">
                        <button style="color: <?= $color ?>;" class="btn" aria-label="Fermer" title="Fermer la fenêtre" onclick="modal4.closeModal();">X</button>
                        <h2 style="background-color: <?= $color ?>;"  id="title-name-task"></h2>
                        <div class="container-forms_for_task">
                            <form method="POST" id="modal-tasks-delete">
                                <input id="input-task-delete" type="hidden" name="id_task" value="">
                                <button type="submit" style="background-color: <?= $color ?>;" class="btn btn-create">Supprimer</button>
                            </form>
                            <form method="post" id="modal-tasks-update">
                                <input id="input-task-update" type="hidden" name="id_task" value="">
                                <!-- <input type="text" name="newTask" id="newTask"> -->
                                <textarea name="newTask" id="newTask" cols="30" rows="4"></textarea>
                                <br>
                                <button type="submit" style="background-color: <?= $color ?>;" class="btn btn-create">Mettre à jour la tâche</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bubble-end">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="157" height="237" viewBox="0 0 157 237">                
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
                    <feBlend result="blend" in="SourceGraphic"/>
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