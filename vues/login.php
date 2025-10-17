<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - WENP</title>
    <link rel="stylesheet" href="public/style.css">
    <style>
        /* Petite mise en forme du bloc comptes disponibles */
        .test-accounts {
            margin-top: 2rem;
            background-color: #f8f9fa;
            border: 2px dashed #ccc;
            padding: 1.5rem;
            border-radius: 12px;
            text-align: left;
        }
        .test-accounts h3 {
            margin-top: 0;
            color: #333;
            text-align: center;
        }
        .test-accounts ul {
            list-style: none;
            padding-left: 0;
        }
        .test-accounts li {
            margin: 0.4rem 0;
        }
        .test-accounts code {
            background: #e9ecef;
            padding: 2px 6px;
            border-radius: 5px;
            font-family: monospace;
        }
    </style>
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

            <!-- Comptes de test -->
            <div class="test-accounts">
                <h3>🧪 Comptes disponibles pour les testeurs :</h3>
                <ul>
                    <li><strong>Admin :</strong> <code>morgans@worldeconomynews.op</code></li>
                    <li><strong>Auteur :</strong> <code>vivi@worldeconomynews.op</code></li>
                    <li><strong>Lecteur :</strong> <code>law@worldeconomynews.op</code></li>
                </ul>
                <p><strong>🔑 Mot de passe commun :</strong> <code>onepiece123</code></p>
            </div>

            <div class="login-footer">
                <p>💡 <strong>Astuce :</strong> Seuls les journalistes accrédités par Morgans peuvent publier des scoops !</p>
                <p>🐦 Les Martins Facteurs vérifient toutes les connexions !</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>🐦 © World Economy NewsPaper - Toutes les nouvelles qui méritent d'être connues ! 🐦</p>
        </div>
    </footer>
</body>
</html>
