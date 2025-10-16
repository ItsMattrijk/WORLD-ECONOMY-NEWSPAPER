<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier l'article - WENP</title>
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
                <a href="index.php?action=deconnexion" class="btn btn-logout">🚪 Déconnexion</a>
            </nav>
        </div>
    </header>

    <!-- Modification Form -->
    <main class="container main-content">
        <div class="admin-container">
            <div class="admin-header">
                <h2>✏️ Modifier l'article</h2>
                <p>🐦 Corrigez ou mettez à jour votre scoop 🐦</p>
            </div>

            <form action="index.php?action=update" method="POST" enctype="multipart/form-data" class="admin-form">
                <input type="hidden" name="id" value="<?= $article['id'] ?>">

                <div class="form-group">
                    <label for="titre">📰 Titre de l'article *</label>
                    <input type="text" id="titre" name="titre" required 
                           value="<?= htmlspecialchars($article['titre']) ?>" 
                           class="form-control">
                </div>

                <div class="form-group">
                    <label for="apercu">📝 Aperçu (résumé court)</label>
                    <textarea id="apercu" name="apercu" rows="3" 
                              class="form-control"><?= htmlspecialchars($article['apercu']) ?></textarea>
                </div>

                <div class="form-group">
                    <label for="contenu">📄 Contenu complet de l'article *</label>
                    <textarea id="contenu" name="contenu" rows="15" required 
                              class="form-control"><?= htmlspecialchars($article['contenu']) ?></textarea>
                </div>

                <?php if ($article['image']): ?>
                    <div class="current-image">
                        <p><strong>📸 Image actuelle:</strong></p>
                        <img src="public/upload/<?= htmlspecialchars($article['image']) ?>" 
                             alt="Image actuelle" style="max-width: 300px;">
                    </div>
                <?php endif; ?>

                <div class="form-group">
                    <label for="image">📸 Nouvelle image (laisser vide pour garder l'actuelle)</label>
                    <input type="file" id="image" name="image" accept="image/*" class="form-control">
                    <small>🐦 Les Martins Facteurs acceptent: JPG, PNG, GIF</small>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="id_theme">🏷️ Thème</label>
                        <select id="id_theme" name="id_theme" class="form-control">
                            <option value="">-- Choisir un thème --</option>
                            <?php foreach ($themes as $theme): ?>
                                <option value="<?= $theme['id'] ?>" 
                                        <?= $article['id_theme'] == $theme['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($theme['nom']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_region">🌍 Région (mer)</label>
                        <select id="id_region" name="id_region" class="form-control" onchange="chargerPays(this.value)">
                            <option value="">-- Choisir une région --</option>
                            <?php foreach ($regions as $r): ?>
                                <option value="<?= $r['id'] ?>" 
                                        <?= $article['id_region'] == $r['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($r['nom']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_pays">📍 Pays / Île</label>
                        <select id="id_pays" name="id_pays" class="form-control">
                            <option value="">-- Choisir un pays --</option>
                            <?php foreach ($pays as $p): ?>
                                <option value="<?= $p['id'] ?>" 
                                        <?= $article['id_pays'] == $p['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($p['nom']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-large">
                        💾 Sauvegarder les modifications
                    </button>
                    <a href="index.php?action=article&id=<?= $article['id'] ?>" class="btn btn-secondary btn-large">
                        ❌ Annuler
                    </a>
                </div>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>🗞️ World Economy News Paper - "The News That Shakes the World!" 🗞️</p>
            <p>🐦 © Morgan's Press Agency - Toutes les nouvelles qui méritent d'être connues! 🐦</p>
        </div>
    </footer>

    <script>
        function chargerPays(idRegion) {
            const selectPays = document.getElementById('id_pays');
            const paysActuel = '<?= $article['id_pays'] ?>';
            
            selectPays.innerHTML = '<option value="">⏳ Chargement...</option>';
            
            if (!idRegion) {
                selectPays.innerHTML = '<option value="">-- Sélectionnez d\'abord une région --</option>';
                return;
            }

            fetch('index.php?action=get_pays&id_region=' + idRegion)
                .then(response => response.json())
                .then(pays => {
                    selectPays.innerHTML = '<option value="">-- Choisir un pays / île --</option>';
                    pays.forEach(p => {
                        const option = document.createElement('option');
                        option.value = p.id;
                        option.textContent = p.nom;
                        if (p.id == paysActuel) {
                            option.selected = true;
                        }
                        selectPays.appendChild(option);
                    });
                })
                .catch(error => {
                    selectPays.innerHTML = '<option value="">❌ Erreur de chargement</option>';
                    console.error('Erreur:', error);
                });
        }
    </script>
</body>
</html>