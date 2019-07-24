<?php 
$title = 'Espace profil | ' . $_SESSION['first_name'];
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
                            <form action="/profil/updatePass" method="post">
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
<div class="bubble-blue">
    <img src="<?= IMAGES_BUBBLE ?>bubble_blue.svg" alt="">
</div>
<?php 
$content = ob_get_clean();
require 'template.php';
?>