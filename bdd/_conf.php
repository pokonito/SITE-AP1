<?php 
    $host = $_SERVER['SERVER_NAME'] == 'localhost' ? 'localhost' : 'localhost';
    $name = $_SERVER['SERVER_NAME'] == 'localhost' ? 'projet_iniesta' : 'u937355202_giniestaBDD';
    $user = $_SERVER['SERVER_NAME'] == 'localhost' ? 'root' : 'u937355202_giniesta';
    $mdp = $_SERVER['SERVER_NAME'] == 'localhost' ? '' : 'Ginie3980&';
    $attr = $_SERVER['SERVER_NAME'] == 'localhost' ? [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION] : [];
?>