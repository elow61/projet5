<?php

namespace App\Model;

class UsersManager extends Manager {

    
    public function __construct() {
        $this->db = $this->dbConnect();
    }

    // Save a new user
    public function newUser($email, $pass) {
        $req = $this->db->prepare('INSERT INTO users(email, pass, date_open_account)
        VALUES(?, ?, NOW()') or die (var_dump($this->db->errorInfo()));

        $users = $req->execute(array($email, $pass));

        return $users;
    }
    // Get a user
    public function get($email) {
        $req = $this->db->prepare('SELECT id, email, pass, first_name, last_name,
        DATE_FORMAT(date_open_account, "%d/%m/%Y à %Hh%imin%ss") AS date_create
         FROM users WHERE email = ?') or die(var_dump($this->db->errorInfo()));

        $req->execute(array($email));
        $users = $req->fetch();

        return $users;
    }
}