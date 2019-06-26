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

    // Add the id's task and list in the reference table (list_task)
    public function addTasksWithList($id_list, $id_task)
    {
        $req = $this->db->prepare('INSERT INTO list_task(id_list, id_task)
        VALUES((SELECT id_list FROM lists WHERE list_name = ?), ?)') or die(print_r($this->db->errorInfo()));

        $ids = $req->execute(array($id_list, $id_task));

        return $ids;
    }

    public function getTasks($id_list)
    {
        $req = $this->db->prepare('SELECT * from task WHERE list_id = ?')
        or die(var_dump($this->db->errorInfo()));

        $req->execute(array($id_list));
        $tasks = $req->fetchAll();
        return $tasks;
    }
}