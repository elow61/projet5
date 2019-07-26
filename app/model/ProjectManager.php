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
    public function projectId($id_user, $main_user) 
    {
       $req = $this->db->prepare('INSERT INTO user_project(id_user, id_project, main_user)
       VALUES(?, (SELECT id_project FROM project WHERE id_project = 
       (SELECT MAX(id_project) FROM project)), ?)')
       or die(print_r($this->db->errorInfo()));

       $id = $req->execute(array($id_user, $main_user));

       return $id;
    }

    public function getProject($id_user) 
    {
        $req = $this->db->prepare('SELECT p.id_project p_id, p.project_name p_name, p.color_project p_color, 
        i.id_user u_id, i.id_project id_project, i.main_user main_user
        FROM project AS p
        INNER JOIN user_project AS i
        ON p.id_project = i.id_project AND i.id_user = ?') or die(var_dump($this->db->errorInfo()));

        $req->execute(array($id_user));
        $projects = $req->fetchAll();
        return $projects;
    }

    public function getImg($id_project)
    {
        $req = $this->db->prepare('SELECT p.id_user id_user, p.id_project id_project, p.main_user main, 
        u.id_user id, u.url_img img 
        FROM user_project AS p 
        INNER JOIN users AS u 
        ON p.id_user = u.id_user WHERE p.id_project = ?') or die(var_dump($this->db->errorInfo()));

        $req->execute(array($id_project));
        $projects = $req->fetchAll();
        return $projects;
    }

    public function ifProjectExist($id_user, $p_name) 
    {
        $req = $this->db->prepare('SELECT p.id_project p_id, p.project_name p_name, 
        i.id_user u_id, i.id_project id_project, i.main_user main_user
        FROM project AS p
        INNER JOIN user_project AS i
        ON p.id_project = i.id_project AND i.id_user = ? WHERE p.project_name = ?') or die(var_dump($this->db->errorInfo()));

        $req->execute(array($id_user, $p_name));
        $projects = $req->fetch();
        return $projects;
    }

    public function getProjectById($id_project, $id_user) 
    {
        $req = $this->db->prepare('SELECT * FROM user_project WHERE id_project = ? AND id_user = ?')
        or die(var_dump($this->db->errorInfo()));
        $req->execute(array($id_project, $id_user));
        $project = $req->fetch();
        return $project;
    }

    public function getOneProject($id)
    {
        $req = $this->db->prepare('SELECT id_project, project_name, color_project FROM project WHERE id_project = ?')
        or die(var_dump($this->db->errorInfo()));
        $req->execute(array($id));
        $project_id = $req->fetch();

        return $project_id;
    }

    // Delete project from table reference
    public function deleteProject($id_project, $id_user) 
    {
        $req = $this->db->prepare('DELETE FROM user_project WHERE id_project = ? AND main_user = ?') or die(var_dump($this->db->errorInfo()));
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

        return $updateProject;
    }

    public function nbProject($id_user)
    {
        $number = $this->db->prepare('SELECT COUNT(*) AS nb FROM user_project WHERE id_user = ?')
        or die(var_dump($this->db->errorInfo()));
        $number->execute(array($id_user));
        $nb = $number->fetch();
        return $nb;
    }

    public function giveProject($id_user, $id_project, $main_user)
    {
        $req = $this->db->prepare('INSERT INTO user_project(id_user, id_project, main_user) VALUES(?, ?, ?)')
        or die(var_dump($this->db->errorInfo()));

        $giveProject = $req->execute(array($id_user, $id_project, $main_user));

        return $giveProject;
    }
}