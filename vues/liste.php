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
                <h1>🗞️ WORLD ECONOMY NEWS PAPER</h1>
                <p class="tagline">📰 "Big News!" - Morgan's Press Agency 📰</p>
                <p class="subtitle">🐦 Distribué par nos fidèles Martins Facteurs à travers les mers! 🐦</p>
            </div>
            
            <!-- Menu de navigation avec dropdowns -->
            <nav class="main-nav">
                <a href="index.php" class="nav-link">🏠 Accueil</a>
                
                <!-- Dropdown Thèmes -->
                <div class="nav-dropdown">
                    <button class="nav-link dropdown-btn">🏷️ Thèmes ▼</button>
                    <div class="dropdown-content">
                        <?php
                        require_once 'modeles/ModeleTheme.php';
                        $modeleTheme = new ModeleTheme($GLOBALS['pdo']);
                        $themes = $modeleTheme->getTousLesThemes();
                        foreach ($themes as $theme):
                        ?>
                            <a href="index.php?action=filtrer&theme=<?= $theme['id'] ?>">
                                <?= htmlspecialchars($theme['nom']) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Dropdown Régions -->
                <div class="nav-dropdown">
                    <button class="nav-link dropdown-btn">🌍 Régions ▼</button>
                    <div class="dropdown-content">
                        <?php
                        require_once 'modeles/ModeleRegion.php';
                        $modeleRegion = new ModeleRegion($GLOBALS['pdo']);
                        $regions = $modeleRegion->getToutesLesRegions();
                        foreach ($regions as $region):
                        ?>
                            <a href="index.php?action=filtrer&region=<?= $region['id'] ?>">
                                <?= htmlspecialchars($region['nom']) ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Dropdown Pays -->
                <div class="nav-dropdown">
                    <button class="nav-link dropdown-btn">📍 Pays ▼</button>
                    <div class="dropdown-content dropdown-content-large">
                        <?php
                        require_once 'modeles/ModelePays.php';
                        $modelePays = new ModelePays($GLOBALS['pdo']);
                        $pays = $modelePays->getTousLesPays();
                        foreach ($pays as $p):
                        ?>
                            <a href="index.php?action=filtrer&pays=<?= $p['id'] ?>">
                                <?= htmlspecialchars($p['nom']) ?> <span class="pays-region">(<?= htmlspecialchars($p['region_nom']) ?>)</span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>
                
                <!-- Boutons utilisateur -->
                <div class="nav-user">
                    <?php if (isset($_SESSION['utilisateur'])): ?>
                        <span class="user-info">👤 <?= htmlspecialchars($_SESSION['utilisateur']['nom']) ?></span>
                        <?php if ($_SESSION['utilisateur']['role'] === 'admin' || $_SESSION['utilisateur']['role'] === 'auteur'): ?>
                            <a href="index.php?action=admin" class="btn btn-primary">✍️ Nouvelle Scoop</a>
                        <?php endif; ?>
                        <?php if ($_SESSION['utilisateur']['role'] === 'admin'): ?>
                            <a href="index.php?action=tableau_admin" class="btn btn-secondary">⚙️ Admin</a>
                        <?php endif; ?>
                        <a href="index.php?action=deconnexion" class="btn btn-logout">🚪 Déconnexion</a>
                    <?php else: ?>
                        <a href="index.php?action=login" class="btn btn-primary">🔑 Connexion</a>
                    <?php endif; ?>
                </div>
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
            <p>🐦 © World Economy NewsPaper - Toutes les nouvelles qui méritent d'être connues! 🐦</p>
        </div>
    </footer>
</body>
</html>