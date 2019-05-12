<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Success Mission</title>
    <link rel="stylesheet" href="../public/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Alegreya+Sans:400,700,900">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <header>
        <div class="header__bg"></div>
        <img id="bubble-violet" src="../public/images/big-bubble.svg" alt="bulle violette">
        <nav>
            <img id="logo-menu" src="../public/images/logo.svg" alt="Logo Success Mission">
            <ul>
                <li>En savoir plus</li>
                <li>Connexion</li>
            </ul>
        </nav>
        <div class="container-accroche">
            <div class="accroche">
                <div class="title">
                    <h1>Success<br>Mission</h1>
                    <div class="text">
                        <div class="barre-verticale"></div>
                        <p>Manipulez vos tâches avec facilité, organisez votre planning <br> et sélectionnez vos priorités avec souplesse.</p>
                    </div>
                    <br>
                    <br>
                    <div class="btn">
                        <a class="btn-look" href="#section">En voir plus</a>
                        <a href="/" class="btn-inscription">S'inscrire</a>
                    </div>
                </div>
                <img id="logo" src="../public/images/logo.svg" alt="Logo Success Mission">
            </div>
        </div>
        <div class="bubble-blue">
            <img src="../public/images/bubble_blue.svg" alt="">
        </div>
    </header>

    <!-- Section informations -->
    <div id="info">
        <section class="text-info">
            <h2>Accédez aux informations rapidement</h2>
            <p>
                <span>Vous souhaitez des détails sur une tâche ?</span>
                <br>
                Ajoutez des images, des dates limites ou encore
                <br>
                des commentaires à chacune de vos missions.
            </p>
        </section>
        <aside>
            <img class="mockup" src="../public/images/mockup.png" alt="Site web visible depuis un iMac">
        </aside>
    </div>

    <!-- Section how it works? -->
    <section id="how">
        <div class="how__bg"></div>
        <h2>Comment ça marche ?</h2>
        <div id="slider">
            <div id="button-prev" class="command command-prev"><i class="far fa-arrow-alt-circle-left fa-2x"></i></div>
            <div id="button-next" class="command command-next"><i class="far fa-arrow-alt-circle-right fa-2x"></i></div>
            <div id="container-slider">
                <div class="slides">
                    <figure class="slide">
                        <img src="../public/images/slider/diapo1.jpg" alt="">
                    </figure>
                    <figure class="slide">
                        <img src="../public/images/slider/diapo2.jpg" alt="">
                    </figure>
                    <figure class="slide">
                        <img src="../public/images/slider/diapo3.jpg" alt="">
                    </figure>
                    <figure class="slide">
                        <img src="../public/images/slider/diapo4.jpg" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </section>

    <!-- Autre section -->
    <section></section>
    
    <script src="../public/js/Slider.js"></script>
</body>
</html>