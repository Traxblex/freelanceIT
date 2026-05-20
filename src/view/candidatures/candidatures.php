<title> Candidatures - FreelanceHub</title>
<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 bg-gray-50 min-h-screen">

<?php
$role = $_SESSION['user_role'] ?? null;
$notif = $_GET['action'] ?? null;
?>

<?php if ($notif === 'accepter'): ?>
    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded" role="alert">
        <strong>Succès !</strong> La candidature a été <strong>acceptée</strong>.
    </div>
<?php elseif ($notif === 'refuser'): ?>
    <div class="mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded" role="alert">
        <strong>Fait.</strong> La candidature a été <strong>refusée</strong>.
    </div>
<?php endif; ?>

<div class="flex items-center justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900">Mes candidatures</h1>
        <p class="text-sm text-gray-500 mt-1">
            <?= count($candidatures) ?> candidature<?= count($candidatures) > 1 ? 's' : '' ?>
            <?= $role === 'client' ? 'reçues sur vos missions' : 'soumises' ?>
        </p>
    </div>
    <?php if ($role === 'freelance'): ?>
        <a href="index.php?page=mission" class="inline-flex items-center rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-800 transition-colors">
            <svg class="mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Voir les missions
        </a>
    <?php endif; ?>
</div>

<?php if (empty($candidatures)): ?>
    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-12 text-center">
        <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
        <h3 class="text-lg font-semibold text-gray-900 mb-2">Aucune candidature</h3>
        <p class="text-gray-500 mb-6">
            <?= $role === 'freelance' ? "Tu n'as pas encore postulé à une mission." : "Vous n'avez pas encore reçu de candidatures." ?>
        </p>
        <?php if ($role === 'freelance'): ?>
            <a href="index.php?page=mission" class="inline-flex items-center rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white hover:bg-gray-800 transition-colors">Parcourir les missions</a>
        <?php endif; ?>
    </div>

<?php elseif ($role === 'freelance'): ?>
    <!-- VUE FREELANCE -->
    <div class="space-y-4">
        <?php foreach ($candidatures as $c): ?>
            <?php
                $statut = $c['statut'];
                $badge = match($statut) {
                    'acceptee'   => ['bg-green-100 text-green-800',  'Acceptée'],
                    'refusee'    => ['bg-red-100 text-red-800',      'Refusée'],
                    'en_attente' => ['bg-yellow-100 text-yellow-800','En attente'],
                    default      => ['bg-gray-100 text-gray-800',    ucfirst($statut)]
                };
            ?>
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-4">
                    <div class="flex-1">
                        <div class="flex items-center gap-3 mb-2">
                            <h2 class="text-base font-bold text-gray-900"><?= htmlspecialchars($c['titre_mission']) ?></h2>
                            <span class="inline-flex items-center rounded-full <?= $badge[0] ?> px-2.5 py-0.5 text-xs font-medium"><?= $badge[1] ?></span>
                        </div>
                        <p class="text-sm text-gray-500 mb-3"><?= htmlspecialchars($c['nom_entreprise']) ?> &bull; Budget : <strong><?= $c['budget'] ?> €</strong></p>
                        <p class="text-sm text-gray-700 line-clamp-2"><?= htmlspecialchars($c['proposition']) ?></p>
                    </div>
                    <div class="text-right shrink-0">
                        <p class="text-lg font-bold text-gray-900"><?= $c['tarif_propose'] ?> €</p>
                        <p class="text-xs text-gray-500"><?= $c['delai_livraison'] ?></p>
                        <p class="text-xs text-gray-400 mt-1"><?= date('d/m/Y', strtotime($c['date_postulation'])) ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

