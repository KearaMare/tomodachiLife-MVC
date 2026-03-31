<?php

namespace Tomodachi\Controllers;

use Tomodachi\Controllers\Controller;
use Tomodachi\Models\ManagerTomodachi;
use Tomodachi\Validator;

class ControllerTomodachi extends Controller {

    private $manager;
    private $validator; 

    public function __construct() {
        $this->manager = new ManagerTomodachi();
        $this->validator = new Validator();
    }

    // Affiche la liste des habitants
    public function getMethod() {
        $habitants = $this->manager->getAll();
        require VIEWS . 'immeuble.php';
    }

    // Affiche les détails d'un habitant
    public function getHabitant($id) {
        $habitant = $this->manager->getHabitant($id);
        require VIEWS . 'details.php';
    }

    // --- CRÉATION ---

    // Affiche le formulaire de création vide
    public function create() {
    // On définit le chemin complet vers le fichier
    $cheminVue = VIEWS . 'create.php';

    if (file_exists($cheminVue)) {
        require $cheminVue;
    } else {
        // Ce message s'affichera SI le fichier est introuvable
        echo "Erreur : Le fichier est introuvable ici : " . $cheminVue;
    }
}

    // Enregistre le nouvel habitant (POST)
    public function store() {
        if (empty($_POST)) {
            header("Location: /");
            exit();
        }

        // Validation du nom (minimum requis)
        $this->validator->validate([
            "nom" => ["required", "min:2", "alphaNumDash"]
        ]);

        $_SESSION['old'] = $_POST;

        if ($this->validator->errors()) {
            header("Location: /nouveau"); // On retourne au formulaire si erreur
            exit();
        }

        // Préparation de toutes les données pour le Manager
        $data = [
            'nom'           => $_POST['nom'],
            'num_appart'    => $_POST['num_appart'],
            'niveau_faim'   => $_POST['niveau_faim'],
            'argent_genere' => $_POST['argent_genere'],
            'humeur'        => $_POST['humeur'],
            'image_url'     => $_POST['image_url']
        ];

        // On appelle la fonction store du Manager
        $this->manager->storeHabitant($data);

        unset($_SESSION['old']); // On vide la session si succès
        header("Location: /");
        exit();
    }

    // --- MODIFICATION ---

    // Affiche le formulaire de modification avec les données actuelles
    public function edit($id) {
        $habitant = $this->manager->getHabitant($id);
        
        // Assure-toi que ton fichier s'appelle bien update.php ou edit.php
        require VIEWS . 'update.php'; 
    }

    // Enregistre les modifications (POST)
    public function update($id) {
        if (empty($_POST)) {
            header("Location: /");
            exit();
        }

        $data = [
            'nom'           => $_POST['nom'],
            'num_appart'    => $_POST['num_appart'],
            'niveau_faim'   => $_POST['niveau_faim'],
            'argent_genere' => $_POST['argent_genere'],
            'humeur'        => $_POST['humeur'],
            'image_url'     => $_POST['image_url']
        ];

        $this->manager->updateFullHabitant($id, $data);

        header("Location: /habitant/" . $id);
        exit();
    }

    public function delete() {
    $id = $_POST['id'];

    if (!empty($id)) {
        $this->manager->delete($id);
        $_SESSION['flash'] = "Habitant supprimé avec succès.";
    }

    // REMPLACE /habitants PAR /
    header("Location: /"); 
    exit();
}
}