<?php
include('../bdd/bdd.php');

$query = "SELECT num FROM utilisateur WHERE email = :email";

// Préparer la requête
$req = $bdd->prepare($query);

// Exécuter la requete
$req->execute([
    'email' => $_POST["email"]
]);

//Récupérer les résultats dans un tableau $result
$result = $req->fetch(PDO::FETCH_ASSOC);

$password = $result['num'];

$code = substr(str_replace(['+', '/', '='], '', base64_encode(random_bytes(8))), 0, 8);

if (!empty($password)) {
    $query = "UPDATE utilisateur SET code = :code, usable = :usable WHERE email = :email";

    // Préparer la requête
    $req = $bdd->prepare($query);

    // Exécuter la requete
    $req->execute([
        'code' => hash('sha256', $code),
        'usable' => 1,
        'email' => $_POST["email"]
    ]);

    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $from = "support@stagea.fr";
    $to = $_POST["email"];
    $subject = "Mot de Passe Temporaire";
    $message = "Voici votre mot de passe généré aléatoirement : " . $code . " , utilisez le à la place du mot de passe lors de votre prochaine connexion puis changez le dans votre espace utilisateur";
    $headers = "De :" . $from;
    mail($to, $subject, $message, $headers);
    header("location: ../connexion.php?message=Un mail vous a été envoyé, connectez vous avec le code généré");
    exit();
} else {
    header("location: ../oubli.php?error=Aucun compte n'est associée à cette adresse");
    exit();
}
