<?php

namespace App\Controller;

use App\Model\UsersManager;

class ConnexionController extends Controller {

    public function index() {
        echo 'test';
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

    public function login() {
        
        $userManager = new UsersManager();
        $users = $userManager->get($_POST['email']);

        $pass_true = password_verify($_POST['pass'], $users['pass']);

        if (!users) {
            header('Location: /connexion/no-connected');
        } else {
            if ($pass_true) {
                $_SESSION['id'] = $users['id'];
                $_SESSION['email'] = $email;
                header('Location: /dashboard');
            } else {
                header('Location: /connexion');
            }
        }
    }
}