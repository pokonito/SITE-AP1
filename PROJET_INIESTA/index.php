<?php session_status() === PHP_SESSION_ACTIVE ?: session_start(); ?>
<?php 
    if (ISSET($_SESSION["login"])) { 
        include 'accueil.php';
    } else {
        header("location: connexion.php");
        exit();	
    } 
?>   