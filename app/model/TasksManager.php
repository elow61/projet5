<?php

namespace App\Model;

class TasksManager extends Manager {

    public function __construct() 
    {
        $this->db = $this->dbConnect();
    }

    public function addTasks($name, $user, $project, $list) 
    {
        $req = $this->db->prepare('INSERT INTO task(name_task, users_id, project_id, list_id)
        VALUES(?, ?, ?, ?)') or die(print_r($this->db->errorInfo()));
        $task = $req->execute(array($name, $user, $project, $list));

        return $task;
    }

    public function getTasks($project_id)
    {
        $req = $this->db->prepare('SELECT * from task WHERE project_id = ?')
        or die(var_dump($this->db->errorInfo()));

        $req->execute(array($project_id));
        $tasks = $req->fetchAll();
        return $tasks;
    }

    public function getNameTask($id, $name)
    {
        $req = $this->db->prepare('SELECT * FROM task WHERE id_project = ? AND name_task = ?')
        or die(var_dump($this->db->errorInfo()));
        $req->execute(array($id, $name));
        $list = $req->fetch();
        return $list;
    }
}