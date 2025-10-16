<?php
class ModeleUtilisateur {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer un utilisateur par email
    public function getUtilisateurParEmail($email) {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    // Récupérer tous les utilisateurs
    public function getTousLesUtilisateurs() {
        $stmt = $this->pdo->query("SELECT id, nom, email, role, date_creation FROM utilisateurs ORDER BY date_creation DESC");
        return $stmt->fetchAll();
    }

    // Ajouter un utilisateur
    public function ajouterUtilisateur($nom, $email, $mot_de_passe, $role = 'lecteur') {
        $hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("
            INSERT INTO utilisateurs (nom, email, mot_de_passe, role)
            VALUES (?, ?, ?, ?)
        ");
        return $stmt->execute([$nom, $email, $hash, $role]);
    }

    // Modifier le rôle d'un utilisateur
    public function modifierRole($id, $role) {
        $stmt = $this->pdo->prepare("UPDATE utilisateurs SET role = ? WHERE id = ?");
        return $stmt->execute([$role, $id]);
    }

    // Supprimer un utilisateur
    public function supprimerUtilisateur($id) {
        $stmt = $this->pdo->prepare("DELETE FROM utilisateurs WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // Vérifier les identifiants
    public function verifierIdentifiants($email, $mot_de_passe) {
        $utilisateur = $this->getUtilisateurParEmail($email);
        if ($utilisateur) {
            // Vérification avec SHA256 (comme dans la BDD)
            $hash_mot_de_passe = hash('sha256', $mot_de_passe);
            if ($hash_mot_de_passe === $utilisateur['mot_de_passe']) {
                return $utilisateur;
            }
        }
        return false;
    }
}
?>