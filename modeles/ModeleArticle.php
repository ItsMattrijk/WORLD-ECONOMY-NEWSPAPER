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