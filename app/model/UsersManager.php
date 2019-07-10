<?php

namespace App\Model;

class UsersManager extends Manager {

    
    public function __construct() 
    {
        $this->db = $this->dbConnect();
    }

    // Save a new user
    public function newUser($email, $pass, $first_name, $last_name) 
    {
        $req = $this->db->prepare('INSERT INTO users(email, pass, first_name, last_name, date_open_account)
        VALUES(?, ?, ?, ?, NOW())') or die (var_dump($this->db->errorInfo()));

        $users = $req->execute(array($email, $pass, $first_name, $last_name));

        return $users;
    }
    // Get a user with his email 
    public function get($email) 
    {
        $req = $this->db->prepare('SELECT id_user, email, pass, first_name, last_name,
        DATE_FORMAT(date_open_account, "%d/%m/%Y à %Hh%imin%ss") AS date_create
         FROM users WHERE email = ?') or die(var_dump($this->db->errorInfo()));

        $req->execute(array($email));
        $users = $req->fetch();

        return $users;
    }

    public function updateName($first_name, $last_name, $email)
    {
        $req = $this->db->prepare('UPDATE users SET first_name = ?, last_name = ? WHERE email = ?')
        or die(var_dump($this->db->errorInfo()));

        $updateName = $req->execute(array($first_name, $last_name, $email));

        return $updateName;
    }

    public function updatePass($pass, $email)
    {
        $req = $this->db->prepare('UPDATE users SET pass = ? where email = ?')
        or die(var_dump($this->db->errorInfo()));

        $updatePass = $req->execute(array($pass, $email));

        return $updatePass;
    }
}