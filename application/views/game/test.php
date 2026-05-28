<h1>Liste des jeux vidéos</h1>

<?php if (!empty($games)): ?>
    <ul>
        <?php foreach ($games as $game): ?>
            <li>
                <?php echo html_escape($game['name']); ?>
                
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>Aucun jeu trouvé dans la base de données.</p>
<?php endif; ?>