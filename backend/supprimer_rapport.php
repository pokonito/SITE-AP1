<?php
session_start();
include '../bdd/bdd.php';

if (
    !isset($_SESSION['num']) ||
    empty($_POST['id'])
) {
    http_response_code(400);
    exit();
}

$id = intval($_POST['id']);
$num_utilisateur = $_SESSION['num'];

// On supprime seulement si l'utilisateur est propri�taire ou admin
if ($_SESSION["type"] == 1) {
    $query = "DELETE FROM cr WHERE num = :id";
    $params = ['id' => $id];
} else {
    $query = "DELETE FROM cr WHERE num = :id AND num_utilisateur = :num_utilisateur AND vu = 0";
    $params = ['id' => $id, 'num_utilisateur' => $num_utilisateur];
}

$stmt = $bdd->prepare($query);
$ok = $stmt->execute($params);

if ($ok) {
    http_response_code(200);
} else {
    http_response_code(500);
}
