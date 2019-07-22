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

    <div class="container-page">
        <!-- Section informations -->
        <div id="info">
            <section class="text-info">
                <h2>Accédez aux informations rapidement</h2>
                <p>
                    <span>Vous n'arrivez plus à retenir toute les tâches que l'on vous demande ?</span>
                    Avec <span>Success Mission</span> simplifiez vous la vie ! Notez chaque projets
                    en cours, et détaillez chaque tâches que vous devrez réaliser. Vous pouvez ajouter
                    autant de tâches que vous souhaitez, et même créer différentes listes afin d'être 
                    encore plus organisé ! 
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
                            <img src="<?= IMAGES ?>slider/page1.png" alt="">
                            <figcaption>Retrouvez la liste de vos projets sur votre tableau de bord...</figcaption>
                        </figure>
                        <figure class="slide">
                            <img src="<?= IMAGES ?>slider/page2.png" alt="">
                            <figcaption>En cliquant sur un projet, vous trouverez un bouton afin de créer votre première liste...</figcaption>
                        </figure>
                        <figure class="slide">
                            <img src="<?= IMAGES ?>slider/page3.png" alt="">
                            <figcaption>Vous aurez ensuite accès à un bouton permettant l'ajout d'une tâche...</figcaption>
                        </figure>
                        <figure class="slide">
                            <img src="<?= IMAGES ?>slider/page4.png" alt="">
                            <figcaption>Votre liste et ses tâches sont créées :D</figcaption>
                        </figure>
                        <figure class="slide">
                            <img src="<?= IMAGES ?>slider/page5.png" alt="">
                            <figcaption>Ne vous inquiétez pas... Vous pouvez supprimer l'une de vos tâche...</figcaption>
                        </figure>
                        <figure class="slide">
                            <img src="<?= IMAGES ?>slider/page6.png" alt="">
                            <figcaption>Et si vous souhaitez supprimer une liste...</figcaption>
                        </figure>
                    </div>
                    <nav>
                        <ul>
                            <li class="step active"></li>
                            <li class="step"></li>
                            <li class="step"></li>
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
                <img class="logo-menu" src="<?= IMAGES ?>logo.svg" alt="Logo Success Mission">
                <p class="name-footer">SuccessMission</p>
                <p class="type-footer">Application web de gestion de projets</p>
                <br>
                <p><a href="/mention" class="mention">Mentions légales</a></p>
                <p class="copyright">Copyright © Success Mission - 2019. Tous droits réservés</p>
            </div>
        </footer>
    </div>
    
<?php 
$content = ob_get_clean();
require 'template.php';
?>