<?php elseif ($role === 'client'): ?>
    <!-- VUE CLIENT -->
    <?php
        // Grouper par mission
        $missions_groupees = [];
        foreach ($candidatures as $c) {
            $missions_groupees[$c['titre_mission']][] = $c;
        }
    ?>
    <?php foreach ($missions_groupees as $titre_mission => $cands): ?>
        <div class="mb-8">
            <h2 class="text-lg font-bold text-gray-900 mb-4 flex items-center gap-2">
                <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                <?= htmlspecialchars($titre_mission) ?>
                <span class="text-sm font-normal text-gray-500">(<?= count($cands) ?> candidature<?= count($cands) > 1 ? 's' : '' ?>)</span>
            </h2>
            <div class="space-y-4">
                <?php foreach ($cands as $c): ?>
                    <?php
                        $statut = $c['statut'];
                        $badge = match($statut) {
                            'acceptee'   => ['bg-green-100 text-green-800',  'Acceptée'],
                            'refusee'    => ['bg-red-100 text-red-800',      'Refusée'],
                            'en_attente' => ['bg-yellow-100 text-yellow-800','En attente'],
                            default      => ['bg-gray-100 text-gray-800',    ucfirst($statut)]
                        };
                    ?>
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <div class="flex flex-col lg:flex-row lg:items-start lg:justify-between gap-4">
                            <div class="flex-1">
                                <div class="flex items-center gap-3 mb-1">
                                    <h3 class="text-base font-bold text-gray-900"><?= htmlspecialchars($c['nom'] . ' ' . $c['prenom']) ?></h3>
                                    <span class="inline-flex items-center rounded-full <?= $badge[0] ?> px-2.5 py-0.5 text-xs font-medium"><?= $badge[1] ?></span>
                                </div>
                                <p class="text-sm text-gray-500 mb-1"><?= htmlspecialchars($c['email']) ?></p>
                                <?php if ($c['titre_profil']): ?>
                                    <p class="text-sm text-gray-600 mb-2 italic"><?= htmlspecialchars($c['titre_profil']) ?></p>
                                <?php endif; ?>
                                <?php if ($c['competences']): ?>
                                    <div class="flex flex-wrap gap-2 mb-3">
                                        <?php foreach (explode(',', $c['competences']) as $comp): ?>
                                            <span class="inline-flex items-center rounded-md bg-gray-100 px-2 py-0.5 text-xs font-medium text-gray-700"><?= trim(htmlspecialchars($comp)) ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <p class="text-sm text-gray-700"><?= nl2br(htmlspecialchars($c['proposition'])) ?></p>
                            </div>
                            <div class="shrink-0 text-right">
                                <p class="text-xl font-bold text-gray-900"><?= $c['tarif_propose'] ?> €</p>
                                <p class="text-xs text-gray-500 mb-1">Délai : <?= htmlspecialchars($c['delai_livraison']) ?></p>
                                <p class="text-xs text-gray-400 mb-4"><?= date('d/m/Y', strtotime($c['date_postulation'])) ?></p>

                                <?php if ($statut === 'en_attente'): ?>
                                    <div class="flex gap-2 justify-end">
                                        <form method="POST" action="index.php?page=candidatures">
                                            <input type="hidden" name="id_candidature" value="<?= $c['id'] ?>">
                                            <input type="hidden" name="action" value="accepter">
                                            <button type="submit" class="inline-flex items-center rounded-lg bg-green-600 px-3 py-2 text-sm font-semibold text-white hover:bg-green-700 transition-colors">
                                                <svg class="mr-1.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                                Accepter
                                            </button>
                                        </form>
                                        <form method="POST" action="index.php?page=candidatures">
                                            <input type="hidden" name="id_candidature" value="<?= $c['id'] ?>">
                                            <input type="hidden" name="action" value="refuser">
                                            <button type="submit" class="inline-flex items-center rounded-lg bg-red-600 px-3 py-2 text-sm font-semibold text-white hover:bg-red-700 transition-colors">
                                                <svg class="mr-1.5 h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                                                Refuser
                                            </button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php endforeach; ?>

<?php endif; ?>
</main>
