<?php 
$title = 'Inscription | Success Mission';
ob_start();
?>
    <div class="container-form">
        <h1>Inscription</h1>
        <form action="/inscription/register" method="post">
            <p><input type="text" name="first_name" placeholder="Votre prénom"></p>
            <p><input type="text" name="last_name" placeholder="Votre nom"></p>
            <p><input type="email" name="email" placeholder="Votre e-mail"></p>
            <p><input type="password" name="pass" placeholder="Votre mot de passe" pattern=".{6,}" required title="8 caractères minimum"></p>
            <p><input type="password" name="pass_confirm" placeholder="Confirmez votre mot de passe" pattern=".{6,}" required title="8 caractères minimum"></p>
            <button class="btn-connexion" type="submit">Commencer</button>
        </form>
        <div class="separation">
            <div><p class="separate">ou</p></div>
        </div>
        <div id="my-signin2"></div>
        <div class="already-account">
            <p>Vous avez déjà un compte ? <a class="link-co" href="/connexion">Connexion</a></p>
        </div>
    </div>
    <div class="bubble_blue">
        <img src="<?= IMAGES_BUBBLE ?>bubble_blue.svg" alt="">
    </div>
</header>
    
<?php 
$content = ob_get_clean();
require 'template.php';
?>