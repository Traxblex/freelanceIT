<?php
    include ("controller/mission/liste_mission.php");
?>
<a href="">
<div class="w-full max-w-sm px-4 py-3 bg-white rounded-md shadow-md md:mx-auto">
    <div class="flex items-center justify-between">
        <h1 class="mt-2 text-lg font-semibold text-gray-800">AP® Psychology - Course 5: Health and Behavior</h1>
        <span class="px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">psychology</span>
    </div>
    <p class="mt-2 text-sm text-gray-600 ">Learn about the relationship between health and behavior, including stress, coping mechanisms, and health psychology interventions.</p>
    <?php
        // Exemple : les données qui viennent de ta base de données
        $competences = [
        ]; 
        $limite = 2; // On ne veut afficher que 4 badges maximum
        $total = count($competences);
    ?>

    <div class="competences-liste">
        <?php 
            // On boucle pour afficher les premières compétences (jusqu'à la limite)
            for ($i = 0; $i < min($limite, $total); $i++) {
            echo '<span class="tag px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900">' . htmlspecialchars($competences[$i]) . '</span>';
            }
            if ($total > $limite) {
                $reste = $total - $limite;
                echo '<span class="px-3 py-1 text-xs text-blue-800 uppercase bg-blue-200 rounded-full dark:bg-blue-300 dark:text-blue-900 tag tag-plus">+' . $reste . '</span>';
            }
        ?>
    </div>
</div>
</a>