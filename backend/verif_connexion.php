<?php
include('../bdd/bdd.php');
include('../php/functions.php');

$loginType = "";

if (filter_var($_POST['login'], FILTER_VALIDATE_EMAIL)) {
    $loginType = "email";
}

// Ecrire la requete SELECT à trous
if ($loginType == "email") {
    $query = "SELECT * FROM utilisateur WHERE email = :login AND motdepasse = :password";
} else {
    $query = "SELECT * FROM utilisateur WHERE login = :login AND motdepasse = :password";
}

// Préparer la requête
$req = $bdd->prepare($query);

// Exécuter la requete
$mdp_hash = hash('sha256', $_POST['password']);

$req->execute([
    'login' => $_POST['login'],
    'password' => $mdp_hash
]);

//Récupérer les résultats dans un tableau $result
$result = $req->fetch(PDO::FETCH_ASSOC);

if ($result) {
    $query = "UPDATE utilisateur SET usable = 0 WHERE num = :num";
    $req = $bdd->prepare($query);
    $req->execute([
        'num' => $result['num']
    ]);
    session_status() === PHP_SESSION_ACTIVE ?: session_start();
    $_SESSION['num'] = $result['num'];
    $_SESSION['nom'] = $result['nom'];
    $_SESSION['prenom'] = $result['prenom'];
    $_SESSION['email'] = $result['email'];
    $_SESSION['login'] = $result['login'];
    $_SESSION['type'] = $result['type'];
    $_SESSION['usable'] = $result['usable'];
    header("location: ../index.php");
    writeLogLine(true, $_POST['login']);
    exit();
} else {
    header("location: ../connexion.php?message=Identifiant ou mot de passe incorrect");
    writeLogLine(false, $_POST['login']);
    exit();
}
