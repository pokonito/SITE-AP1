<?php
session_start();
include '../bdd/bdd.php';

if (
    !isset($_SESSION['num']) ||
    empty($_POST['description']) ||
    empty($_POST['date_rapport']) ||
    empty($_POST['contenu'])
) {
    http_response_code(400);
    exit();
}

$description = trim($_POST['description']);
$date_rapport = $_POST['date_rapport'];
$contenu = trim($_POST['contenu']);
$num_utilisateur = $_SESSION['num'];

// Récupérer l'id du stage de l'élève connecté
$stageQuery = $bdd->prepare("SELECT num FROM stage WHERE num_eleve = :num_eleve LIMIT 1");
$stageQuery->execute(['num_eleve' => $num_utilisateur]);
$stage = $stageQuery->fetch();
$num_stage = $stage ? $stage['num'] : null;

if (!$num_stage) {
    http_response_code(400);
    exit();
}

$query = "INSERT INTO cr (description, date, contenu, num_utilisateur, num_stage, datetime, vu)
          VALUES (:description, :date_rapport, :contenu, :num_utilisateur, :num_stage, NOW(), 0)";
$stmt = $bdd->prepare($query);
$ok = $stmt->execute([
    'description' => $description,
    'date_rapport' => $date_rapport,
    'contenu' => $contenu,
    'num_utilisateur' => $num_utilisateur,
    'num_stage' => $num_stage
]);

if ($ok) {
    http_response_code(200);
} else {
    http_response_code(500);
}
