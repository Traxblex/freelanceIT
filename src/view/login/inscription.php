<title>inscription</title>
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img src="public/img/logo_freelanceIT.png" alt="Your Company" class="mx-auto h-10 w-auto" />
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
          <input id="password" type="password" name="password" required autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
      </div>
      <div>
        <div class="flex items-center justify-between">
          <label for="password" class="block text-sm/6 font-medium text-gray-900">Confirmer le mot de passe</label>
        </div>
        <div class="mt-2">
          <input id="confirm_password" type="password" name="confirm_password" required autocomplete="current-password" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" />
        </div>
      </div>
        <div>
            <label for="role" class="block text-sm/6 font-medium text-gray-900">Rôle</label>
            <div class="mt-2">
                <select id="role" name="role" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                    <option value="">Sélectionnez un rôle</option>
                    <option value="freelance">Freelance</option>
                    <option value="client">Client</option>
                </select>
            </div>
        </div>

      

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
