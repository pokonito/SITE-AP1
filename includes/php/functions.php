<?php 
    function writeLogLine($success, $login)
    {
        // ouverture du fichier (flux)
        $log = fopen('log.txt', 'a+');

        // Création de la ligne à ajouter
        $line = date('Y/m/d - H:i:s') . ' -  Tentative de connexion ' . ($success ? 'réussie' : 'échouée') . ' de : ' . $login . "\r";

        // Ajout de la ligne au fichier ouvert
        fputs($log, $line);

        // Fermeture du fichier ouvert
        fclose($log);
    }
?>