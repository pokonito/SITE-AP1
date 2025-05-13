<footer style="position: fixed; left: 0; bottom: 0; width: 100%;">  
    <section class="container text-center">
        &copy; 2024 Guillaume Iniesta
        <?php 
            if (ISSET($_SESSION["login"])) {
                echo '<a style="text-decoration:none; color: #FFFFFF;" href="deconnexion.php">Déconnexion</a>';
            }
        ?>
    </section>     
</footer>