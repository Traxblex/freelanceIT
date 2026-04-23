<title>Freelance</title>

<?php
    include ("src/controller/freelance/freelance.php");
?>

<div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4 px-6 lg:px-8 mt-24 mb-10 max-w-7xl mx-auto">
    
    <?php foreach ($freelances as $freelance): ?>
        
    <a href="index.php?page=profil_public&id=<?= $freelance['id_utilisateur'] ?>" class="block h-full">
        <div class="w-full h-full px-5 py-5 bg-white rounded-lg shadow-md hover:shadow-xl transition-shadow flex flex-col justify-between border border-gray-100">
            
            <div class="flex items-center gap-4 mb-4">
                <div class="w-12 h-12 shrink-0 bg-blue-100 rounded-full flex items-center justify-center text-blue-700 font-bold text-lg">
                    <?= strtoupper(substr($freelance['prenom'], 0, 1) . substr($freelance['nom'], 0, 1)) ?>
                </div>
                <div>
                    <h2 class="text-lg font-bold text-gray-800 leading-tight">
                        <?= htmlspecialchars($freelance['prenom'] . ' ' . substr($freelance['nom'], 0, 1)) ?>.
                    </h2>
                    <p class="text-sm text-blue-600 font-medium line-clamp-1">
                        <?= htmlspecialchars($freelance['titre_profil'] ?? 'Développeur Indépendant') ?>
                    </p>
                </div>
            </div>

            <div class="grid grid-cols-2 gap-2 text-sm text-gray-600 mb-4">
                <div class="flex items-center gap-1">
                    <span>📍</span>
                    <span class="truncate"><?= htmlspecialchars($freelance['localisation'] ?? 'Remote') ?></span>
                </div>
                <div class="flex items-center gap-1">
                    <span>💸</span>
                    <span><?= htmlspecialchars($freelance['tarif_horaire'] ?? '--') ?> € / h</span>
                </div>
            </div>

            <div class="mt-auto pt-4 border-t border-gray-50">
                <div class="flex flex-wrap gap-2">
                    <?php 
                        $competences = $freelance['tableau_competences'];
                        $limite = 3; 
                        $total = count($competences);

                        for ($i = 0; $i < min($limite, $total); $i++) {
                            echo '<span class="px-3 py-1 text-[10px] font-bold text-gray-700 uppercase bg-gray-100 rounded-md">' . htmlspecialchars(trim($competences[$i])) . '</span>';
                        }

                        if ($total > $limite) {
                            $reste = $total - $limite;
                            echo '<span class="px-3 py-1 text-[10px] font-bold text-gray-800 uppercase bg-gray-200 rounded-md">+' . $reste . '</span>';
                        }
                    ?>
                </div>
            </div>

        </div>
    </a>

    <?php endforeach; ?>

</div>