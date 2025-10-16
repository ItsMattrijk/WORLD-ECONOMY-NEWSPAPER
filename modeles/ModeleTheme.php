<?php
class ModeleTheme {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer tous les thèmes
    public function getTousLesThemes() {
        $stmt = $this->pdo->query("SELECT * FROM themes ORDER BY nom");
        return $stmt->fetchAll();
    }

    // Ajouter un thème
    public function ajouterTheme($nom) {
        $stmt = $this->pdo->prepare("INSERT INTO themes (nom) VALUES (?)");
        return $stmt->execute([$nom]);
    }
}
?>