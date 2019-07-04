<?php

namespace App\Model;

class ProjectManager extends Manager {

    public function __construct() 
    {
        $this->db = $this->dbConnect();
    }

    public function newProject($project, $color) 
    {
        $req = $this->db->prepare('INSERT INTO project(project_name, color_project)
        VALUES(?, ?)') or die (var_dump($this->db->errorInfo()));

        $project_name = $req->execute(array($project, $color));

        return $project_name;
    }

    // Add the id's project and the id's user in the table reference (user_project)
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
        $req = $this->db->prepare('SELECT p.id_project p_id, p.project_name p_name, p.color_project p_color, 
        i.id_user u_id, i.id_project id_project
        FROM project AS p
        INNER JOIN user_project AS i
        ON p.id_project = i.id_project AND i.id_user = ?') or die(var_dump($this->db->errorInfo()));

        $req->execute(array($id_user));
        $projects = $req->fetchAll();
        return $projects;
    }

    public function getProjectById($id) 
    {
        $req = $this->db->prepare('SELECT id_user, id_project FROM user_project WHERE id_project = ?')
        or die(var_dump($this->db->errorInfo()));
        $req->execute(array($id));
        $project_id = $req->fetch();

        return $project_id;
    }

    public function getOneProject($id)
    {
        $req = $this->db->prepare('SELECT id_project, project_name, color_project FROM project WHERE id_project = ?')
        or die(var_dump($this->db->errorInfo()));
        $req->execute(array($id));
        $project_id = $req->fetch();

        return $project_id;
    }

    public function getProjectByName($name) 
    {
        $req = $this->db->prepare('SELECT id_project, project_name FROM project WHERE project_name = ? ')
        or die(var_dump($this->db->errorInfo()));
        $req->execute(array($name));
        $project_name = $req->fetch();

        return $project_name;
    }

    // Delete project from table reference
    public function deleteProject($id_project, $id_user) 
    {
        $req = $this->db->prepare('DELETE FROM user_project WHERE id_project = ? AND id_user = ?') or die(var_dump($this->db->errorInfo()));
        $deleteProject = $req->execute(array($id_project, $id_user));

        return $deleteProject;
    }

    public function deleteProjectFrom($id_project)
    {
        $req = $this->db->prepare('DELETE FROM project WHERE id_project = ?') or die(var_dump($this->db->errorInfo()));
        $deleteProject = $req->execute(array($id_project));

        return $deleteProject;
    }

    public function updateProject($name, $id) 
    {
        $req = $this->db->prepare('UPDATE project SET project_name = ? WHERE id_project = ?')
        or die(var_dump($this->db->errorInfo()));

        $updateProject = $req->execute(array($name, $id));

        return $updateProjet;
    }

    public function nbProject($id_user)
    {
        $number = $this->db->prepare('SELECT COUNT(*) AS nb FROM user_project WHERE id_user = ?')
        or die(var_dump($this->db->errorInfo()));
        $number->execute(array($id_user));
        $nb = $number->fetch();
        return $nb;
    }
}