<?php

namespace App\View;

use App\Controller\Controller;

class View {

    private $file;
    private $title;

    public function __construct($action, $controller = null) {
        $file = "view/";
        if ($controller != null) {
            $file = $file . $action . $controller . '/';
        }
        $this->file = $action . ".php";
    }

    public function generate($datas) {
        $content = $this->getFile($this->file, $datas);
        $view = $this->getFile(VIEW_FRONT . 'template.php', array(
            'title' => $this->title, 
            'content' => $content
        ));
        echo $view;
    }

    private function getFile($file, $datas) {
        if (file_exists($file)) {
            extract($datas);
            ob_start();
            require $file;
            return ob_get_clean();
        } else {
            throw new Exception('Fichier ' . $file . ' introuvable.');
        }
    }
}