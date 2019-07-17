<?php

namespace App\Controller;

class ProfilController extends Controller {

    public function index()
    {
        if ($this->session->is_connected()) 
        {
            $profil = $this->users->get($_SESSION['email']);
            $nb_project = $this->project->nbProject($_SESSION['id']);
            require VIEW_BACK . '/profil.php';

        } 
        else 
        {
            throw new \Exception('Vous n\'êtes pas connecté.');
        }
    }

    public function updateName()
    {
        $profil = $this->users->get($_SESSION['email']);
        if ($this->request->paramExist('new-first-name') && $this->request->paramExist('new-last-name')) 
        {
            if ($profil['pass'] == null)
            {
                throw new \Exception('Vous ne pouvez pas modifier votre nom et prénom puisqu\'il s\'agit de votre compte Google');
            }
            else
            {
                $newFirstName = $this->request->getParam('new-first-name');
                $newLastName = $this->request->getParam('new-last-name');
                $updateName = $this->users->updateName(
                    $newFirstName,
                    htmlspecialchars($newLastName),
                    $_SESSION['email']
                );
                $_SESSION['first_name'] = $newFirstName;
                $_SESSION['last_name'] = $newLastName;
                $this->redirecting('profil');
            }
        }
        else
        {
            throw new \Exception('Veuillez remplir tous les champs.');
        }
    }

    public function updatePass()
    {
        if ($this->session->is_connected())
        {
            if ($this->request->paramExist('old-pass') && $this->request->paramExist('new-pass') && $this->request->paramExist('new-pass-confirm'))
            {
                $oldPass = $this->request->getParam('old-pass');
                $newPass = $this->request->getParam('new-pass');
                $newPassConfirm = $this->request->getParam('new-pass-confirm');
                if ($oldPass == $profil['pass'])
                {
                    if (preg_match('#^(?=.*[a-z])(?=.*[0-9]).{6,}$#', $newPass))
                    {
                        if ($newPass == $newPassConfirm)
                        {
                            $updatePass = $this->users->updatePass(
                                password_hash($newPass, PASSWORD_BCRYPT),
                                $_SESSION['email']
                            );
                            $this->redirecting('profil');
                        }
                        else
                        {
                            throw new \Exception('Les mots de passe ne correspondent pas.');
                        }
                    }
                    else
                    {
                        throw new \Exception('Votre mot de passe doit être composé de 6 caractères minimum.');
                    }
                }
                else
                {
                    throw new \Exception('Votre ancien mot de passe est incorrect.');
                }
            }
            else
            {
                throw new \Exception('Vous n\'avez pas remplis tous les champs.');
            }
        }
    }

    public function updateImg()
    {
        if ($this->session->is_connected())
        {
            if (!empty($_FILES))
            {
                print_r($_FILES);
                $uploads_dir = 'public/images/avatars';
                $avatar = $_FILES['avatar'];
                $name = $avatar['name'];
                move_uploaded_file($avatar['tmp_name'], "$uploads_dir/$name");
                $updateAvatar = $this->users->updateImg(IMAGES . "avatars/$name", $_SESSION['email']);
                $this->redirecting('profil');
            }

        }
    }
}