<?php
class ModelePays {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer tous les pays
    public function getTousLesPays() {
        $stmt = $this->pdo->query("SELECT p.*, r.nom as region_nom FROM pays p LEFT JOIN regions r ON p.id_region = r.id ORDER BY p.nom");
        return $stmt->fetchAll();
    }

    // Récupérer les pays d'une région
    public function getPaysParRegion($id_region) {
        $stmt = $this->pdo->prepare("SELECT * FROM pays WHERE id_region = ? ORDER BY nom");
        $stmt->execute([$id_region]);
        return $stmt->fetchAll();
    }

    // Ajouter un pays
    public function ajouterPays($nom, $id_region) {
        $stmt = $this->pdo->prepare("INSERT INTO pays (nom, id_region) VALUES (?, ?)");
        return $stmt->execute([$nom, $id_region]);
    }
}
?>