<?php
include('../bdd/bdd.php');

// Vérifier l'email
$queryMailVerif = 'SELECT num FROM utilisateur WHERE email = :email';

$req = $bdd->prepare($queryMailVerif);

$req->execute([
    'email' => $_POST['email']
]);

$results = $req->fetchAll();

if ($results) {
    header("location: ../inscription.php?message=Cette adresse mail est déjà utilisée");
    exit();
}

// Vérifier le mot de passe 
if ($_POST["password"] != $_POST["repassword"]) {
    header("location: ../inscription.php?message=Les mots de passes ne correspondent pas");
    exit();
}

$login = strtolower(mb_substr($_POST['prenom'], 0, 1) . strtok($_POST['nom'], " "));

// Requête préparée avec des marqueurs nominatifs
$query = "INSERT INTO utilisateur (nom, prenom, email, login, motdepasse, type) VALUES (:nom,  :prenom, :email, :login, :password, :type)";

// Préparation de la requête
$req = $bdd->prepare($query);

$mdp_hash = hash('sha256', $_POST['password']);

// Exécution de la requête
$result = $req->execute([
    'nom' => $_POST['nom'],
    'prenom' => $_POST['prenom'],
    'email' => $_POST['email'],
    'login' => $login,
    'password' => $mdp_hash,
    'type' => 0
]);


if ($result) {
    header("Location: ../connexion.php");
} else {
    header("Location: ../inscription.php?message=Erreur lors de l'inscription");
}
