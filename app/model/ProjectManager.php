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

    public function projectId($project_name) 
    {
       $req = $this->db->prepare('INSERT INTO user_project(id_user, id_project)
       VALUES(?, )
       WHERE project_name = ?') or die(print_r($this->db->errorInfo()));

       $id = $req->execute(array($project_name));

       return $id;
    }

}