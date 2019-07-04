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
}