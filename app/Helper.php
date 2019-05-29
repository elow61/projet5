<?php

namespace App;

class Helper {

    public function is_connected() {
        if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }
} 