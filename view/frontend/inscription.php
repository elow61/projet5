<?php 
$title = 'Inscription | Success Mission';
ob_start();
?>
    <div class="container-form">
        <h1>Inscription</h1>
        <form action="" method="post">
            <p><input type="email" name="email" placeholder="Votre e-mail"></p>
            <p><input type="password" name="pass" placeholder="Votre mot de passe"></p>
            <p><input type="password" name="pass" placeholder="Confirmez votre mot de passe"></p>
            <button class="btn-connexion" type="submit">Commencer</button>
        </form>
        <div class="separation">
            <div><p class="separate">ou</p></div>
        </div>
        <div id="my-signin2"></div>
        <div class="already-account">
            <p>Vous avez déjà un compte ? <a class="link-co" href="/Connexion">Connexion</a></p>
        </div>
    </div>
    <div class="bubble-blue">
        <img src="<?= IMAGES ?>bubble_blue.svg" alt="">
    </div>
</header>
<?php 
$content = ob_get_clean();
require 'template.php';
?>