
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenue | Success Mission</title>
    <link rel="stylesheet" href="<?= CSS ?>style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700,900">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <meta property="og:title" content="Success Mission">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:type" content="website">
    <meta name="google-signin-client_id" content="785047213751-h0p7jjmjfvhdhmslgk5tv2822hfpsvut.apps.googleusercontent.com">
</head>
<body>
    <header>
        <img id="bubble-violet" src="<?= IMAGES ?>big-bubble.svg" alt="bulle violette">
        <nav>
            <div class="container-logo">
                <a class="link-logo" href="/">
                    <img id="logo-menu" src="<?= IMAGES ?>logo.png" alt="Logo Success Mission">
                </a>
            </div>
            <ul>
                <li><a href="/dashboard">Tableau de bord</a></li>
                <li><a href="/connexion/logout">Déconnexion</a></li>
            </ul>
        </nav>
        <div class="container-btn__create">
            <a href="/create" class="btn btn-create">Créer votre premier projet</a>
        </div>
        <div class="bubble_blue">
            <img src="<?= IMAGES ?>bubble_blue.svg" alt="">
        </div>
    </header>
</body>
</html>