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

    <form method="GET" action="<?php echo site_url('game/index'); ?>" class="filter-bar">
    
        <input type="text" name="search" placeholder="Rechercher un jeu..." value="<?php echo $current_search; ?>">

        <select name="sort">
            <option value="name" <?php echo ($current_sort == 'name') ? 'selected' : ''; ?>>Nom</option>
            <option value="releaseYear" <?php echo ($current_sort == 'releaseYear') ? 'selected' : ''; ?>>Année de sortie</option>
        </select>

        <select name="order">
            <option value="ASC" <?php echo ($current_order == 'ASC') ? 'select' : ''; ?>>Croissant (A-Z / 0-9)</option>
            <option value="DESC" <?php echo ($current_order == 'DESC') ? 'select' : ''; ?>>Décroissant (Z-A / 9-0)</option>
        </select>

        <button type="submit">Filtrer</button>
        
        <a href="<?php echo site_url('game/index'); ?>" class="btn-clear">Réinitialiser</a>
    </form>

    <br>

    <form method="GET" action="<?php echo site_url('game/index'); ?>">
        <input type="hidden" name="search" value="<?php echo $current_search; ?>">
        
        <label for="category_select"><strong>Filtrer par Catégorie :</strong></label>
        <select name="category" id="category_select" onchange="this.form.submit()">
            <option value="">--  --</option>
            <?php foreach ($categories as $categorie): ?>
                <option value="<?php echo $categorie['id']; ?>" <?php echo ($this->input->get('category') == $categorie['id']) ? 'selected' : ''; ?>>
                    <?php echo $categorie['description']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>
    
    <form method="GET" action="<?php echo site_url('game/index'); ?>">
        <input type="hidden" name="search" value="<?php echo $current_search; ?>">
        
        <label for="genre_select"><strong>Filtrer par Genre :</strong></label>
        <select name="genre" id="genre_select" onchange="this.form.submit()">
            <option value="">--  --</option>
            <?php foreach ($genres as $genre): ?>
                <option value="<?php echo $genre['id']; ?>" <?php echo ($this->input->get('genre') == $genre['id']) ? 'selected' : ''; ?>>
                    <?php echo $genre['description']; ?>
                </option>
            <?php endforeach; ?>
        </select>
    </form>

    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Année</th>
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