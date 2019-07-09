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
                <a href="/profil"><li>Profil</li></a>
                <a href="/dashboard"><li>Tableau de bord</li></a>
                <hr style="background-color: <?= $color ?>;">
                <a href="/connexion/logout" style="color: <?= $color ?>;"><li>Déconnexion</li></a>
            </ul>
        </nav> 
    </header>
    <?= $content ?>

    <script src="<?= JS ?>ajax.js"></script>
    <script src="<?= JS ?>backend/main.js"></script>
    <script src="<?= JS ?>backend/lists.js"></script>
    <script src="<?= JS ?>backend/tasks.js"></script>
    <script src="<?= JS ?>Modal.js"></script>
</body>
</html>