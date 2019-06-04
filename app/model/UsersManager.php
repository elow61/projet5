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

    // Get a user with his ID
    public function getId($id) 
    {
        $req = $this->db->prepare('SELECT id_user, email, pass, first_name, last_name
        FROM users WHERE id = ?') or die(var_dump($this->db->errorInfo()));

        $req->execute(array($id));
        $users = $req->fetch();
    }

    // Add id's user to the table user_project
    public function addId($id_user) 
    {
        $req = $this->db->prepare('INSERT INTO user_project(id_user)
        VALUES(?)') or die(print_r($this->db->errorInfo()));

        $userId = $req->execute(array($id_user));

        return $userId;
    }
}