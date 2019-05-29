<?php

namespace App\Controller;

use App\Helper;
use App\Model\UsersManager;

class ConnexionController extends Controller {

    private $users;

    public function __construct() {
        $this->session = new Helper();
        $this->users = new UsersManager();
    }

    public function index() {
        require VIEW_FRONT . 'connexion.php';
    }

    public function login() {
        $users = $this->users->get($this->request->getParam('email'));

        // Vérifie que les champs ont étés remplis
        if ($this->request->paramExist('email') && $this->request->paramExist('pass')) {
            $email = $this->request->getParam('email');
            $pass = $this->request->getParam('pass');

            // Vérification du mot de passe
            $pass_true = password_verify($pass, $users['pass']);
            if($pass_true) {
                $_SESSION['id'] = $users['id'];
                $_SESSION['first_name'] = $users['first_name'];
                $_SESSION['last_name'] = $users['last_name'];

                if ($this->session->is_connected()) {
                    $this->redirecting('dashboard');
                } else {
                    echo 'no connecté.';
                }
            } else {
                echo 'Mauvais identifiant ou mot de passe';
            }
        } else {
            'Les paramètres n\'existent pas';
        }
    }

    public function logout() {
        $_SESSION = [];
        setcookie(session_name(), '', time());
        session_destroy();
        $this->redirecting(connexion);
    }
}