<?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<?php
include 'elements/head.php';
include 'elements/header.php';
include 'bdd/bdd.php';
if (!isset($_SESSION["login"])) {
    header("location: connexion.php");
    exit();
}
?>

<body class="bg-gray-100">
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Liste des rapports -->
            <div class="lg:w-3/4" id="liste-rapports"></div>
            <!-- Sidebar -->
            <div class="lg:w-1/4" style="margin-top: 22px;">
                <div class="sticky top-10">
                    <?php if ($_SESSION["type"] == 0) { ?>
                        <button id="openRapportForm"
                            class="block w-full text-center bg-green-500 hover:bg-green-600 text-white font-bold rounded py-4 mb-6">
                            Créer un Rapport
                        </button>
                    <?php } ?>
                    <div class="bg-white rounded-lg shadow text-sm mt-4">
                        <h4 class="px-4 py-4 text-lg font-bold text-gray-700 border-b">
                            Statistiques
                        </h4>
                        <div class="text-center py-3">
                            <a href="#" id="compteur-rapports" class="block text-xl font-bold hover:underline">0</a>
                            Rapports
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Formulaire modal pour créer un rapport -->
    <div id="rapportModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-bold mb-4">Créer un rapport</h2>
            <form id="rapportForm">
                <div class="mb-4">
                    <label class="block mb-1">Description</label>
                    <input type="text" name="description" required class="w-full border rounded p-2" />
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Date du rapport</label>
                    <input type="date" name="date_rapport" required class="w-full border rounded p-2" />
                </div>
                <div class="mb-4">
                    <label class="block mb-1">Contenu</label>
                    <textarea name="contenu" required class="w-full border rounded p-2"></textarea>
                </div>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Envoyer</button>
                <button type="button" id="closeRapportForm" class="ml-2 text-gray-600">Annuler</button>
            </form>
        </div>
    </div>
    <script src="js/rapports.js"></script>
</body>
<?php include 'elements/footer.php'; ?>

</html>