<?php
require_once 'config.php';
require_once 'controleurs/ControleurArticle.php';
require_once 'controleurs/ControleurUtilisateur.php';

$controleurArticle = new ControleurArticle($pdo);
$controleurUtilisateur = new ControleurUtilisateur($pdo);

$action = $_GET['action'] ?? 'liste';

switch ($action) {
    case 'liste':
        $controleurArticle->afficherListe();
        break;

    case 'article':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controleurArticle->afficherArticle($id);
        } else {
            $controleurArticle->afficherListe();
        }
        break;

    case 'admin':
        if (isset($_SESSION['utilisateur']) && ($_SESSION['utilisateur']['role'] === 'admin' || $_SESSION['utilisateur']['role'] === 'auteur')) {
            $controleurArticle->afficherFormulaireAjout();
        } else {
            header('Location: index.php?action=login');
        }
        break;

    case 'ajouter':
        if (isset($_SESSION['utilisateur']) && ($_SESSION['utilisateur']['role'] === 'admin' || $_SESSION['utilisateur']['role'] === 'auteur')) {
            $controleurArticle->ajouterArticle();
        } else {
            header('Location: index.php?action=login');
        }
        break;

    case 'modifier':
        $id = $_GET['id'] ?? null;
        if ($id && isset($_SESSION['utilisateur']) && ($_SESSION['utilisateur']['role'] === 'admin' || $_SESSION['utilisateur']['role'] === 'auteur')) {
            $controleurArticle->afficherFormulaireModification($id);
        } else {
            header('Location: index.php?action=login');
        }
        break;

    case 'update':
        $id = $_POST['id'] ?? null;
        if ($id && isset($_SESSION['utilisateur']) && ($_SESSION['utilisateur']['role'] === 'admin' || $_SESSION['utilisateur']['role'] === 'auteur')) {
            $controleurArticle->modifierArticle($id);
        } else {
            header('Location: index.php?action=login');
        }
        break;

    case 'supprimer':
        $id = $_GET['id'] ?? null;
        if ($id && isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['role'] === 'admin') {
            $controleurArticle->supprimerArticle($id);
        } else {
            header('Location: index.php');
        }
        break;

    case 'login':
        $controleurUtilisateur->afficherFormulaire();
        break;

    case 'connexion':
        $controleurUtilisateur->connexion();
        break;

    case 'deconnexion':
        $controleurUtilisateur->deconnexion();
        break;

    case 'tableau_admin':
        if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['role'] === 'admin') {
            $controleurUtilisateur->afficherTableauAdmin();
        } else {
            header('Location: index.php?action=login');
        }
        break;

    case 'get_pays':
        $id_region = $_GET['id_region'] ?? null;
        if ($id_region) {
            $controleurArticle->getPaysParRegion($id_region);
        }
        break;

    default:
        $controleurArticle->afficherListe();
        break;
}
?>