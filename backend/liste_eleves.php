<?php
session_start();
include '../bdd/bdd.php';

$query = 'SELECT * FROM utilisateur where type = 0';
$req = $bdd->prepare($query);
$req->execute();
$results = $req->fetchAll();
$count = count($results);
?>
<div data-count="<?php echo $count; ?>">
    <?php
    if ($results) {
        foreach ($results as $eleve) {
    ?>
            <div class="bg-white rounded-lg shadow p-4 mb-4 cursor-pointer hover:bg-blue-50 eleve-item"
                data-nom="<?php echo htmlspecialchars($eleve['nom']); ?>"
                data-prenom="<?php echo htmlspecialchars($eleve['prenom']); ?>"
                data-email="<?php echo htmlspecialchars($eleve['email']); ?>"
                data-id="<?php echo $eleve['num']; ?>">
                <div class="flex items-center justify-between">
                    <div>
                        <span class="font-semibold"><?php echo htmlspecialchars($eleve['prenom'] . ' ' . $eleve['nom']); ?></span>
                    </div>
                    <div class="text-gray-500 text-sm"><?php echo htmlspecialchars($eleve['email']); ?></div>
                </div>
            </div>
    <?php
        }
    } else {
        echo '<div class="text-center text-gray-500 py-8">Aucun élève trouvé.</div>';
    }
    ?>
</div>