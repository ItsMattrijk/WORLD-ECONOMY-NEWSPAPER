<?php
class ModeleArticle {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer tous les articles
    public function getTousLesArticles() {
        $stmt = $this->pdo->query("
            SELECT a.*, u.nom AS auteur, t.nom AS theme, p.nom AS pays, r.nom AS region
            FROM articles a
            LEFT JOIN utilisateurs u ON a.id_auteur = u.id
            LEFT JOIN themes t ON a.id_theme = t.id
            LEFT JOIN pays p ON a.id_pays = p.id
            LEFT JOIN regions r ON a.id_region = r.id
            ORDER BY a.date_publication DESC
        ");
        return $stmt->fetchAll();
    }

    // Récupérer les articles avec filtres
    public function getArticlesAvecFiltres($id_theme = null, $id_region = null, $id_pays = null) {
        $sql = "
            SELECT a.*, u.nom AS auteur, t.nom AS theme, p.nom AS pays, r.nom AS region
            FROM articles a
            LEFT JOIN utilisateurs u ON a.id_auteur = u.id
            LEFT JOIN themes t ON a.id_theme = t.id
            LEFT JOIN pays p ON a.id_pays = p.id
            LEFT JOIN regions r ON a.id_region = r.id
            WHERE 1=1
        ";
        
        $params = [];
        
        if ($id_theme) {
            $sql .= " AND a.id_theme = ?";
            $params[] = $id_theme;
        }
        
        if ($id_region) {
            $sql .= " AND a.id_region = ?";
            $params[] = $id_region;
        }
        
        if ($id_pays) {
            $sql .= " AND a.id_pays = ?";
            $params[] = $id_pays;
        }
        
        $sql .= " ORDER BY a.date_publication DESC";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt->fetchAll();
    }

    // Compter les articles par thème
    public function compterArticlesParTheme($id_theme) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM articles WHERE id_theme = ?");
        $stmt->execute([$id_theme]);
        return $stmt->fetch()['total'];
    }

    // Compter les articles par région
    public function compterArticlesParRegion($id_region) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM articles WHERE id_region = ?");
        $stmt->execute([$id_region]);
        return $stmt->fetch()['total'];
    }

    // Compter les articles par pays
    public function compterArticlesParPays($id_pays) {
        $stmt = $this->pdo->prepare("SELECT COUNT(*) as total FROM articles WHERE id_pays = ?");
        $stmt->execute([$id_pays]);
        return $stmt->fetch()['total'];
    }

    // Récupérer un article par ID
    public function getArticleParId($id) {
        $stmt = $this->pdo->prepare("
            SELECT a.*, u.nom AS auteur, t.nom AS theme, p.nom AS pays, r.nom AS region
            FROM articles a
            LEFT JOIN utilisateurs u ON a.id_auteur = u.id
            LEFT JOIN themes t ON a.id_theme = t.id
            LEFT JOIN pays p ON a.id_pays = p.id
            LEFT JOIN regions r ON a.id_region = r.id
            WHERE a.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    // Ajouter un article
    public function ajouterArticle($titre, $apercu, $contenu, $image, $id_theme, $id_pays, $id_region, $id_auteur) {
        $stmt = $this->pdo->prepare("
            INSERT INTO articles (titre, apercu, contenu, image, id_theme, id_pays, id_region, id_auteur)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$titre, $apercu, $contenu, $image, $id_theme, $id_pays, $id_region, $id_auteur]);
    }

    // Modifier un article
    public function modifierArticle($id, $titre, $apercu, $contenu, $image, $id_theme, $id_pays, $id_region) {
        if ($image) {
            $stmt = $this->pdo->prepare("
                UPDATE articles 
                SET titre = ?, apercu = ?, contenu = ?, image = ?, id_theme = ?, id_pays = ?, id_region = ?
                WHERE id = ?
            ");
            return $stmt->execute([$titre, $apercu, $contenu, $image, $id_theme, $id_pays, $id_region, $id]);
        } else {
            $stmt = $this->pdo->prepare("
                UPDATE articles 
                SET titre = ?, apercu = ?, contenu = ?, id_theme = ?, id_pays = ?, id_region = ?
                WHERE id = ?
            ");
            return $stmt->execute([$titre, $apercu, $contenu, $id_theme, $id_pays, $id_region, $id]);
        }
    }

    // Supprimer un article
    public function supprimerArticle($id) {
        $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>