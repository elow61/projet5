<?php

namespace App\Model;

class ProjectManager extends Manager {

    public function __construct() 
    {
        $this->db = $this->dbConnect();
    }

    public function newProject($project) 
    {
        $req = $this->db->prepare('INSERT INTO project(project_name)
        VALUES(?)') or die (var_dump($this->db->errorInfo()));

        $project_name = $req->execute(array($project));

        return $project_name;
    }

    public function projectId($id_user) 
    {
        $req = $this->db->prepare('INSERT INTO user_project(id_project)
        SELECT id_project FROM project,
        SELECT id_user FROM users WHERE id_user = ?');

        $project_id = $req->execute(array($id_user));

        return $project_id;
    }

}