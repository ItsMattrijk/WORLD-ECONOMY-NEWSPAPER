<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nouvelle Scoop - WENP</title>
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

    <!-- Admin Form -->
    <main class="container main-content">
        <div class="admin-container">
            <div class="admin-header">
                <h2>✍️ Publier une Big News!</h2>
                <p>🐦 Rédigez votre scoop exclusif pour les Martins Facteurs 🐦</p>
            </div>

            <form action="index.php?action=ajouter" method="POST" enctype="multipart/form-data" class="admin-form">
                <div class="form-group">
                    <label for="titre">📰 Titre de l'article *</label>
                    <input type="text" id="titre" name="titre" required 
                           placeholder="Ex: Luffy devient Empereur des Mers!" class="form-control">
                </div>

                <div class="form-group">
                    <label for="apercu">📝 Aperçu (résumé court)</label>
                    <textarea id="apercu" name="apercu" rows="3" 
                              placeholder="Un résumé accrocheur pour attirer l'attention des lecteurs..." 
                              class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="contenu">📄 Contenu complet de l'article *</label>
                    <textarea id="contenu" name="contenu" rows="15" required 
                              placeholder="Racontez tous les détails de cette Big News..." 
                              class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <label for="image">📸 Image (photo exclusive)</label>
                    <input type="file" id="image" name="image" accept="image/*" class="form-control">
                    <small>🐦 Les Martins Facteurs acceptent: JPG, PNG, GIF</small>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="id_theme">🏷️ Thème</label>
                        <select id="id_theme" name="id_theme" class="form-control">
                            <option value="">-- Choisir un thème --</option>
                            <?php foreach ($themes as $theme): ?>
                                <option value="<?= $theme['id'] ?>"><?= htmlspecialchars($theme['nom']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_region">🌍 Région (mer)</label>
                        <select id="id_region" name="id_region" class="form-control" onchange="chargerPays(this.value)">
                            <option value="">-- Choisir une région --</option>
                            <?php foreach ($regions as $r): ?>
                                <option value="<?= $r['id'] ?>"><?= htmlspecialchars($r['nom']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_pays">📍 Pays / Île</label>
                        <select id="id_pays" name="id_pays" class="form-control">
                            <option value="">-- Sélectionnez d'abord une région --</option>
                        </select>
                    </div>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary btn-large">
                        🚀 Publier cette Big News!
                    </button>
                    <a href="index.php" class="btn btn-secondary btn-large">
                        ❌ Annuler
                    </a>
                </div>
            </form>

            <div class="admin-tips">
                <h3>💡 Conseils de Morgans pour un bon article:</h3>
                <ul>
                    <li>🔥 Un titre accrocheur fait toute la différence!</li>
                    <li>📸 Une bonne photo attire l'œil des lecteurs</li>
                    <li>✍️ Soyez précis et captivant dans vos descriptions</li>
                    <li>🌍 N'oubliez pas de localiser votre information</li>
                    <li>🐦 Les Martins Facteurs livreront votre scoop partout!</li>
                </ul>
            </div>
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