<?php 
header('Status: 404 Not Found');
header('HTTP/1.0 404 Not Found');
$title = 'Erreur | Success Mission';
// echo '<pre>';
// print_r($_SERVER);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title ?></title>
    <link rel="stylesheet" href="/public/css/style.css" type="text/css" media="all">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700,900">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <meta property="og:title" content="Success Mission">
    <meta property="og:locale" content="fr_FR">
    <meta property="og:type" content="website">
</head>
<body>
    <header>
        <img id="bubble-violet" src="/public/images/bubbles/big-bubble.svg" alt="bulle violette">
        
        <nav>
            <div class="container-logo">
                <a class="link-logo" href="/">
                    <img class="logo-menu" src="/public/images/logo.png" alt="Logo Success Mission">
                </a>
            </div>
        </nav>
        <div class="content-error">
            <div class="textError">
                <p>
                    Erreur 404
                    <br>
                    Page introuvable
                </p>
                <a class="btn" href="/">Retour à la page d'accueil</a>
            </div>
        </div>
        <div class="bubble_blue">
            <img src="/public/images/bubbles/bubble_blue.svg" alt="">
        </div>  
    </header>
</body>
</html>