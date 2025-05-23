<?php
session_start();

include 'elements/head.php';
include 'elements/header.php';
include 'bdd/bdd.php';
if (!isset($_SESSION["login"])) {
    header("location: connexion.php");
    exit();
} else if ($_SESSION["type"] == 0) {
    header("location: index.php");
    exit();
}
?>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-col lg:flex-row gap-6">
            <!-- Liste des élèves -->
            <div class="lg:w-3/4" id="liste-eleves"></div>
            <!-- Sidebar -->
            <div class="lg:w-1/4" style="margin-top: 22px;">
                <div class="sticky top-10">
                    <div class="bg-white rounded-lg shadow text-sm mt-4">
                        <h4 class="px-4 py-4 text-lg font-bold text-gray-700 border-b">
                            Statistiques
                        </h4>
                        <div class="text-center py-3">
                            <a href="#" id="compteur-eleves" class="block text-xl font-bold hover:underline">0</a>
                            Élèves
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal infos élève -->
    <div id="eleveModal" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-xl font-bold mb-4" id="eleveModalTitle">Informations élève</h2>
            <div id="eleveInfos"></div>
            <button type="button" id="closeEleveModal" class="mt-4 bg-gray-200 px-4 py-2 rounded">Fermer</button>
        </div>
    </div>
    <script src="js/eleves.js"></script>
</body>
<?php include 'elements/footer.php'; ?>

</html>