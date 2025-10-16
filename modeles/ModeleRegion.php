<?php
class ModeleRegion {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer toutes les régions
    public function getToutesLesRegions() {
        $stmt = $this->pdo->query("SELECT * FROM regions ORDER BY nom");
        return $stmt->fetchAll();
    }

    // Récupérer une région par ID
    public function getRegionParId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM regions WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Ajouter une région
    public function ajouterRegion($nom) {
        $stmt = $this->pdo->prepare("INSERT INTO regions (nom) VALUES (?)");
        return $stmt->execute([$nom]);
    }
}
?>