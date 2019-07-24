<?php

namespace App\Controller;


class InscriptionController extends Controller {

    public function index() 
    {
        require VIEW_FRONT.'inscription.php';
    }

    public function register() 
    {
        
        $getUsers = $this->users->get($this->request->getParam('email'));

        switch (false) {
            case ($this->request->paramExist('first_name') && $this->request->paramExist('last_name')):
                echo "Veuillez remplir les champs nom et prénom";
                break;
            case ($this->request->paramExist('email')):
                echo "Veuillez remplir le champ e-mail";
                break;

            case (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $this->request->getParam('email'))):
                echo "Email non autorisé<hr>";
                break;

            case ($this->request->getParam('email') !== $getUsers['email']):
                echo "L'E-mail est déjà inscrit en base de donnée<hr>";
                break;

            case ($this->request->paramExist('pass') && $this->request->paramExist('pass_confirm')):
                "Veuillez remplir les champs mot de passe";
                break;

            case (preg_match('#^(?=.*[a-z])(?=.*[0-9]).{6,}$#', $this->request->getParam('pass'))):
                echo 'Mot de passe non autorisé<hr>';
                break;

            case ($this->request->getParam('pass_confirm') == $this->request->getParam('pass')):
                "Combinaison des mots de passe fausse.";
                break;

            default:
                $email = htmlspecialchars($this->request->getParam('email'));
                $pass = htmlspecialchars($this->request->getParam('pass'));
                $pass_confirm = htmlspecialchars($this->request->getParam('pass_confirm'));
                $first_name = htmlspecialchars($this->request->getParam('first_name'));
                $last_name = htmlspecialchars($this->request->getParam('last_name'));
                $users = $this->users->newUser(
                    $email,
                    password_hash($pass, PASSWORD_BCRYPT),
                    $first_name,
                    $last_name,
                    'false',
                    '../public/images/avatars/default.jpg'
                );
                $this->sessionID();
                break;
        }
    }

    public function sessionID() 
    {
        $getUsers = $this->users->get($this->request->getParam('email'));
        echo 'connexion réussie';
        $_SESSION['id'] = $getUsers['id_user'];
        $_SESSION['first_name'] = $getUsers['first_name'];
        $_SESSION['last_name'] = $getUsers['last_name'];
        $_SESSION['email'] = $getUsers['email'];

        if ($this->session->is_connected()) {
            $this->redirecting('welcome');
        }
    }
}