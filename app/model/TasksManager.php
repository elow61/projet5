<?php

namespace App\Model;

class TasksManager extends Manager {

    public function __construct() 
    {
        $this->db = $this->dbConnect();
    }

    public function addTasks($name, $user, $project, $list) 
    {
        $req = $this->db->prepare('INSERT INTO task(name_task, users_id, project_id, id_lists)
        VALUES(?, ?, ?, ?)') or die(print_r($this->db->errorInfo()));
        $task = $req->execute(array($name, $user, $project, $list));

        return $task;
    }
}