<?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); ?>
<!DOCTYPE html>
<html lang="fr">

<?php
include 'elements/head.php';
include 'elements/header.php';
if (!isset($_SESSION["login"])) {
    header("location: connexion.php");
    exit();
}
?>

<body>
    <section class="container mx-auto my-6 px-4">
        <div class="p-6">
            <h2 class="text-center text-2xl font-bold uppercase text-gray-700">

            </h2>
        </div>
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
    </section>
</body>
<?php include 'elements/footer.php'; ?>

</html>