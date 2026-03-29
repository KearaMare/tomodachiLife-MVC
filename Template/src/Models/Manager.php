<?php

namespace Tomodachi\Models;

class Manager {
    private $id;
    private $nom;
    private $num_appart;
    private $niveau_faim;
    private $argent_genere;
    private $humeur;
    private $image_url;

    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getNumAppart() {
        return $this->num_appart;
    }

    public function getNiveauFaim() {
        return $this->niveau_faim;
    }

    public function getArgentGen() {
        return $this->argent_genere;
    }

    public function getHumeur() {
        return $this->humeur;
    }

    public function getImageUrl() {
        return $this->image_url;
    }
}