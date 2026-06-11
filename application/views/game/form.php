<!DOCTYPE html>
<html>
<head>
    <title><?php echo isset($game) ? "Modifier" : "Ajouter"; ?> un jeu</title>
</head>
<body>

    <h1><?php echo isset($game) ? "Modifier le jeu : " . $game['name'] : "Ajouter un nouveau jeu"; ?></h1>

    <form action="<?php echo isset($game) ? site_url('game/edit/' . $game['id']) : site_url('game/add'); ?>" method="post">

        <p>
            <label for="name">Nom du jeu :</label><br>
            <input type="text" name="name" id="name" value="<?php echo isset($game) ? $game['name'] : ''; ?>" required>
        </p>

        <p>
            <label for="releaseYear">Année de sortie :</label><br>
            <input type="number" name="releaseYear" id="releaseYear" value="<?php echo isset($game) ? $game['releaseYear'] : ''; ?>" required>
        </p>

        <p>
            <label for="price">Prix ($) :</label><br>
            <input type="number" step="0.01" name="price" id="price" value="<?php echo isset($game) ? $game['price']/100 : ''; ?>" required>
        </p>

        <p>
            <label for="metacritic">Note Metacritic (Optionnel) :</label><br>
            <input type="number" name="metacritic" id="metacritic" min="0" max="100" value="<?php echo isset($game) ? $game['metacritic'] : ''; ?>">
        </p>

        <p>
            <label for="developerId">ID Développeur (Temporaire) :</label><br>
            <input type="number" name="developerId" id="developerId" value="<?php echo isset($game) ? $game['developerId'] : ''; ?>" required>
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
    <a href="<?php echo site_url('game/index'); ?>">Retour à la liste</a>

</body>
</html>