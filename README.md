# Gestion de jeux vidéo

Site web PHP de consultation et de gestion d'un catalogue de jeux vidéo (données de type Steam), construit avec le framework **CodeIgniter 3** et une base **MariaDB**.

Projet réalisé pour la **SAÉ R3.01** du BUT Informatique (IUT de Fontainebleau), groupe 4.

**Auteur :** Ildevert Nkouka

**Démo :** https://dwarves.iut-fbleau.fr/~nkouka/ (accessible depuis le réseau de l'IUT)

## Fonctionnalités

- **Liste des jeux** avec recherche par nom, tri par nom ou année de sortie (croissant / décroissant)
- **Filtres** par genre ou par catégorie (multijoueur, succès Steam, etc.)
- **Fiche détaillée** d'un jeu : affiche, développeur, prix, note Metacritic, description, genres, catégories et plateformes (Windows, Linux, Mac)
- **Ajout, modification et suppression** d'un jeu, avec choix du développeur, des genres et des catégories

## Technologies

- PHP avec CodeIgniter 3 (architecture MVC)
- MariaDB / MySQL, requêtes SQL écrites à la main
- HTML / CSS

## Installation

1. Copier le projet dans le dossier web d'un serveur Apache avec PHP (par exemple `public_html/` ou `/var/www/html/`).
2. Importer la base de données :
   ```bash
   gunzip -c game.sql.gz | mysql -u <utilisateur> -p <base>
   ```
3. Renseigner l'accès à la base dans `application/config/database.php` (`hostname`, `username`, `password`, `database`).
4. Adapter `base_url` dans `application/config/config.php` au chemin du site (par exemple `/~utilisateur/app_gestion_jeux/`).
5. Ouvrir le site dans le navigateur : la page d'accueil est la liste des jeux.

## Base de données

| Table | Contenu |
|---|---|
| `game` | Jeux (nom, année, prix en centimes, Metacritic, description, plateformes) |
| `developer` | Développeurs |
| `genre`, `game_genre` | Genres et liaison jeu ↔ genre |
| `category`, `game_category` | Catégories et liaison jeu ↔ catégorie |
| `poster` | Affiches des jeux (images JPEG stockées en binaire) |

## Organisation du code

| Fichier | Rôle |
|---|---|
| `application/controllers/Game.php` | Contrôleur : liste, détail, ajout, modification, suppression |
| `application/models/Game_model.php` | Accès à la base de données |
| `application/views/game/` | Vues : `index.php` (liste), `details.php` (fiche), `form.php` (ajout / modification) |
| `css/style.css` | Feuille de style |
| `JOURNAL.md` | Journal de bord des séances |

## Limites connues

- L'envoi d'une affiche lors de l'ajout d'un jeu n'est pas encore fonctionnel (voir `JOURNAL.md`, séance 4).
