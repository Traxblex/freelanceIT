<h1 class="">Mon Profil</h1>
<p>Bienvenue sur votre profil ! Ici, vous pouvez voir et modifier vos informations personnelles.</p>
<?php
    include('src/controller/profil/profil.php');
?>
<div class="bg-white p-6 rounded-lg shadow-md max-w-3xl mx-auto mt-6">
    <h2 class="text-xl font-semibold mb-4">Informations personnelles</h2>
    <p><strong>Nom :</strong> <?= htmlspecialchars($user['nom']) ?></p>
    <p><strong>Prénom :</strong> <?= htmlspecialchars($user['prenom']) ?></p>
    <p><strong>Email :</strong> <?= htmlspecialchars($user['email']) ?></p>
    <p><strong>Rôle :</strong> <?= htmlspecialchars($user['role']) ?></p>

    <?php if ($profile): ?>
        <h3 class="text-lg font-semibold mt-6 mb-2">Informations de l'entreprise</h3>
        <p><strong>Nom de l'entreprise :</strong> <?= htmlspecialchars($profile['nom_entreprise']) ?></p>
        <p><strong>SIRET :</strong> <?= htmlspecialchars($profile['siret']) ?></p>
        <p><strong>Adresse :</strong> <?= htmlspecialchars($profile['adresse']) ?></p>
        <p><strong>Description :</strong> <?= nl2br(htmlspecialchars($profile['description'])) ?></p>
    <?php endif; ?>