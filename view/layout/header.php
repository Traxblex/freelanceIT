<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
  </head>
<body>
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
            
                <div class="flex-shrink-0 flex items-center"> <!-- Ajout de flex items-center pour centrer verticalement le logo -->
                    <a href="index.php?page=index" class="text-2xl font-bold text-gray-800 hover:text-blue-600 transition duration-300">
                    <img src="" alt="">
                    MonLogo
                    </a>
                </div>

                <div class="hidden md:flex space-x-8">
                    <a href="index.php?page=index" class="text-gray-600 hover:text-red-600 px-3 py-2 rounded-md text-sm font-medium transition">Accueil</a>
                    <a href="index.php?page=mission" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition">Missions</a>
                    <a href="index.php?page=freelance" class="text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition">Freelances</a>
                </div>

                <div class="hidden md:flex space-x-8">
                    <a href="index.php?page=connexion" class="text-black hover:bg-gray-600 px-4 py-2 rounded-md text-sm font-medium transition">Se connecter</a>
                    <a href="index.php?page=ajouterMission" class="bg-black text-white hover:bg-blue-700 px-4 py-2 rounded-md text-sm font-medium transition">Poster une mission</a>
                </div>

                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-600 hover:text-blue-600 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    </button>
                </div>

    </div>
  </div>
        <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="index.php?page=index" class="block text-gray-600 hover:text-blue-600 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Accueil</a>
                <a href="index.php?page=mission" class="block text-gray-600 hover:text-blue-600 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Missions</a>
                <a href="index.php?page=freelance" class="block text-gray-600 hover:text-blue-600 hover:bg-gray-50 px-3 py-2 rounded-md text-base font-medium">Freelances</a>
                <a href="index.php?page=connexion" class="block mt-4 text-black hover:text-blue-500 hover:bg-gray-50 text-center px-3 py-2 rounded-md text-base font-medium">Se connecter</a>
                <a href="index.php?page=ajouterMission" class="block mt-4 bg-black text-white hover:bg-blue-700 text-center px-4 py-2 rounded-md text-base font-medium">Poster une mission</a>
            </div>
        </div>
    </nav>
    <script>
  // On récupère le bouton et le menu mobile
  const btn = document.getElementById('mobile-menu-button');
  const menu = document.getElementById('mobile-menu');

  // On écoute le clic sur le bouton
  btn.addEventListener('click', () => {
    // La méthode toggle ajoute la classe 'hidden' si elle n'y est pas, et l'enlève si elle y est
    menu.classList.toggle('hidden');
  });
</script>