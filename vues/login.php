<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - WENP</title>
    <link rel="stylesheet" href="public/style.css">
</head>
<body>
   <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="logo-section">
                <h1>🗞️ WORLD ECONOMY NEWS PAPER</h1>
                <p class="tagline">📰 "Big News!" - Morgan's Press Agency 📰</p>
            </div>
            <nav class="nav">
                <a href="index.php" class="btn btn-secondary">← Retour à l'accueil</a>
            </nav>
        </div>
    </header>

    <!-- Login Form -->
    <main class="container main-content">
        <div class="login-container">
            <div class="login-header">
                <h2>🔐 Espace Journaliste</h2>
                <p>🐦 Accédez à l'agence de presse de Morgans 🐦</p>
            </div>

            <?php if (isset($_SESSION['erreur'])): ?>
                <div class="alert alert-error">
                    ❌ <?= htmlspecialchars($_SESSION['erreur']) ?>
                </div>
                <?php unset($_SESSION['erreur']); ?>
            <?php endif; ?>

            <form action="index.php?action=connexion" method="POST" class="login-form">
                <div class="form-group">
                    <label for="email">📧 Email</label>
                    <input type="email" id="email" name="email" required 
                           placeholder="votre.email@wenp.com" class="form-control">
                </div>

                <div class="form-group">
                    <label for="mot_de_passe">🔑 Mot de passe</label>
                    <input type="password" id="mot_de_passe" name="mot_de_passe" required 
                           placeholder="Votre mot de passe secret" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary btn-full">
                    🚀 Se connecter à l'agence
                </button>
            </form>

            <div class="login-footer">
                <p>💡 <strong>Astuce:</strong> Seuls les journalistes accrédités par Morgans peuvent publier des scoops!</p>
                <p>🐦 Les Martins Facteurs vérifient toutes les connexions!</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>🐦 © World Economy NewsPaper - Toutes les nouvelles qui méritent d'être connues! 🐦</p>
        </div>
    </footer>
</body>
</html>