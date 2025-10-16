<?php
require_once 'modeles/ModeleArticle.php';
require_once 'modeles/ModeleTheme.php';
require_once 'modeles/ModelePays.php';
require_once 'modeles/ModeleRegion.php';

class ControleurArticle {
    private $modeleArticle;
    private $modeleTheme;
    private $modelePays;
    private $modeleRegion;

    public function __construct($pdo) {
        $this->modeleArticle = new ModeleArticle($pdo);
        $this->modeleTheme = new ModeleTheme($pdo);
        $this->modelePays = new ModelePays($pdo);
        $this->modeleRegion = new ModeleRegion($pdo);
    }

    // Afficher la liste des articles
    public function afficherListe() {
        $articles = $this->modeleArticle->getTousLesArticles();
        require 'vues/liste.php';
    }

    // Afficher un article
    public function afficherArticle($id) {
        $article = $this->modeleArticle->getArticleParId($id);
        require 'vues/article.php';
    }

    // Afficher le formulaire d'ajout
    public function afficherFormulaireAjout() {
        $themes = $this->modeleTheme->getTousLesThemes();
        $regions = $this->modeleRegion->getToutesLesRegions();
        require 'vues/admin.php';
    }

    // Afficher le formulaire de modification
    public function afficherFormulaireModification($id) {
        $article = $this->modeleArticle->getArticleParId($id);
        $themes = $this->modeleTheme->getTousLesThemes();
        $regions = $this->modeleRegion->getToutesLesRegions();
        // Récupérer les pays de la région de l'article
        $pays = [];
        if ($article['id_region']) {
            $pays = $this->modelePays->getPaysParRegion($article['id_region']);
        }
        require 'vues/admin_modifier.php';
    }

    // Ajouter un article
    public function ajouterArticle() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'] ?? '';
            $apercu = $_POST['apercu'] ?? '';
            $contenu = $_POST['contenu'] ?? '';
            $id_theme = $_POST['id_theme'] ?? null;
            $id_pays = $_POST['id_pays'] ?? null;
            $id_region = $_POST['id_region'] ?? null;
            $id_auteur = $_SESSION['utilisateur']['id'] ?? null;

            // Gestion de l'upload d'image
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $nomFichier = uniqid() . '.' . $extension;
                $destination = 'public/upload/' . $nomFichier;
                
                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $image = $nomFichier;
                }
            }

            $this->modeleArticle->ajouterArticle($titre, $apercu, $contenu, $image, $id_theme, $id_pays, $id_region, $id_auteur);
            header('Location: index.php');
            exit;
        }
    }

    // Modifier un article
    public function modifierArticle($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $titre = $_POST['titre'] ?? '';
            $apercu = $_POST['apercu'] ?? '';
            $contenu = $_POST['contenu'] ?? '';
            $id_theme = $_POST['id_theme'] ?? null;
            $id_pays = $_POST['id_pays'] ?? null;
            $id_region = $_POST['id_region'] ?? null;

            // Gestion de l'upload d'image
            $image = null;
            if (isset($_FILES['image']) && $_FILES['image']['error'] === 0) {
                $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                $nomFichier = uniqid() . '.' . $extension;
                $destination = 'public/upload/' . $nomFichier;
                
                if (move_uploaded_file($_FILES['image']['tmp_name'], $destination)) {
                    $image = $nomFichier;
                }
            }

            $this->modeleArticle->modifierArticle($id, $titre, $apercu, $contenu, $image, $id_theme, $id_pays, $id_region);
            header('Location: index.php?action=article&id=' . $id);
            exit;
        }
    }

    // Supprimer un article
    public function supprimerArticle($id) {
        $this->modeleArticle->supprimerArticle($id);
        header('Location: index.php');
        exit;
    }

    // Récupérer les pays d'une région (AJAX)
    public function getPaysParRegion($id_region) {
        $pays = $this->modelePays->getPaysParRegion($id_region);
        echo json_encode($pays);
    }
}
?>