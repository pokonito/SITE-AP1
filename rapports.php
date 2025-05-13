<?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<?php
include 'includes/elements/head.php';
include 'includes/elements/header.php';
include 'includes/bdd/bdd.php';
if (!isset($_SESSION["login"])) {
    header("location: connexion.php");
    exit();
}
?>

<body class="bg-gray-100">
    <!-- IonIcons pour les icônes -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet">

    <div class="container mx-auto px-4 py-6">
        <!-- Mise en page en flex: Contenu principal et Sidebar -->
        <div class="flex flex-col lg:flex-row gap-6">

            <!-- Contenu principal -->
            <div class="lg:w-3/4">
                <!-- Barre de sélection en haut -->
                <?php
                if ($_SESSION["type"] == 1) {
                ?>
                    <div class="flex flex-col lg:flex-row gap-4 mb-5">
                        <div class="w-full lg:w-1/2">
                            <label>Filtre :</label>
                            <select
                                class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 text-sm">
                                <option>Aucun</option>
                                <option>Date</option>
                                <option>Eleve</option>
                                <option>Classe</option>
                            </select>
                        </div>
                        <div class="w-full lg:w-1/2">
                            <label>Classe :</label>
                            <select
                                class="block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-yellow-400 text-sm">
                                <option>Toutes</option>
                                <option>SIO SLAM A1</option>
                                <option>SIO SLAM A2</option>
                                <option>SIO SISR A1</option>
                                <option>SIO SISR A2</option>
                            </select>
                        </div>
                    </div>
                <?php
                }
                ?>



                <!-- Liste des posts -->
                <?php
                $queryMailVerif = 'SELECT * FROM cr join utilisateur u on cr.num_utilisateur = u.num WHERE cr.num_utilisateur = :id';
                $req = $bdd->prepare($queryMailVerif);
                $req->execute(['id' => $_SESSION['num']]);
                $results = $req->fetchAll();

                if ($results) {
                    foreach ($results as $result) {
                ?>
                        <div class="bg-white rounded-lg shadow transition hover:shadow-lg p-4 mb-4 border-l-4 border-blue-500">
                            <div class="flex flex-col md:flex-row md:items-center">
                                <div class="md:w-2/3">
                                    <h5 class="text-lg font-semibold">
                                        <a href="#" class="text-blue-600 hover:underline">
                                            <?php echo $result["description"]; ?>
                                        </a>
                                    </h5>
                                </div>
                                <div class="mt-2 md:mt-0 md:w-1/3 text-gray-600 text-center">
                                    <i class="ion-ios-eye-outline text-xl"></i>
                                    <span class="block text-sm"><?php echo $result["vu"]; ?> Vues</span>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>

            <!-- Sidebar -->
            <div class="lg:w-1/4">
                <div class="sticky top-20">
                    <a href="#"
                        class="block w-full text-center bg-green-500 hover:bg-green-600 text-white font-bold rounded py-4 mb-6">
                        Créer un Rapport
                    </a>

                    <!-- Stats -->
                    <div class="bg-white rounded-lg shadow text-sm">
                        <h4 class="px-4 py-4 text-lg font-bold text-gray-700 border-b">
                            Stats
                        </h4>
                        <div class="grid grid-cols-2 divide-x divide-gray-300 text-center">
                            <div class="py-3 border-b">
                                <a href="#" class="block text-xl font-bold hover:underline">58</a>
                                Stages
                            </div>
                            <div class="py-3 border-b">
                                <a href="#" class="block text-xl font-bold hover:underline">1.856</a>
                                Rapports
                            </div>
                            <div class="py-3">
                                <a href="#" class="block text-xl font-bold hover:underline">300</a>
                                Élèves
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Fin Sidebar -->
        </div>
    </div>
</body>
<?php include 'includes/elements/footer.php'; ?>

</html>