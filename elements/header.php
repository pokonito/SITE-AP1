<header>
    <div class="container mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo à gauche -->
        <div class="flex-shrink-0 min-w-[130px] flex flex-col items-start">
            <a href="index.php" class="text-2xl font-bold">Stagea</a>
            <a href="index.php" class="text-s">
                <?php
                if ($_SESSION["type"] == 1) {
                    echo 'Espace enseignant';
                } else {
                    echo 'Espace étudiant';
                } ?>
            </a>
        </div>

        <!-- Barre de recherche centrée -->
        <div class="flex-1 flex justify-center">
            <form action="#" role="search" class="inline-flex">
                <input type="search" placeholder="Rechercher..." aria-label="Search"
                    class="px-4 py-2 rounded-l-md border-none focus:outline-none text-gray-800" />
                <button type="submit"
                    class="px-4 py-2 bg-yellow-400 rounded-r-md font-bold text-gray-800 hover:bg-yellow-500 transition">
                    Recherche
                </button>
            </form>
        </div>

        <!-- Menu déroulant à droite, largeur identique au logo -->
        <div class="flex-shrink-0 min-w-[130px] flex justify-end">
            <div class="relative inline-block">
                <button id="menuBtn" class="flex items-center px-4 py-2 bg-yellow-400 hover:bg-yellow-500 rounded focus:outline-none text-gray-800">
                    <span>Menu</span>
                    <svg class="fill-current w-4 h-4 ml-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M5.516 7.548a.707.707 0 011 0L10 10.032l3.484-2.484a.707.707 0 111 .947l-4 2.857a.707.707 0 01-1 0l-4-2.857a.707.707 0 010-.947z" />
                    </svg>
                </button>
                <ul id="menuDropdown" class="absolute right-0 z-10 mt-2 w-48 bg-white rounded shadow-lg hidden">
                    <!-- <li>
                        <a href="compte.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Mon compte</a>
                    </li>
                    <li>
                        <a href="parametres.php" class="block px-4 py-2 text-gray-800 hover:bg-gray-100">Paramètres</a>
                    </li> -->
                    <li class="border-t border-gray-200">
                        <a href="deconnexion.php" class="block px-4 py-2 text-red-600 hover:bg-gray-100">Déconnexion</a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Script pour le menu déroulant -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const btn = document.getElementById('menuBtn');
                const dropdown = document.getElementById('menuDropdown');
                btn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    dropdown.classList.toggle('hidden');
                });
                // Ferme le menu si on clique ailleurs
                document.addEventListener('click', function() {
                    dropdown.classList.add('hidden');
                });
            });
        </script>
    </div>
    <?php
    if ($_SESSION["type"] == 1) {
        include 'elements/navProf.php';
    } else {
        include 'elements/nav.php';
    } ?>
</header>