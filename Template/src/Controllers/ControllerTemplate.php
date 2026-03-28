<?php

namespace Tomodachi\Controllers;
use Tomodachi\Controllers\Controller;

class ControllerTomodachi extends Controller {
    public function getMethod() {
        echo "Get Method on the URL: /!";
    }

    public function postMethod() {
        echo "Post Method on the URL: /!";
    }
}