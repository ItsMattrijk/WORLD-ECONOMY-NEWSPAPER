<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - WENP</title>
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
                <a href="index.php?action=admin" class="btn btn-primary">✍️ Nouvelle Scoop</a>
                <a href="index.php?action=deconnexion" class="btn btn-logout">🚪 Déconnexion</a>
            </nav>
        </div>
    </header>

    <!-- Admin Dashboard -->
    <main class="container main-content">
        <div class="admin-dashboard">
            <div class="dashboard-header">
                <h2>⚙️ Panneau d'Administration</h2>
                <p>🐦 Gestion complète de l'agence de Morgans 🐦</p>
            </div>

            <!-- Section Articles -->
            <section class="admin-section">
                <h3>📰 Gestion des Articles</h3>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>Thème</th>
                                <th>Pays</th>
                                <th>Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($articles)): ?>
                                <tr>
                                    <td colspan="7" class="text-center">📭 Aucun article publié</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($articles as $article): ?>
                                    <tr>
                                        <td><?= $article['id'] ?></td>
                                        <td class="article-title-cell">
                                            <a href="index.php?action=article&id=<?= $article['id'] ?>">
                                                <?= htmlspecialchars($article['titre']) ?>
                                            </a>
                                        </td>
                                        <td><?= htmlspecialchars($article['auteur'] ?? 'N/A') ?></td>
                                        <td><?= htmlspecialchars($article['theme'] ?? 'N/A') ?></td>
                                        <td><?= htmlspecialchars($article['pays'] ?? 'N/A') ?></td>
                                        <td><?= date('d/m/Y', strtotime($article['date_publication'])) ?></td>
                                        <td class="actions-cell">
                                            <a href="index.php?action=modifier&id=<?= $article['id'] ?>" 
                                               class="btn-mini btn-edit" title="Modifier">✏️</a>
                                            <a href="index.php?action=supprimer&id=<?= $article['id'] ?>" 
                                               class="btn-mini btn-delete" 
                                               onclick="return confirm('Supprimer cet article ?')" 
                                               title="Supprimer">🗑️</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </section>

            <!-- Section Utilisateurs -->
            <section class="admin-section">
                <h3>👥 Gestion des Journalistes</h3>
                <div class="table-container">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Inscription</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($utilisateurs)): ?>
                                <tr>
                                    <td colspan="6" class="text-center">👤 Aucun utilisateur</td>
                                </tr>
                            <?php else: ?>
                                <?php foreach ($utilisateurs as $user): ?>
                                    <tr>
                                        <td><?= $user['id'] ?></td>
                                        <td><?= htmlspecialchars($user['nom']) ?></td>
                                        <td><?= htmlspecialchars($user['email']) ?></td>
                                        <td>
                                            <span class="badge badge-role badge-<?= $user['role'] ?>">
                                                <?php
                                                    $roles = [
                                                        'admin' => '👑 Admin',
                                                        'auteur' => '✍️ Auteur',
                                                        'lecteur' => '👤 Lecteur'
                                                    ];
                                                    echo $roles[$user['role']] ?? $user['role'];
                                                ?>
                                            </span>
                                        </td>
                                        <td><?= date('d/m/Y', strtotime($user['date_creation'])) ?></td>
                                        <td class="actions-cell">
                                            <?php if ($user['id'] != $_SESSION['utilisateur']['id']): ?>
                                                <button class="btn-mini btn-delete" 
                                                        onclick="if(confirm('Supprimer cet utilisateur ?')) window.location.href='index.php?action=supprimer_user&id=<?= $user['id'] ?>'" 
                                                        title="Supprimer">🗑️</button>
                                            <?php else: ?>
                                                <span class="text-muted">Vous</span>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>