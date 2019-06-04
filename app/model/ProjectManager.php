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

    public function projectId($id_user, $project_name) 
    {
       $req = $this->db->prepare('INSERT INTO user_project(id_user, id_project)
       VALUES(?, (SELECT id_project FROM project WHERE project_name = ?))')
       or die(print_r($this->db->errorInfo()));

       $id = $req->execute(array($id_user, $project_name));

       return $id;
    }

    public function getProject($id_user) 
    {
        $req = $this->db->prepare('SELECT p.id_project p_id, p.project_name p_name, 
        i.id_user u_id, i.id_project id_project
        FROM project AS p
        INNER JOIN user_project AS i
        ON p.id_project = i.id_project AND i.id_user = ?') or die(var_dump($this->db->errorInfo()));

        $req->execute(array($id_user));
        $projects = $req->fetchAll();
        return $projects;
    }

}