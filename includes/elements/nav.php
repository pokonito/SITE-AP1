<?php
// Définition des éléments de navigation avec leurs liens et identifiants de page
$navItems = [
    'Accueil' => ['link' => 'accueil', 'page' => 'accueil'],
    'Mon stage' => ['link' => 'stage', 'page' => 'stage'],
    'Mes rapports' => ['link' => 'rapports', 'page' => 'rapports'],
    'Mon compte' => ['link' => 'compte', 'page' => 'compte']
];

// Nom de la page actuelle (sans extension .php)
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
if ($currentPage === 'index' || $currentPage === '') {
    $currentPage = 'index';
}
?>

<ul class="flex justify-center space-x-4 py-4 bg-gray-700 text-white">
    <?php foreach ($navItems as $name => $item): ?>
    <li>
        <a class="text-lg font-medium transition <?php echo ($item['page'] === $currentPage) ? 'text-yellow-400' : 'text-gray-300 hover:text-yellow-400'; ?>"
            href="<?php echo $item['link'] ? htmlspecialchars($item['link'] . ".php") : '#'; ?>">
            <?php echo htmlspecialchars($name); ?>
        </a>
    </li>
    <?php endforeach; ?>
</ul>