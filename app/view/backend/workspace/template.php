<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="<?= CSS ?>/backend/workspace/red.css" type="text/css" media="all">
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
                <hr>
                <a href="/connexion/logout"><li>Déconnexion</li></a>
            </ul>
        </nav> 
    </header>
    <div class="container-workspace">
        <div class="headline">
            <h1><?= $project['p_name']?></h1>
        </div>
        <div class="container-list">
            <div class="list currently">
                <h2>En cours</h2>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
            </div>
            <div class="list todo">
                <h2>A faire</h2>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
            </div>
            <div class="list finish">
                <h2>Terminé</h2>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
                <div class="task"></div>
            </div>
        </div>
        <div class="bubble-red">
            <img src="<?= IMAGES ?>bubble_red.svg" alt="">
        </div>
    </div>
    
    <script src="<?= JS ?>Modal.js"></script>
    <script src="<?= JS ?>backend/main.js"></script>
</body>
</html>