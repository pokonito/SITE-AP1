<?php
session_start();
header('Content-Type: application/json');
include '../bdd/bdd.php';

if ($_SESSION["type"] == 1 && isset($_GET['num'])) {
    $query = "
        SELECT 
            s.nom, s.adresse, s.cp, s.ville, s.libellestage, s.email,
            t.nom AS tuteur_nom, t.prenom AS tuteur_prenom, t.tel AS tuteur_tel, t.email AS tuteur_email
        FROM stage s
        LEFT JOIN tuteur t ON s.num = t.num
        WHERE s.num = :num
        LIMIT 1
    ";
    $stmt = $bdd->prepare($query);
    $stmt->execute(['num' => $_GET['num']]);
    $stage = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($stage ?: []);
} else if ($_SESSION["type"] == 0) {
    // Élève : ne peut voir que son propre stage
    $num_eleve = $_SESSION['num'];
    $query = "
        SELECT 
            s.nom, s.adresse, s.cp, s.ville, s.libellestage, s.email,
            t.nom AS tuteur_nom, t.prenom AS tuteur_prenom, t.tel AS tuteur_tel, t.email AS tuteur_email
        FROM stage s
        LEFT JOIN tuteur t ON s.num = t.num
        WHERE s.num_eleve = :num_eleve
        LIMIT 1
    ";
    $stmt = $bdd->prepare($query);
    $stmt->execute(['num_eleve' => $num_eleve]);
    $stage = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($stage ?: []);
} else {
    echo json_encode([]);
}
