<?php

namespace Tomodachi\Models;

use Tomodachi\Models\Manager;

class ManagerTomodachi extends Manager {
    protected $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Récupère tous les habitants
     */
    public function getAll(){
        $stmt = $this->bdd->prepare('SELECT * FROM habitants');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, 'Tomodachi\Models\Manager');
    }

    /**
     * Récupère un habitant par son ID
     */
    public function getHabitant($id){
        $stmt = $this->bdd->prepare('SELECT * FROM habitants WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetchObject('Tomodachi\Models\Manager');
    }

    /**
     * Cherche un habitant par son nom (utile pour éviter les doublons)
     */
    public function findByName($nom) {
        $stmt = $this->bdd->prepare('SELECT * FROM habitants WHERE nom = ?');
        $stmt->execute([$nom]);
        return $stmt->fetch();
    }

    /**
     * ACTION : Créer un habitant (INSERT)
     */
    public function storeHabitant($data) {
        $sql = "INSERT INTO habitants (nom, num_appart, niveau_faim, argent_genere, humeur, image_url) 
                VALUES (?, ?, ?, ?, ?, ?)";
        
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([
            $data['nom'],
            $data['num_appart'],
            $data['niveau_faim'],
            $data['argent_genere'],
            $data['humeur'],
            $data['image_url']
        ]);
    }

    /**
     * ACTION : Mettre à jour un habitant (UPDATE)
     */
    public function updateFullHabitant($id, $data) {
        $sql = "UPDATE habitants SET 
                    nom = ?, 
                    num_appart = ?, 
                    niveau_faim = ?, 
                    argent_genere = ?, 
                    humeur = ?, 
                    image_url = ? 
                WHERE id = ?";
                
        $stmt = $this->bdd->prepare($sql);
        $stmt->execute([
            $data['nom'],
            $data['num_appart'],
            $data['niveau_faim'],
            $data['argent_genere'],
            $data['humeur'],
            $data['image_url'],
            $id
        ]);
    }

    /**
     * ACTION : Supprimer un habitant (DELETE)
     * Très utile pour l'examen !
     */
    public function delete($id) {
        $stmt = $this->bdd->prepare("DELETE FROM habitants WHERE id = ?");
        $stmt->execute([$id]);
    }
    
}