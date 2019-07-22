
<!DOCTYPE html>
<html lang="fr">
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
    <header style="min-height:0;">
        <img id="bubble-violet" src="<?= IMAGES_BUBBLE ?>big-bubble.svg" alt="bulle violette">
        <nav>
            <div class="container-logo">
                <a class="link-logo" href="/">
                    <img class="logo-menu" src="<?= IMAGES ?>logo.png" alt="Logo Success Mission">
                </a>
            </div>
            <ul>
                <li><a href="/dashboard">Tableau de bord</a></li>
                <li><a href="/connexion/logout">Déconnexion</a></li>
            </ul>
        </nav>
        <div class="bubble_blue">
            <img src="<?= IMAGES ?>bubble_blue.svg" alt="">
        </div>
    </header>

    <main class="modal">
        <button type="button" class="btn btn-create" onclick="modal.viewModal();">Créer votre premier projet</button>
        <div id="dialog" class="dialog" role="dialog" aria-hidden="true">
            <div role="document" class="container-modal">
                <button class="btn" aria-label="Fermer" title="Fermer la fenêtre" onclick="modal.closeModal();">X</button>
                <h2>Créer un projet</h2>
                <form action="/welcome/create" method="post">
                    <input type="text" name="project_name" id="project_name" placeholder="Entrez un nom de projet. Ex: Anniversaire Aurélie">
                    <h3>Veuillez choisir une couleur de référence :</h3>
                    <div class="container-color">
                        <input type="radio" name="color" id="red" value="#BC1D35, #EB8C53">
                        <label for="red" class="red"></label>

                        <input type="radio" name="color" id="green" value="#5EBE4B,#CED843">
                        <label for="green" class="green"></label>

                        <input type="radio" name="color" id="blue" value="#3FD5FB, #f3afe4">
                        <label for="blue" class="blue"></label>

                        <input type="radio" name="color" id="yellow" value="#CED843, #D1721D">
                        <label for="yellow" class="yellow"></label>

                        <input type="radio" name="color" id="violet" value="#6362D4, #f3afe4">
                        <label for="violet" class="violet"></label>

                        <input type="radio" name="color" id="white" value="#40454A, #B1B9B9">
                        <label for="white" class="white"></label>
                    </div>
                    <button type="submit" class="btn btn-create">Créer</button>
                </form>
            </div>
        </div>
    </main>
    
    <script src="<?= JS?>Modal.js"></script>
</body>
</html>