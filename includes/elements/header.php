<header class="bg-gray-800 text-white">
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo à gauche -->
        <div class="flex-shrink-0">
            <a href="index.php" class="text-2xl font-bold">Stagea</a>
        </div>

        <!-- Barre de recherche centrée -->
        <div class="flex-1 text-center">
            <form action="#" role="search" class="inline-flex">
                <input type="search" placeholder="Rechercher..." aria-label="Search"
                    class="px-4 py-2 rounded-l-md border-none focus:outline-none text-gray-800" />
                <button type="submit"
                    class="px-4 py-2 bg-yellow-400 rounded-r-md font-bold text-gray-800 hover:bg-yellow-500 transition">
                    Recherche
                </button>
            </form>
        </div>

        <!-- Menu déroulant à droite -->
        <div class="relative group inline-block">
            <button class="flex items-center px-4 py-2 bg-gray-700 hover:bg-gray-600 rounded focus:outline-none">
                <span>Menu</span>
                <svg class="fill-current w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                    <path
                        d="M5.516 7.548a.707.707 0 011 0L10 10.032l3.484-2.484a.707.707 0 111 .947l-4 2.857a.707.707 0 01-1 0l-4-2.857a.707.707 0 010-.947z" />
                </svg>
            </button>
            <!-- Menu déroulant visible lorsque le groupe est survolé -->
            <ul class="absolute right-0 z-10 mt-2 w-48 bg-white rounded shadow-lg hidden group-hover:block">
                <li>
                    <a href="monCompte.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Mon compte</a>
                </li>
                <li>
                    <a href="parametres.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Paramètres</a>
                </li>
                <li class="border-t border-gray-200">
                    <a href="deconnexion.php" class="block px-4 py-2 text-red-600 hover:bg-gray-100">Déconnexion</a>
                </li>
            </ul>
        </div>
    </div>
    <?php include 'includes/elements/nav.php' ?>
</header>