<section class="bg-white mt-20">
    <div class="container px-6 py-12 mx-auto max-w-4xl">
        <h1 class="text-2xl font-semibold text-center text-gray-900 lg:text-3xl">
            Contactez nous
        </h1>

        <div class="mt-10 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="p-6 border border-gray-200 rounded-xl">
                <h2 class="text-lg font-semibold text-gray-900">Coordonnees</h2>
                <div class="mt-4 space-y-3 text-gray-700">
                    <p><span class="font-semibold">Telephone:</span> <a class="text-blue-600 hover:underline" href="tel:+330100000000">+33 01 00 00 00 00</a></p>
                    <p><span class="font-semibold">Email:</span> <a class="text-blue-600 hover:underline" href="mailto:contact@freelanceIT.com">contact@freelanceIT.com</a></p>
                </div>
            </div>

            <div class="p-6 border border-gray-200 rounded-xl">
                <h2 class="text-lg font-semibold text-gray-900">Envoyer un message</h2>

                <form method="post" action="">
                    <div class="mt-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Nom</label>
                        <input id="name" name="name" type="text" required
                               class="mt-2 w-full rounded-lg border border-gray-200 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900">
                    </div>

                    <div class="mt-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" name="email" type="email" required
                               class="mt-2 w-full rounded-lg border border-gray-200 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900">
                    </div>

                    <div class="mt-4">
                        <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                        <textarea id="message" name="message" rows="5" required
                                  class="mt-2 w-full rounded-lg border border-gray-200 px-4 py-2 focus:outline-none focus:ring-2 focus:ring-gray-900"></textarea>
                    </div>

                    <div class="mt-6 text-center">
                        <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-3 text-sm font-medium text-white bg-gray-900 rounded-lg hover:bg-gray-800">
                            Envoyer
                        </button>
                    </div>
                </form>

                <p class="mt-4 text-sm text-gray-500">
                    Pour le moment, le formulaire ne fait pas encore l'envoi cote serveur.
                </p>
            </div>
        </div>
    </div>
</section>

