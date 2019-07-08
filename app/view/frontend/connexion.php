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
        <a href="https://accounts.google.com/o/oauth2/v2/auth?scope=email&access_type=online&redirect_uri=<?= urlencode('http://localhost:8888/google')?>&response_type=code&client_id=<?= GOOGLE_ID ?>">Se connecter via Google</a>
    </div>
    <div class="bubble_blue">
        <img src="<?= IMAGES_BUBBLE ?>bubble_blue.svg" alt="">
    </div>  
</header>


<?php 
$content = ob_get_clean();
require 'template.php';
?>