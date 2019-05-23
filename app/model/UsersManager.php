<?php

namespace App\Model;

class UsersManager extends Manager {

    

    public function __construct() {
        $this->db = $this->dbConnect();
    }

    // Save a new user
    public function newUser($email, $pass, $pseudo) {
        $req = $this->db->prepare('INSERT INTO users(email, pass, date_open_account, pseudo)
        VALUES(?, ?, NOW(), ?') or die (var_dump($this->db->errorInfo()));

        $users = $req->execute(array($email, $pass, $pseudo));

        return $users;
    }
    // Get a user
    public function get($email) {
        $req = $this->db->prepare('SELECT id, email, pass, pseudo FROM users WHERE email = ?')
        or die(var_dump($this->db->errorInfo()));

        $users = $req->execute(array($email));

        return $users;
    }
}