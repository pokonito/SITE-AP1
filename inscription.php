<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'includes/elements/head.php'; ?>
</head>

<body class="bg-gray-100">
    <!-- Conteneur central pour centrer la carte -->
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h1 class="text-3xl font-bold text-center mb-6">S'inscrire</h1>
            <form action="verifs/verif_inscription.php" method="POST" class="space-y-4">
                <!-- Champs Prénom et Nom côte à côte sur grand écran, empilés sur mobile -->
                <div class="flex flex-col sm:flex-row gap-4">
                    <div class="flex-1">
                        <input type="text" name="prenom" placeholder="Prénom" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div class="flex-1">
                        <input type="text" name="nom" placeholder="Nom" required
                            class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                </div>
                <!-- Email -->
                <input type="text" name="email" placeholder="Email" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <!-- Mot de passe -->
                <input type="password" name="password" placeholder="Mot de passe" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <!-- Répéter le mot de passe -->
                <input type="password" name="repassword" placeholder="Répéter le mot de passe" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <!-- Bouton d'inscription -->
                <button type="submit"
                    class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                    Inscription
                </button>
            </form>
            <!-- Lien vers la page de connexion -->
            <div class="mt-4 text-center">
                <a href="connexion.php" class="text-blue-600 hover:underline">
                    Connexion
                </a>
            </div>
        </div>
    </div>
</body>

</html>