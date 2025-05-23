<?php
session_start();
include '../bdd/bdd.php';

if ($_SESSION["type"] == 1) {
    $queryCr = 'SELECT * FROM cr order by datetime DESC';
    $req = $bdd->prepare($queryCr);
    $req->execute();
} else {
    $queryCr = 'SELECT * FROM cr WHERE cr.num_utilisateur = :num order by datetime DESC';
    $req = $bdd->prepare($queryCr);
    $req->execute(['num' => $_SESSION['num']]);
}

$results = $req->fetchAll();
$count = count($results);
?>
<div data-count="<?php echo $count; ?>">
    <?php
    if ($results) {
        foreach ($results as $result) {
    ?>
            <div class="bg-white rounded-lg shadow transition hover:shadow-lg p-4 mb-4 border-l-4 border-blue-500">
                <div class="flex flex-col md:flex-row md:items-center">
                    <div class="md:w-9/12">
                        <h5 class="text-lg font-semibold">
                            <a href="#" class="text-blue-600 hover:underline">
                                <?php echo htmlspecialchars($result["description"]); ?>
                            </a>
                        </h5>
                    </div>
                    <div class="mt-2 md:mt-0 md:w-1/12 text-gray-600 text-center">
                        <i class="ion-ios-eye-outline text-xl"></i>
                        <span class="block text-sm"><?php echo $result["vu"]; ?></span>
                    </div>
                    <div class="mt-2 md:mt-0 md:w-1/12 text-gray-600 text-center">
                        <i class="ion-ios-calendar-outline text-xl"></i>
                        <span class="block text-sm"><?php echo $result["date"]; ?></span>
                    </div>
                    <?php
                    if ($result["vu"] == 0 or $_SESSION["type"] == 1) { ?>
                        <div class="mt-2 md:mt-0 md:w-1/12 text-gray-600 text-center relative">
                            <button class="menu-rapport" data-id="<?php echo $result['num']; ?>"
                                data-description="<?php echo htmlspecialchars($result['description'], ENT_QUOTES); ?>"
                                data-date="<?php echo $result['date']; ?>"
                                data-contenu="<?php echo htmlspecialchars($result['contenu'], ENT_QUOTES); ?>"
                                title="Actions">
                                <i class="ion-more text-2xl"></i>
                            </button>
                            <div class="menu-actions hidden absolute right-0 mt-2 w-32 bg-white border rounded shadow z-10">
                                <button class="edit-rapport w-full text-left px-4 py-2 hover:bg-gray-100"
                                    data-id="<?php echo $result['num']; ?>"
                                    data-description="<?php echo htmlspecialchars($result['description'], ENT_QUOTES); ?>"
                                    data-date="<?php echo $result['date']; ?>"
                                    data-contenu="<?php echo htmlspecialchars($result['contenu'], ENT_QUOTES); ?>">
                                    Modifier
                                </button>
                                <button class="delete-rapport w-full text-left px-4 py-2 text-red-600 hover:bg-gray-100"
                                    data-id="<?php echo $result['num']; ?>">
                                    Supprimer
                                </button>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
    <?php
        }
    } else {
        echo '<div class="text-center text-gray-500 py-8">Aucun rapport trouvé.</div>';
    }
    ?>
</div>