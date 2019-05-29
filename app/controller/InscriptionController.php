<?php

namespace App\Controller;

class InscriptionController extends Controller {

    public function index() {
        require VIEW_FRONT.'inscription.php';
    }

    public function register() {

        $userManager = new UsersManager();
        $users = $userManager->newUser($_POST['email'], $_POST['pass']);

        $pass_confirm = password_verify($_POST['pass'], $_POST['pass_confirm']);

        var_dump($pass_confirm);

        if ($pass_confirm) {
            password_hash($_POST['pass'], PASSWORD_BCRYPT);
            require VIEW_BACK.'dashboard.php';

        } else {
            header('Location: /inscription/nosuccess');

        }
    }
}