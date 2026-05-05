<form action="index.php?page=controller_ajouterMission" method="POST">
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow-md mt-24 mb-10">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 mb-4">Ajouter une nouvelle mission</h1>
            <p class="text-sm text-gray-600 mb-6">Remplissez les informations ci-dessous pour publier votre mission.</p>
        </div>
        <div class="mb-4">
            <label for="entreprise" class="block text-sm font-medium text-gray-700">Entreprise</label>
            <input type="text" id="entreprise" name="entreprise" value="Mon Entreprise" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm bg-gray-100 cursor-not-allowed focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="titre" class="block text-sm font-medium text-gray-700">Titre de la mission</label>
            <input type="text" id="titre" name="titre" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea id="description" name="description" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"></textarea>
        </div>
        <div class="mb-4">
            <label for="budget" class="block text-sm font-medium text-gray-700">Budget (€)</label>
            <input type="number" id="budget" name="budget" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="duree" class="block text-sm font-medium text-gray-700">Durée</label>
            <input type="text" id="duree" name="duree" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <div class="mb-4">
            <label for="competences_requises" class="block text-sm font-medium text-gray-700">Compétences requises</label>
            <input type="text" id="competences_requises" name="competences_requises" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>
        <button type="submit" value="ajouter" name="valider" class="bg-black text-white hover:bg-blue-700 hover:shadow-xl px-4 py-2 rounded-md text-sm font-medium transition">Ajouter la mission</button>
    </div>
</form>