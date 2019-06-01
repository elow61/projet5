<?php

namespace App\Controller;

use App\Helper;
use App\Model\UsersManager;

class InscriptionController extends Controller {

    private $users;

    public function __construct() 
    {
        $this->users = new UsersManager();
        $this->session = new Helper();
    }

    public function index() 
    {
        require VIEW_FRONT.'inscription.php';
    }

    public function register() 
    {
        
        $getUsers = $this->users->get($this->request->getParam('email'));

        // if ($this->request->paramExist('first_name') && $this->request->paramExist('last_name')) {
        //     echo 'Noms et prénoms enregistrés.<hr>';
        //     if($this->request->paramExist('email')) {
        //         $email = htmlspecialchars($this->request->getParam('email'));
        //         echo "Email $email enregistré.<hr>";
        //         if (preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $email)) {
        //             echo "Email autorisé<hr>";
        //             if($email !== $getUsers['email']) {
        //                 echo "L'E-mail n'est pas inscrit en base de donnée<hr>";
        //                 if ($this->request->paramExist('pass') && $this->request->paramExist('pass_confirm')) {
        //                     echo "Le mot de passe a bien été saisi.<hr>";
        //                     $pass = htmlspecialchars($this->request->getParam('pass'));
        //                     $pass_confirm = htmlspecialchars($this->request->getParam('pass_confirm'));
        //                     if (preg_match('#^(?=.*[a-z])(?=.*[0-9]).{6,}$#', $pass)) {
        //                         echo 'Mot de passe autorisé<hr>';
        //                         if ($pass_confirm == $pass) {
        //                             echo 'connecter !!<hr>';

        //                             $users = $this->users->newUser(
        //                                 $email,
        //                                 password_hash($pass, PASSWORD_BCRYPT),
        //                                 $this->request->getParam('first_name'),
        //                                 $this->request->getParam('last_name')
        //                             );
        //                             $this->redirecting('dashboard');
        //                         } else {echo 'oops!<hr>';}
        //                     } else {echo "combinaison mdp ($pass) fausse<hr>";}
        //                 } else {echo 'Veuillez rentrer un mot de passe<hr>';}
        //             } else {echo "L'email est déjà enregistré en base de donnée<hr>";}
        //         } else {echo "Email non conforme<hr>";}
        //     } else {"Vous n'avez pas remplis le champ e-mail<hr>";}
        // } else {echo "Vous n'avez pas remplis les champs nom et prénom.<hr>";}

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
                    $last_name
                );
                $this->sessionID();
                break;
        }
    }

    public function sessionID() 
    {
        $getUsers = $this->users->get($this->request->getParam('email'));
        echo 'connexion réussie';
        $_SESSION['id'] = $getUsers['id'];
        $_SESSION['first_name'] = $getUsers['first_name'];
        $_SESSION['last_name'] = $getUsers['last_name'];
        if ($this->session->is_connected()) {
            $this->redirecting('welcome');
        }
    }
}