<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($game) ? "Modifier" : "Ajouter"; ?> un jeu</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
</head>
<body>

    <h1><?php echo isset($game) ? "Modifier le jeu : " . $game['name'] : "Ajouter un nouveau jeu"; ?></h1>

    <form action="<?php echo isset($game) ? site_url('game/edit/' . $game['id']) : site_url('game/add'); ?>" method="post" enctype="multipart/form-data">

        <?php if (!isset($game)): ?>
            <p>
                <label for="game_image">Poster du jeu (Optionnel, format JPEG) :</label><br>
                <input type="file" name="game_image" id="game_image" accept="image/jpeg">
            </p>
        <?php endif; ?>
    </form>

    <form action="<?php echo isset($game) ? site_url('game/edit/' . $game['id']) : site_url('game/add'); ?>" method="post">

        <p>
            <label for="name">Nom du jeu :</label><br>
            <input type="text" name="name" id="name" value="<?php echo isset($game) ? $game['name'] : ''; ?>" required>
        </p>

        <p>
            <label for="releaseYear">Année de sortie :</label><br>
            <input type="number" name="releaseYear" id="releaseYear" min="0" max="2026" value="<?php echo isset($game) ? $game['releaseYear'] : ''; ?>" required>
        </p>

        <p>
            <label for="price">Prix ($) :</label><br>
            <input type="number" step="0.01" name="price" id="price" value="<?php echo isset($game) ? $game['price'] : ''; ?>" required>
        </p>

        <p>
            <label for="metacritic">Note Metacritic (Optionnel) :</label><br>
            <input type="number" name="metacritic" id="metacritic" min="0" max="100" value="<?php echo isset($game) ? $game['metacritic'] : ''; ?>">
        </p>

        <p>
            <label for="developerId">Développeur / Éditeur :</label><br>
            <select name="developerId" id="developerId" required>
                <option value="">-- Choisir un développeur --</option>
                <?php foreach ($developers as $developer): ?>
                    <option value="<?php echo $developer['id']; ?>" <?php echo (isset($game) && $game['developerId'] == $developer['id']) ? 'selected' : ''; ?>>
                        <?php echo $developer['name']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </p>

        <p>
            <strong>Genres du jeu :</strong><br>
            <?php foreach ($genres as $genre): ?>
                <label>
                    <input type="checkbox" name="genres[]" value="<?php echo $genre['id']; ?>" 
                        <?php echo (in_array($genre['id'], $game_genres)) ? 'checked' : ''; ?>>
                    <?php echo $genre['description']; ?>
                </label><br>
            <?php endforeach; ?>
        </p>

        <p>
            <strong>Catégories du jeu :</strong><br>
            <?php foreach ($categories as $category): ?>
                <label>
                    <input type="checkbox" name="categories[]" value="<?php echo $category['id']; ?>" 
                        <?php echo (in_array($category['id'], $game_categories)) ? 'checked' : ''; ?>>
                    <?php echo $category['description']; ?>
                </label><br>
            <?php endforeach; ?>
        </p>

        <p>
            <label for="shortDescription">Description courte :</label><br>
            <textarea name="shortDescription" id="shortDescription" rows="4" cols="50"><?php echo isset($game) ? $game['shortDescription'] : ''; ?></textarea>
        </p>

        <p>
            <strong>Compatibilité :</strong><br>
            <label>
                <input type="checkbox" name="windows" value="1" <?php echo (isset($game) && $game['windows']) ? 'checked' : ''; ?>> Windows
            </label><br>
            <label>
                <input type="checkbox" name="linux" value="1" <?php echo (isset($game) && $game['linux']) ? 'checked' : ''; ?>> Linux
            </label><br>
            <label>
                <input type="checkbox" name="mac" value="1" <?php echo (isset($game) && $game['mac']) ? 'checked' : ''; ?>> Mac
            </label>
        </p>

        <button type="submit"><?php echo isset($game) ? "Enregistrer les modifications" : "Ajouter le jeu"; ?></button>
    </form>

    <hr>
    <a href="<?php echo site_url('game/index'); ?>">Retour à la liste des jeux</a>

</body>
</html>