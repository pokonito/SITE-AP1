<?php
include '_conf.php';

try {
    $bdd = new PDO('mysql:host=' . $host . ';dbname=' . $name, $user, $mdp, $attr);
} catch (Exception $e) {
    die('Erreur PDO : ' . $e->getMessage());
}
?> 
