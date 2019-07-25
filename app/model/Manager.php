<?php

namespace App\Model;

class Manager {
    
    private $db;

    protected function dbConnect() 
    {
        $this->db = new \PDO("mysql:host=localhost;dbname=success_mission;charset=utf8", 'root', 'root',
        array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));

        return $this->db;
    }

}

// $this->db = new \PDO("mysql:host=db5000130959.hosting-data.io;dbname=dbs125746;charset=utf8", 'dbu263092', 'Edenelo_61',
//         array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));