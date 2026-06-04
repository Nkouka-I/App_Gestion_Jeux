<!DOCTYPE html>
<html>
<head>
    <title>Détails de <?php echo $game['name']; ?></title>
</head>
<body>

    <h1><?php echo $game['name']; ?></h1>
    <p><strong>Année de sortie :</strong> <?php echo $game['releaseYear']; ?></p>
    <p><strong>Prix :</strong> <?php echo $game['price']/100; ?> $</p>
    <?php if ($game['metacritic'] !== NULL): ?>
        <p><strong>Note Metacritic :</strong> <?php echo $game['metacritic']; ?>/100</p>
    <?php endif; ?>
    <p><strong>Développeur :</strong> <?php echo $game['developer_name']; ?></p>

    <p><strong>Description du jeu :</strong><?php echo $game['shortDescription']; ?></p>

    <p><strong>Compatibilité :</strong></p>
    <ul>
        <li>Windows : <?php echo ($game['windows']) ? 'Oui' : 'Non'; ?></li>
        <li>Linux : <?php echo ($game['linux']) ? 'Oui' : 'Non'; ?></li>
        <li>Mac : <?php echo ($game['mac']) ? 'Oui' : 'Non'; ?></li>
    </ul>

    <hr>
    <a href="<?php echo site_url('game/index'); ?>">Retour à la liste des jeux</a>

</body>
</html>