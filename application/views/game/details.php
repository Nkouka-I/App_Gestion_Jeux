<!DOCTYPE html>
<html>
<head>
    <title>Détails de <?php echo $game['name']; ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
</head>
<body>

    <h1><?php echo $game['name']; ?></h1>

    <?php if (!empty($game['game_image'])): ?>
        <div class="game-poster">
            <img src="data:image/jpeg;base64,<?php echo base64_encode($game['game_image']); ?>" alt="Poster de <?php echo $game['name']; ?>" style="max-width: 300px; height: auto; border-radius: 8px;">
        </div>
    <?php else: ?>
        <p><em>Aucune image disponible pour ce jeu.</em></p>
    <?php endif; ?>

    <p><strong>Année de sortie :</strong> <?php echo $game['releaseYear']; ?></p>

    <p><strong>Prix :</strong> <?php echo $game['price']/100; ?> $</p>

    <?php if ($game['metacritic'] !== NULL): ?>
        <p><strong>Note Metacritic :</strong> <?php echo $game['metacritic']; ?>/100</p>
    <?php endif; ?>
    
    <p><strong>Développeur :</strong> <?php echo $game['developer_name']; ?></p>

    <p>
        <strong>Genres :</strong>
        <?php if (!empty($game_genres)): ?>
            <?php foreach ($game_genres as $genre): ?>
                <a href="<?php echo site_url('game/index?genre=' . $genre['id']); ?>">
                    <?php echo $genre['description']; ?>
                </a> | 
            <?php endforeach; ?>
        <?php else: ?>
            <em>Aucun genre associé</em>
        <?php endif; ?>
    </p>

    <p>
        <strong>Catégories :</strong>
        <?php if (!empty($game_categories)): ?>
            <?php foreach ($game_categories as $category): ?>
                <a href="<?php echo site_url('game/index?category=' . $category['id']); ?>">
                    <?php echo $category['description']; ?>
                </a> | 
            <?php endforeach; ?>
        <?php else: ?>
            <em>Aucune catégorie associée</em>
        <?php endif; ?>
    </p>

    <p><strong>Description :</strong><?php echo $game['shortDescription']; ?></p>

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