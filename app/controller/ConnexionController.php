<?php

namespace App\Controller;

class ConnexionController extends Controller {

    public function index() 
    {
        $title = 'Connexion | Success Mission';
        require VIEW_FRONT . 'connexion.php';
    }

    public function login() 
    {
        $users = $this->users->get($this->request->getParam('email'));
        // Vérifie que les champs ont étés remplis
        if ($this->request->paramExist('email') && $this->request->paramExist('pass')) {
            $email = htmlspecialchars($this->request->getParam('email'));
            $pass = htmlspecialchars($this->request->getParam('pass'));

            // Vérification du mot de passe
            $pass_true = password_verify($pass, $users['pass']);
            if($pass_true) {
                $_SESSION['id'] = $users['id_user'];
                $_SESSION['first_name'] = $users['first_name'];
                $_SESSION['last_name'] = $users['last_name'];
                $_SESSION['email'] = $users['email'];

                if ($this->session->is_connected()) {
                    $this->redirecting('dashboard');
                } else {
                    throw new \Exception('Vous n\'êtes pas connecté.');
                }
            } else {
                throw new \Exception('Mauvais identifiant ou mot de passe');
            }
        } else {
            throw new \Exception('Les paramètres n\'existent pas');
        }
    }

    public function logout() 
    {
        $_SESSION = [];
        setcookie(session_name(), '', time());
        session_destroy();
        $this->redirecting('connexion');
    }
}