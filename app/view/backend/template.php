<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= CSS ?>/backend/style.css">
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
                <div class="barre"></div>
                <div class="barre"></div>
                <div class="barre"></div>
            </div>
        </div>
        <nav>
            <ul>
                <li class="pseudo"><?= $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?></li>
                <hr>
                <a href="#"><li>Profil</li></a>
                <a href="/dashboard"><li>Tableau de bord</li></a>
                <a href="#"><li>Créer un nouveau projet</li></a>
                <hr>
                <a href="/connexion/logout"><li>Déconnexion</li></a>
            </ul>
        </nav> 
    </header>
    <?= $content ?>

    <script src="<?= JS ?>backend/main.js"></script>
</body>
</html>