<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>World Economy News Paper - Big News!</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo-section">
                <h1>🗞️ WORLD ECONOMY NEWSPAPER</h1>
                <p class="tagline">📰 "Big News!" - Morgan's Press Agency 📰</p>
                <p class="subtitle">🐦 Distribué par nos fidèles Martins Facteurs à travers les mers! 🐦</p>
            </div>
            <nav class="nav">
                <?php if (isset($_SESSION['utilisateur'])): ?>
                    <span class="user-info">👤 Bienvenue, <?= htmlspecialchars($_SESSION['utilisateur']['nom']) ?> (<?= $_SESSION['utilisateur']['role'] ?>)</span>
                    <?php if ($_SESSION['utilisateur']['role'] === 'admin' || $_SESSION['utilisateur']['role'] === 'auteur'): ?>
                        <a href="index.php?action=admin" class="btn btn-primary">✍️ Nouvelle Scoop</a>
                    <?php endif; ?>
                    <?php if ($_SESSION['utilisateur']['role'] === 'admin'): ?>
                        <a href="index.php?action=tableau_admin" class="btn btn-secondary">⚙️ Administration</a>
                    <?php endif; ?>
                    <a href="index.php?action=deconnexion" class="btn btn-logout">🚪 Déconnexion</a>
                <?php else: ?>
                    <a href="index.php?action=login" class="btn btn-primary">🔑 Connexion Presse</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container main-content">
        <div class="news-banner">
            <h2>🔥 LES DERNIÈRES NOUVELLES DU MONDE ! 🔥</h2>
            <p>"Rien n'échappe à l'œil perçant de Morgans et ses reporters !"</p>
        </div>

        <?php if (empty($articles)): ?>
            <div class="no-articles">
                <p>📰 Aucune nouvelle pour le moment... Les Martins Facteurs sont en route !</p>
            </div>
        <?php else: ?>
            <div class="articles-grid">
                <?php foreach ($articles as $article): ?>
                    <article class="article-card">
                        <?php if ($article['image']): ?>
                            <div class="article-image">
                                <img src="public/upload/<?= htmlspecialchars($article['image']) ?>" alt="<?= htmlspecialchars($article['titre']) ?>">
                            </div>
                        <?php endif; ?>
                        
                        <div class="article-content">
                            <div class="article-meta">
                                <?php if ($article['theme']): ?>
                                    <span class="badge badge-theme">🏷️ <?= htmlspecialchars($article['theme']) ?></span>
                                <?php endif; ?>
                                <?php if ($article['pays']): ?>
                                    <span class="badge badge-pays">🌍 <?= htmlspecialchars($article['pays']) ?></span>
                                <?php endif; ?>
                            </div>
                            
                            <h3 class="article-title"><?= htmlspecialchars($article['titre']) ?></h3>
                            
                            <?php if ($article['apercu']): ?>
                                <p class="article-apercu"><?= nl2br(htmlspecialchars($article['apercu'])) ?></p>
                            <?php endif; ?>
                            
                            <div class="article-footer">
                                <div class="article-author">
                                    ✍️ Par <?= htmlspecialchars($article['auteur'] ?? 'Anonyme') ?>
                                    <br>
                                    📅 <?= date('d/m/Y à H:i', strtotime($article['date_publication'])) ?>
                                </div>
                                
                                <div class="article-actions">
                                    <a href="index.php?action=article&id=<?= $article['id'] ?>" class="btn btn-read">📖 Lire</a>
                                    
                                    <?php if (isset($_SESSION['utilisateur']) && ($_SESSION['utilisateur']['role'] === 'admin' || $_SESSION['utilisateur']['role'] === 'auteur')): ?>
                                        <a href="index.php?action=modifier&id=<?= $article['id'] ?>" class="btn btn-edit">✏️ Modifier</a>
                                    <?php endif; ?>
                                    
                                    <?php if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['role'] === 'admin'): ?>
                                        <a href="index.php?action=supprimer&id=<?= $article['id'] ?>" 
                                           class="btn btn-delete" 
                                           onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')">🗑️ Supprimer</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>🗞️ World Economy News Paper - "The News That Shakes the World!" 🗞️</p>
            <p>📮 Livré par nos Martins Facteurs à travers les Grand Line, New World et tous les Blues!</p>
            <p>🐦 © Morgan's Press Agency - Toutes les nouvelles qui méritent d'être connues! 🐦</p>
        </div>
    </footer>
</body>
</html>