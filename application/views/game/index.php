<!DOCTYPE html>
<html>
<head>
    <title>Liste des Jeux</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
</head>
<body>

    <h1>Liste des jeux</h1>

    <p>
        <a href="<?php echo site_url('game/add'); ?>">
            ➕ Ajouter un nouveau jeu
        </a>
    </p>

    <form method="GET" action="<?php echo site_url('game/index'); ?>">
        <input type="text" name="search" value="<?php echo $current_search; ?>" placeholder="Rechercher un jeu...">
        <button type="submit">Rechercher</button>
        <a href="<?php echo site_url('game/index'); ?>">Réinitialiser</a>
    </form>
    <br>
    <p>
        Trier par : 
        <a href="<?php echo site_url('game/index?sort=name&order=ASC&search='.$current_search); ?>">Nom (A-Z)</a> | 
        <a href="<?php echo site_url('game/index?sort=releaseYear&order=DESC&search='.$current_search); ?>">Année</a> 
    </p>
    <p>
        <strong>Filtrer par Genre :</strong>
        <?php foreach ($genres as $genre): ?>
            <a href="<?php echo site_url('game/index?genre='.$genre['id']); ?>">
                <?php echo $genre['description']; ?>
            </a> | 
        <?php endforeach; ?>
    </p>
    <p>
        <strong>Filtrer par Catégorie :</strong>
        <?php foreach ($categories as $category): ?>
            <a href="<?php echo site_url('game/index?category=' . $category['id']); ?>">
                <?php echo $category['description']; ?> 
            </a> | 
        <?php endforeach; ?>
    </p>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Année</th>
                <th>Prix</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($games as $game): ?>
                <tr>
                    <td>
                        <strong>
                            <a href="<?php echo site_url('game/detail/'.$game['id']); ?>">
                                <?php echo $game['name']; ?>
                            </a>
                        </strong>
                    </td>
                    
                    <td><?php echo $game['releaseYear']; ?></td>
                    
                    <td class="actions">
                        <a href="<?php echo site_url('game/edit/'.$game['id']); ?>">✏️ Modifier</a>
                        <a href="<?php echo site_url('game/delete/'.$game['id']); ?>" onclick="return confirm('Supprimer définitivement ce jeu ?');">❌ Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>