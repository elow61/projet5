<?php 
ob_start();
?>
<div class="container-profil">
    <div class="headline">
        <h1><?= $_SESSION['first_name']. ' ' . $_SESSION['last_name']?></h1> 
    </div>
    <div class="container-img-profil">
        <img class="rounded" src="<?= $profil['url_img']?>" alt="">
    </div>
    <div class="container-info__profil">
        <p><?= $_SESSION['email']; ?></p>
        <br>
        <p> <span>Date d'ajout : </span><?= $profil['date_create'] ?></p>
    </div>
    <div class="card-project">
        <i class="fas fa-tasks"></i>
        <a href="/dashboard" class="nb-project">
            <span class="nb"><?= $nb_project['nb'] ?></span>
            <span>Projet<?php if ($nb_project['nb'] > 1):?>s<?php endif;?></span>
        </a>
    </div>
    <?php if ($profil['account_outside'] == 'false'):?>
            <div class="container-modal-profil">
                <div class="modal">
                    <button type="button" class="update btn" onclick="modal.viewModal();">Modifier le nom et prénom</button>
                    <div id="dialog" class="dialog" role="dialog" aria-hidden="true">
                        <div role="document" class="container-modal">
                            <button class="btn" aria-label="Fermer" title="Fermer la fenêtre" onclick="modal.closeModal();">X</button>
                            <h2>Modifier le nom et prénom : </h2>
                            <form action="/profil/updateName" method="post">
                                <input type="text" name="new-first-name" placeholder="<?= $_SESSION['first_name']?>">
                                <input type="text" name="new-last-name" placeholder="<?= $_SESSION['last_name']?>">
                                <button type="submit" class="btn btn-create">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal">
                    <button type="button" class="update btn" onclick="modal2.viewModal();">Modifier le mot de passe</button>
                    <div id="dialog2" class="dialog" role="dialog" aria-hidden="true">
                        <div role="document" class="container-modal">
                            <button class="btn" aria-label="Fermer" title="Fermer la fenêtre" onclick="modal2.closeModal();">X</button>
                            <h2>Modifier le mot de passe : </h2>
                            <form class="form-update-mdp" action="/profil/updatePass" method="post">
                                <input type="text" name="old-pass" placeholder="Tapez votre ancien mot de passe">
                                <input type="text" name="new-pass" placeholder="Tapez votre nouveau mot de passe">
                                <input type="text" name="new-pass-confirm" placeholder="Confirmez votre nouveau mot de passe">
                                <button type="submit" class="btn btn-create">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal">
                    <button type="button" class="update btn" onclick="modal3.viewModal();">Modifier l'image de profil</button>
                    <div id="dialog3" class="dialog" role="dialog" aria-hidden="true">
                        <div role="document" class="container-modal">
                            <button class="btn" aria-label="Fermer" title="Fermer la fenêtre" onclick="modal3.closeModal();">X</button>
                            <h2>Modifier l'avatar : </h2>
                            <form action="/profil/updateImg" method="post" enctype="multipart/form-data">
                                <input type="file" name="avatar" id="avatar" accept="image/png, image/jpg">
                                <button type="submit" class="btn btn-create">Modifier</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif;?>
</div>
<div class="bubble-end">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="100" height="200" viewBox="0 0 157 237">                
        <defs>
            <style>
            .cls-1 {
                fill: <?= $color ?>;
                fill-rule: evenodd;
                filter: url(#filter);
            }
            </style>
            <filter id="filter" x="-81" y="946" width="238" height="237" filterUnits="userSpaceOnUse">
            <feOffset result="offset" dx="-0.261" dy="2.989" in="SourceAlpha"/>
            <feGaussianBlur result="blur" stdDeviation="2.646"/>
            <feFlood result="flood" flood-opacity="0.5"/>
            <feComposite result="composite" operator="in" in2="blur"/>
            <feBlend result="blend" in="SourceGraphic" in2="blur"/>
            </filter>
        </defs>
        <path id="bulle_bleu" data-name="bulle bleu" class="cls-1" d="M36.5,949c71.009,0,123.817,75.08,111.5,110.5-9.221,26.52-53.942,21.58-80,54.5-15.368,19.42-14.161,48.64-31.5,56C4.166,1183.72-75,1130.99-75,1059.5-75,998.472-25.08,949,36.5,949Z" transform="translate(0 -946)"/>
    </svg>
        </div>
<?php 
$content = ob_get_clean();
require 'template.php';
?>