<?php

namespace Tomodachi\Controllers;
use Tomodachi\Controllers\Controller;
use Tomodachi\Models\ManagerTomodachi;

class ControllerTomodachi extends Controller {
    public function getMethod() {
        $manager = new ManagerTomodachi();
        $habitants = $manager->GetAll();
        require VIEWS . 'immeuble.php';
    }
}