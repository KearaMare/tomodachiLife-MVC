<?php

namespace Tomodachi\Models;

use Tomodachi\Models\Manager;

class ManagerTomodachi extends Manager {
    protected $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getAll(){
        $stmt = $this->bdd->prepare('SELECT * FROM habitants');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Tomodachi\Models\Manager');
    }
    
}