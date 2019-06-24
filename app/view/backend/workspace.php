<?php 
$title = $project['project_name'] . ' | ' . $_SESSION['first_name'];
$color = "#E6EAEC"; // White
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
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= CSS ?>backend/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700,900">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="container-btn__hamburger">
            <div class="container-logo">
                <a class="link-logo" href="/dashboard">
                    <img id="logo-menu" src="<?= IMAGES ?>logo.png" alt="Logo Success Mission">
                </a>
            </div>
            <div id="btn-hamburger">
                <div class="barre" style="background-color: <?= $color ?>;"></div>
                <div class="barre" style="background-color: <?= $color ?>;"></div>
                <div class="barre" style="background-color: <?= $color ?>;"></div>
            </div>
        </div>
        <nav>
            <ul>
                <li class="pseudo"><?= $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></li>
                <hr style="background-color: <?= $color ?>;">
                <a href="#"><li>Profil</li></a>
                <a href="/dashboard"><li>Tableau de bord</li></a>
                <hr style="background-color: <?= $color ?>;">
                <a href="/connexion/logout" style="color: <?= $color ?>;"><li>Déconnexion</li></a>
            </ul>
        </nav> 
    </header>
    <div class="container-workspace">
        <div class="headline" style="background-image: url('<?= $svg_wave?>');">
            <h1><?= $project['project_name']?></h1>
        </div>
        <div class="btn-list add-list" onclick="modal.viewModal();"></div> 
        <div id="container-list">
            <?php if (is_array($lists)): ?>
                <?php foreach ($lists as $list):?>
                    <div class="list">
                        <h2><?= $list['name_list'] ?></h2>
                        <div class="btn-list remove-list" value="<?= $list['id_list'] ?>" onclick="modal2.viewModal();"></div>
                    </div>
                <?php endforeach;?>
            <?php endif;?>
            <div class="modal">
                <div id="dialog2" class="dialog" role="dialog" aria-hidden="true">
                    <div role="document" class="container-modal">
                        <button class="btn" aria-label="Fermer" title="Fermer la fenêtre" onclick="modal.closeModal();">X</button>
                        <h2 style="color: <?= $color ?>;">Êtes-vous sûr de vouloir supprimer cette liste ?</h2>
                        <form method="POST" id="form-delete">
                            <input id="input-list" type="hidden" name="name_list" value="">
                            <p id="error-delete" style="color: <?= $color ?>;"></p>
                            <button type="submit" style="color: <?= $color ?>;" class="btn btn-create">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal">
                <div id="dialog" class="dialog" role="dialog" aria-hidden="true">
                    <div role="document" class="container-modal">
                        <button class="btn" aria-label="Fermer" title="Fermer la fenêtre" onclick="modal.closeModal();">X</button>
                        <h2 style="color: <?= $color ?>;">Créer une liste :</h2>
                        <form method="POST" id="form">
                            <input type="text" name="list_name" id="list_name" placeholder="Entrez le nom d'une liste. Ex: En cours">
                            <p id="error" style="color: <?= $color ?>;"></p>
                            <button type="submit" style="color: <?= $color ?>;" class="btn btn-create">Créer</button>
                        </form>
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
    
    <script src="<?= JS ?>ajax.js"></script>
    <script src="<?= JS ?>Modal.js"></script>
    <script src="<?= JS ?>backend/main.js"></script>
</body>
</html>
