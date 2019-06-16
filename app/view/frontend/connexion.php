<?php 
$title = 'Connexion | Success Mission';
ob_start();
?>

    <div class="container-form">
        <h1>Connexion</h1>
        <form action="/connexion/login" method="post">
            <p><input type="email" name="email" placeholder="Votre e-mail"></p>
            <p><input type="password" name="pass" placeholder="Votre mot de passe"></p>
            <button class="btn-connexion" type="submit">Se connecter</button>
        </form>
        <div class="separation">
            <div><p class="separate">ou</p></div>
        </div>
        <div class="g-signin2" data-onsuccess="onSignIn"></div>
    </div>
    <div class="bubble_blue">
        <img src="<?= IMAGES_BUBBLE ?>bubble_blue.svg" alt="">
    </div>  
</header>


<?php 
$content = ob_get_clean();
require 'template.php';
?>