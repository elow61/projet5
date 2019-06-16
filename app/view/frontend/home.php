<?php 
$title = 'Accueil | Success Mission';
ob_start();
?>
        <div class="container-accroche">
            <div class="accroche">
                <div class="title">
                    <div class="headline">
                        <h1>Success<br>Mission</h1>
                    </div>
                    <div class="text">
                        <div class="barre-verticale"></div>
                        <p>Manipulez vos tâches avec facilité, organisez votre planning <br> et sélectionnez vos priorités avec souplesse.</p>
                    </div>
                    <br>
                    <br>
                    <div class="container-btn">
                        <a class="btn btn-look" href="#info">En voir plus</a>
                        <a class="btn btn-inscription" href="/inscription">S'inscrire</a>
                    </div>
                </div>
                <img id="logo" src="<?= IMAGES ?>logo.svg" alt="Logo Success Mission">
            </div>
        </div>
        <div class="header__bg"></div>
        <div class="bubble-blue">
            <img src="<?= IMAGES_BUBBLE ?>bubble_blue.svg" alt="">
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
            <img class="mockup" src="<?= IMAGES ?>mockup.png" alt="Site web visible depuis un iMac">
        </aside>
    </div>

    <!-- Section how it works? -->
    <section id="how">
        <div class="how__bg"></div>
        <h2>Comment ça marche ?</h2>
        <div id="slider">
            <div id="button-prev" class="command command-prev" onclick="slider.returnImage();"><i class="far fa-arrow-alt-circle-left fa-2x"></i></div>
            <div id="button-next" class="command command-next" onclick="slider.changeImage();"><i class="far fa-arrow-alt-circle-right fa-2x"></i></div>
            <div id="container-slider">
                <div class="slides">
                    <figure class="slide">
                        <img src="<?= IMAGES ?>slider/diapo1.jpg" alt="">
                        <figcaption>...</figcaption>
                    </figure>
                    <figure class="slide">
                        <img src="<?= IMAGES ?>slider/diapo2.jpg" alt="">
                        <figcaption>...</figcaption>
                    </figure>
                    <figure class="slide">
                        <img src="<?= IMAGES ?>slider/diapo3.jpg" alt="">
                        <figcaption>...</figcaption>
                    </figure>
                    <figure class="slide">
                        <img src="<?= IMAGES ?>slider/diapo4.jpg" alt="">
                        <figcaption>...</figcaption>
                    </figure>
                </div>
                <nav>
                    <ul>
                        <li class="step active"></li>
                        <li class="step"></li>
                        <li class="step"></li>
                        <li class="step"></li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

    <!-- It's now -->
    <section id="begin">
        <h2>Commencez dès aujourd'hui à vous organiser !</h2>
        <a class="btn btn-begin" href="/inscription">Venez, c'est gratuit !</a>
    </section>
    <div class="separation"></div>
    <footer>
        <div class="container-footer">
            <img id="logo-menu" src="<?= IMAGES ?>logo.svg" alt="Logo Success Mission">
            <p>Application web de gestion de projets</p>
            <p>Copyright © Success Mission - 2019. Tous droits réservés</p>
        </div>
    </footer>
<?php 
$content = ob_get_clean();
require 'template.php';
?>