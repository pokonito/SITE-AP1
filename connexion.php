<?php
session_start();
session_destroy();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php include 'includes/elements/head.php'; ?>
</head>

<body>
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <h1 class="text-3xl font-bold text-center mb-6">Se connecter</h1>
            <form action="verifs/verif_connexion.php" method="POST" class="space-y-4">
                <input type="text" name="login" placeholder="Email ou identifiant" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <input type="password" name="password" placeholder="Mot de passe" required
                    class="w-full px-4 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">
                <button type="submit"
                    class="w-full py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition-colors">
                    Connexion
                </button>
            </form>
            <div class="flex justify-between mt-4">
                <a href="inscription.php" class="text-sm text-blue-600 hover:underline">Inscription</a>
                <a href="oubli.php" class="text-sm text-blue-600 hover:underline">Mot de passe oublié</a>
            </div>
        </div>
    </div>
</body>

</html>