<?php

namespace App\Controller;


class MentionController extends Controller {

    public function index()
    {
        $title = 'Mentions Légales | Success Mission';
        require VIEW_FRONT.'mention.php';

    }
}