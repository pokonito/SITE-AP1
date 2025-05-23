<?php
session_start();

include 'elements/head.php';
include 'elements/header.php';
include 'bdd/bdd.php';

$type = $_SESSION["type"];
$num_eleve = $_SESSION['num'];

if ($type == 1) {
    // Prof : on récupère tous les stages avec le nom/prénom de l'élève (utilisateur type 0)
    $query = "
        SELECT 
            s.num, s.nom, s.adresse, s.cp, s.ville, s.libellestage, s.email,
            t.nom AS tuteur_nom, t.prenom AS tuteur_prenom, t.tel AS tuteur_tel, t.email AS tuteur_email,
            u.nom AS eleve_nom, u.prenom AS eleve_prenom
        FROM stage s
        LEFT JOIN tuteur t ON s.num = t.num
        LEFT JOIN utilisateur u ON s.num_eleve = u.num AND u.type = 0
        ORDER BY u.nom, u.prenom
    ";
    $stmt = $bdd->prepare($query);
    $stmt->execute();
    $stages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    // Élève : on récupère uniquement son stage
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
}
?>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-6">
        <div class="bg-white rounded-lg shadow p-6 max-w-2xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">Informations sur le stage</h2>
            <?php if ($type == 0): ?>
                <?php if ($stage) { ?>
                    <div class="mb-6 border-b pb-4 mb-4">
                        <h3 class="text-lg font-semibold mb-2">Entreprise</h3>
                        <div><b>Nom :</b> <?php echo htmlspecialchars($stage['nom']); ?></div>
                        <div><b>Adresse :</b> <?php echo htmlspecialchars($stage['adresse']); ?></div>
                        <div><b>Code postal :</b> <?php echo htmlspecialchars($stage['cp']); ?></div>
                        <div><b>Ville :</b> <?php echo htmlspecialchars($stage['ville']); ?></div>
                        <div><b>Libellé du stage :</b> <?php echo htmlspecialchars($stage['libellestage']); ?></div>
                        <div><b>Email entreprise :</b> <?php echo htmlspecialchars($stage['email']); ?></div>
                        <h3 class="text-lg font-semibold mt-4 mb-2">Tuteur</h3>
                        <div><b>Nom :</b> <?php echo htmlspecialchars($stage['tuteur_nom']); ?></div>
                        <div><b>Prénom :</b> <?php echo htmlspecialchars($stage['tuteur_prenom']); ?></div>
                        <div><b>Téléphone :</b> <?php echo htmlspecialchars($stage['tuteur_tel']); ?></div>
                        <div><b>Email :</b> <?php echo htmlspecialchars($stage['tuteur_email']); ?></div>
                    </div>
                <?php } else { ?>
                    <div class="text-center text-gray-500">Aucune information de stage trouvée.</div>
                <?php } ?>
            <?php else: ?>
                <?php if ($stages && count($stages) > 0) { ?>
                    <ul class="divide-y divide-gray-200">
                        <?php foreach ($stages as $stage) { ?>
                            <li class="py-3 hover:bg-gray-50 cursor-pointer" onclick="afficherStage(<?php echo $stage['num']; ?>)">
                                <span class="font-semibold"><?php echo htmlspecialchars($stage['eleve_prenom'] . ' ' . $stage['eleve_nom']); ?></span>
                                — <span><?php echo htmlspecialchars($stage['libellestage']); ?></span>
                            </li>
                        <?php } ?>
                    </ul>
                    <!-- Modal pour afficher les détails du stage -->
                    <div id="modalStage" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
                        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md relative">
                            <button type="button" onclick="fermerModal()" class="absolute top-2 right-2 text-gray-500 hover:text-black text-xl">&times;</button>
                            <h3 class="text-xl font-bold mb-4">Détails du stage</h3>
                            <div id="modalStageContent"></div>
                        </div>
                    </div>
                    <script src="js/stage.js"></script>
                <?php } else { ?>
                    <div class="text-center text-gray-500">Aucun stage trouvé.</div>
                <?php } ?>
            <?php endif; ?>
        </div>
    </div>
</body>
<?php include 'elements/footer.php'; ?>

</html>