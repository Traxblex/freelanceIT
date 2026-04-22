<title>inscription</title>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8 mt-20">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img src="public/assets/img/logo_freelanceIT.png" alt="Your Company" class="mx-auto h-10 w-auto" />
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">S'inscrire</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
    <form  id="form-inscription" action="src/controller/login/inscription.php" method="POST" class="space-y-6">
        <div>
            <label for="nom" class="block text-sm/6 font-medium text-gray-900">Nom</label>
            <div class="mt-2">
                <input id="nom" type="text" name="nom" required autocomplete="name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>
        <div>
            <label for="prenom" class="block text-sm/6 font-medium text-gray-900">Prénom</label>
            <div class="mt-2">
                <input id="prenom" type="text" name="prenom" required autocomplete="name" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
            </div>
        </div>
    
      <div>
        <label for="email" class="block text-sm/6 font-medium text-gray-900">Adresse email</label>
        <div class="mt-2">
          <input id="email" type="email" name="email" required autocomplete="email" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
      </div>

      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Mot de passe</label>
        </div>
        <div class="mt-2">
          <input id="password" type="password" minlength="8" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Confirmer le mot de passe</label>
        </div>
        <div class="mt-2">
          <input id="confirm_password" minlength="8" type="password" name="confirm_password" required autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
      </div>
          <div>
              <label for="role-select" class="block text-sm font-medium text-gray-700">Je suis un :</label>
                  <select name="role" id="role-select" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                      <option value="freelance">Freelance (Je cherche des missions)</option>
                      <option value="client">Entreprise (Je propose des missions)</option>
                  </select>
          </div>

          <div id="champs-client-supplementaires" class="hidden mt-4 space-y-4 p-4 border border-gray-200 rounded-lg">
              <h3 class="text-sm font-bold text-gray-700">Informations de l'entreprise</h3>
              
              <div>
                  <label class="block text-sm font-medium text-gray-700">Numéro SIRET (14 chiffres)</label>
                  <input type="number" maxlength="14" name="siret" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
              
              <div>
                  <label class="block text-sm font-medium text-gray-700">Adresse de l'entreprise</label>
                  <input type="text" name="adresse" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
              
              <div>
                  <label class="block text-sm font-medium text-gray-700">Description</label>
                  <textarea name="description" rows="3" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
              </div>
          </div>

          <script>
              const selectRole = document.getElementById('role-select');
              const divClient = document.getElementById('champs-client-supplementaires');
              function verifierRole() {
                  if (selectRole.value === 'client') {
                      divClient.classList.remove('hidden');
                  } else {
                      divClient.classList.add('hidden');
                  }
              }

              selectRole.addEventListener('change', verifierRole);
              verifierRole();
          </script>

      <div>
        <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">S'inscrire</button>
      </div>
    </form>
    <p class="mt-10 text-center text-sm/6 text-gray-500">
        dejà un compte?
      <a href="index.php?page=connexion" class="font-semibold text-indigo-600 hover:text-indigo-500">Se connecter</a>
    </p>
  </div>
</div>
