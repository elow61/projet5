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

    public function getLists($id)
    {
        $req = $this->db->prepare('SELECT id_list, name_list, id_project FROM lists WHERE id_project = ?')
        or die(var_dump($this->db->errorInfo()));
        $req->execute(array($id));
        $lists = $req->fetchAll();
        return $lists;
    }

    public function getNameList($id, $name)
    {
        $req = $this->db->prepare('SELECT * FROM lists WHERE id_project = ? AND name_list = ?')
        or die(var_dump($this->db->errorInfo()));
        $req->execute(array($id, $name));
        $list = $req->fetch();
        return $list;
    }

    public function removeList($id)
    {
        $req = $this->db->prepare('DELETE FROM lists WHERE id_list = ?')
        or die(var_dump($this->db->errorInfo()));
        $removeList = $req->execute(array($id));

        return $removeList;
    }
}