<?php

namespace App\Controller;

use App\Helper;
use App\Model\UsersManager;
use App\Model\ProjectManager;

class Workspace extends Controller {


    public function __construct()
    {
        $this->session = new Helper();
    }

    public function index()
    {
        if ($this->session->is_connected())
        {
            if ($this->request->paramExist('id'))
            {
                require VIEW_BACK . '/workspace/' . $project['p_name'] . '.php';
            }
        }
    }
}