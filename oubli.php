<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'elements/head.php'; ?>
</head>

<body class="bg-gray-100">
    <!-- Conteneur centré verticalement et horizontalement -->
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h1 class="text-3xl font-bold text-center mb-6">Mot de passe oublié</h1>
            <form action="verifs/verif_oubli.php" method="POST" class="space-y-4">
                <input type="text" name="email" placeholder="Email lié au compte" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                    class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                    Récupérer
                </button>
            </form>
            <div class="mt-4 text-center">
                <a href="connexion.php" class="text-blue-600 hover:underline">
                    Connexion
                </a>
            </div>
        </div>
    </div>
</body>

</html>