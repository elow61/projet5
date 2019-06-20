<?php

namespace App\Model;

class ListsManager extends Manager {

    public function __construct() 
    {
        $this->db = $this->dbConnect();
    }

    public function addList($name_list, $id_project) 
    {
        $req = $this->db->prepare('INSERT INTO lists(name_list, id_project) VALUES(?, ?)') 
        or die(var_dump($this->db->errorInfo()));
        $list = $req->execute(array($name_list, $id_project));

        return $list;
    }
}