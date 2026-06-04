<!DOCTYPE html>
<html>
<head>
    <title>Liste des Jeux</title>
</head>
<body>

    <h1>Liste des jeux</h1>

    <form method="GET" action="<?php echo site_url('game/index'); ?>">
        <input type="text" name="search" value="<?php echo $current_search; ?>">
        <button type="submit">Rechercher</button>
    </form>

    <p>
        Trier par : 
        <a href="<?php echo site_url('game/index?sort=name&order=ASC&search=' . $current_search); ?>">Nom (A-Z)</a> | 
        <a href="<?php echo site_url('game/index?sort=releaseYear&order=DESC&search=' . $current_search); ?>">Année</a>
    </p>

    <ul>
        <?php foreach ($games as $game): ?>
            <li>
                <strong><?php echo $game['name']; ?></strong> 
                (<?php echo $game['releaseYear']; ?>)          
                <br>
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>