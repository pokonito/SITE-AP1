<?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<?php 
include 'includes/elements/head.php'; 
include 'includes/elements/header.php'; 
if (!ISSET($_SESSION["login"])) {header("location: connexion.php"); exit();} 
?>

<body class="bg-gray-100">
    <section class="container mx-auto my-6 px-4">
        <!-- Carte pour l'espace étudiant/enseignant -->
        <div class="bg-white rounded-lg shadow-md">
            <div class="p-6">
                <h2 class="text-center text-2xl font-bold uppercase text-gray-700">
                    <?php echo 'Espace étudiant'; if ($_SESSION["type"] == 1) {echo 'Espace enseignant';} ?>
                </h2>
            </div>
        </div>

        <!-- Carte pour les informations de connexion -->
        <div class="bg-white rounded-lg shadow-md mt-8">
            <div class="p-6">
                <h4 class="text-center text-xl font-semibold uppercase text-gray-600 mb-4">Informations de connexion :
                </h4>
                <ul class="space-y-2">
                    <?php 
                        echo '<li><p class="text-gray-700">Nom : ' . $_SESSION['nom'] . '</p></li>';
                        echo '<li><p class="text-gray-700">Prénom : ' . $_SESSION['prenom'] . '</p></li>';
                        echo '<li><p class="text-gray-700">Email : ' . $_SESSION['email'] . '</p></li>';
                        echo '<li><p class="text-gray-700">Login : ' . $_SESSION['login'] . '</p></li>';    
                    ?>
                </ul>
            </div>
        </div>
    </section>
</body>
<?php include 'includes/elements/footer.php'; ?>

</html>