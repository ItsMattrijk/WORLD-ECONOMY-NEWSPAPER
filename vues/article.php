<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['titre']) ?> - WENP</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo-section">
                <h1>🗞️ WORLD ECONOMY NEWSPAPER</h1>
                <p class="tagline">📰 "Big News!" - Morgan's Press Agency 📰</p>
            </div>
            <nav class="nav">
                <a href="index.php" class="btn btn-secondary">← Retour aux articles</a>
                <?php if (isset($_SESSION['utilisateur'])): ?>
                    <?php if ($_SESSION['utilisateur']['role'] === 'admin' || $_SESSION['utilisateur']['role'] === 'auteur'): ?>
                        <a href="index.php?action=modifier&id=<?= $article['id'] ?>" class="btn btn-primary">✏️ Modifier</a>
                    <?php endif; ?>
                    <a href="index.php?action=deconnexion" class="btn btn-logout">🚪 Déconnexion</a>
                <?php else: ?>
                    <a href="index.php?action=login" class="btn btn-primary">🔑 Connexion</a>
                <?php endif; ?>
            </nav>
        </div>
    </header>

    <!-- Article complet -->
    <main class="container main-content">
        <article class="article-full">
            <div class="article-header-full">
                <div class="article-meta-full">
                    <?php if ($article['theme']): ?>
                        <span class="badge badge-theme">🏷️ <?= htmlspecialchars($article['theme']) ?></span>
                    <?php endif; ?>
                    <?php if ($article['pays']): ?>
                        <span class="badge badge-pays">🌍 <?= htmlspecialchars($article['pays']) ?></span>
                    <?php endif; ?>
                    <?php if ($article['region']): ?>
                        <span class="badge badge-region">📍 <?= htmlspecialchars($article['region']) ?></span>
                    <?php endif; ?>
                </div>
                
                <h1 class="article-title-full">
                    🔥 <?= htmlspecialchars($article['titre']) ?> 🔥
                </h1>
                
                <div class="article-info">
                    <div class="author-info">
                        ✍️ <strong>Reporter:</strong> <?= htmlspecialchars($article['auteur'] ?? 'Agent Secret de Morgans') ?>
                    </div>
                    <div class="date-info">
                        📅 <strong>Publié le:</strong> <?= date('d/m/Y à H:i', strtotime($article['date_publication'])) ?>
                    </div>
                </div>
            </div>

            <?php if ($article['image']): ?>
                <div class="article-image-full">
                    <img src="public/upload/<?= htmlspecialchars($article['image']) ?>" alt="<?= htmlspecialchars($article['titre']) ?>">
                    <p class="image-caption">📸 Photo exclusive capturée par nos Martins Facteurs</p>
                </div>
            <?php endif; ?>

            <?php if ($article['apercu']): ?>
                <div class="article-apercu-full">
                    <strong>📝 En bref:</strong>
                    <p><?= nl2br(htmlspecialchars($article['apercu'])) ?></p>
                </div>
            <?php endif; ?>

            <div class="article-contenu-full">
                <?= nl2br(htmlspecialchars($article['contenu'])) ?>
            </div>

            <div class="article-signature">
                <p>🐦 <em>Cette information vous a été apportée par le World Economy News Paper</em> 🐦</p>
                <p><strong>"Morgans ne rate jamais une Big News!"</strong></p>
            </div>

            <div class="article-actions-bottom">
                <a href="index.php" class="btn btn-primary">← Retour aux articles</a>
                <?php if (isset($_SESSION['utilisateur']) && ($_SESSION['utilisateur']['role'] === 'admin' || $_SESSION['utilisateur']['role'] === 'auteur')): ?>
                    <a href="index.php?action=modifier&id=<?= $article['id'] ?>" class="btn btn-edit">✏️ Modifier cet article</a>
                <?php endif; ?>
                <?php if (isset($_SESSION['utilisateur']) && $_SESSION['utilisateur']['role'] === 'admin'): ?>
                    <a href="index.php?action=supprimer&id=<?= $article['id'] ?>" 
                       class="btn btn-delete" 
                       onclick="return confirm('Voulez-vous vraiment supprimer cet article ?')">🗑️ Supprimer</a>
                <?php endif; ?>
            </div>
        </article>
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