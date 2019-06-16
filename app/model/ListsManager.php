<?php

namespace App\Model;

class ListsManager extends Manager {

    public function __construct() 
    {
        $this->db = $this->dbConnect();
    }

    public function addList() 
    {
        
    }
}