<title>Accueil</title>
<?php
    include('src/controller/accueil/index.php');
?>
<div class="relative isolate overflow-hidden bg-gray-900 py-24 sm:py-32 lg:py-40">
  
  <div class="absolute inset-0 -z-10">
    <img src="public/assets/img/accueil.avif" alt="Image d'accueil" class="absolute inset-0 -z-10 h-full w-full object-cover object-right md:object-center">
    <div class="absolute inset-0 -z-10 bg-gray-900/50"></div>

  </div>
  
  <div class="mx-auto max-w-7xl px-6 lg:px-8">
    <div class="mx-auto max-w-2xl lg:mx-0">
      <h2 class="text-5xl font-semibold tracking-tight text-white sm:text-7xl">Trouvez les talents IT pour vos projets</h2>
      <p class="mt-8 text-lg font-medium text-pretty text-gray-300 sm:text-xl/8">Freelance IT connecte les entreprises avec des développeurs freelances hautement qualifiés pour des missions de qualité.</p>
    </div>
    <div class="mx-auto mt-10 max-w-2xl lg:mx-0 lg:max-w-none">
      <div class="grid grid-cols-1 gap-x-8 gap-y-6 text-base/7 font-semibold text-white sm:grid-cols-2 lg:grid-cols-3">
        <a href="index.php?page=freelance" class="group inline-flex items-center gap-3 rounded-2xl border border-white/25 bg-white/10 px-6 py-4 text-sm font-semibold text-white shadow-lg backdrop-blur-md transition hover:bg-white/20">
          <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-500/80 text-white">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          </span>
          <span><span class="block">Voir les freelances</span><span class="mt-0.5 block text-xs font-normal text-slate-300">Profils en cartes</span></span>
        </a>
        <a href="index.php?page=mission" class="group inline-flex items-center gap-3 rounded-2xl border border-white/25 bg-white/10 px-6 py-4 text-sm font-semibold text-white shadow-lg backdrop-blur-md transition hover:bg-white/20">
<<<<<<< HEAD
          <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-indigo-500/80 text-white">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
          </span>
          <span><span class="block">Explorer les missions</span><span class="mt-0.5 block text-xs font-normal text-slate-300">Projets disponibles</span></span>
=======
          <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-blue-500/80 text-white">
            <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
          </span>
          <span><span class="block">Voir les projets</span><span class="mt-0.5 block text-xs font-normal text-slate-300">Missions en cartes</span></span>
>>>>>>> 251ba70d87e9a04f67e98ea1fb6f28fce23da305
        </a>
      </div>
      <dl class="mt-16 grid grid-cols-1 gap-8 sm:mt-20 lg:grid-cols-4">
        <div class="flex flex-col-reverse gap-1">
          <dt class="text-base/7 text-gray-300">Utilisateurs total</dt>
          <dd class="text-4xl font-semibold tracking-tight text-white">
            <?php echo $total_utilisateurs; ?>
          </dd>
        </div>
        <div class="flex flex-col-reverse gap-1">
          <dt class="text-base/7 text-gray-300">Freelance actifs</dt>
          <dd class="text-4xl font-semibold tracking-tight text-white">
            <?php echo $total_freelances; ?>
          </dd>
        </div>
        <div class="flex flex-col-reverse gap-1">
          <dt class="text-base/7 text-gray-300">entreprises partenaires</dt>
          <dd class="text-4xl font-semibold tracking-tight text-white">
            <?php echo $total_entreprises; ?>
          </dd>
        </div>
        <div class="flex flex-col-reverse gap-1">
          <dt class="text-base/7 text-gray-300">Missions disponibles</dt>
          <dd class="text-4xl font-semibold tracking-tight text-white">
            <?php echo $total_missions; ?>
          </dd>
        </div>
      </dl>
    </div>
  </div>
</div>
