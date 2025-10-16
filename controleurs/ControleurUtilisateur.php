<?php
require_once 'modeles/ModeleUtilisateur.php';

class ControleurUtilisateur {
    private $modeleUtilisateur;

    public function __construct($pdo) {
        $this->modeleUtilisateur = new ModeleUtilisateur($pdo);
    }

    // Afficher le formulaire de connexion
    public function afficherFormulaire() {
        require 'vues/login.php';
    }

    // Connexion
    public function connexion() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $mot_de_passe = $_POST['mot_de_passe'] ?? '';

            $utilisateur = $this->modeleUtilisateur->verifierIdentifiants($email, $mot_de_passe);
            
            if ($utilisateur) {
                $_SESSION['utilisateur'] = [
                    'id' => $utilisateur['id'],
                    'nom' => $utilisateur['nom'],
                    'email' => $utilisateur['email'],
                    'role' => $utilisateur['role']
                ];
                header('Location: index.php');
                exit;
            } else {
                $_SESSION['erreur'] = "Identifiants incorrects";
                header('Location: index.php?action=login');
                exit;
            }
        }
    }

    // Déconnexion
    public function deconnexion() {
        session_destroy();
        header('Location: index.php');
        exit;
    }

    // Afficher le tableau admin
    public function afficherTableauAdmin() {
        $utilisateurs = $this->modeleUtilisateur->getTousLesUtilisateurs();
        require_once 'modeles/ModeleArticle.php';
        $modeleArticle = new ModeleArticle($GLOBALS['pdo']);
        $articles = $modeleArticle->getTousLesArticles();
        require 'vues/tableau_admin.php';
    }
}
?>