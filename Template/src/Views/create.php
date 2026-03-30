<?php ob_start(); ?>

<section class="container">
    <h1><i class="fas fa-plus-circle"></i> Créer un nouvel habitant</h1>

    <form action="/create" method="POST">
        
        <div class="form-group">
            <label>Nom de l'habitant :</label>
            <input type="text" name="nom" value="<?= $_SESSION['old']['nom'] ?? '' ?>" required>
        </div>

        <div class="form-group">
            <label>Numéro d'appartement :</label>
            <input type="number" name="num_appart" value="<?= $_SESSION['old']['num_appart'] ?? '' ?>">
        </div>

        <div class="form-group">
            <label>Niveau de faim (0-100) :</label>
            <input type="number" name="niveau_faim" min="0" max="100" value="50"> </div>

        <div class="form-group">
            <label>Argent généré :</label>
            <input type="number" name="argent_genere" value="0">
        </div>

        <div class="form-group">
            <label>Humeur :</label>
            <select name="humeur">
                <option value="Neutre">Neutre</option>
                <option value="Heureux">Heureux</option>
                <option value="Triste">Triste</option>
            </select>
        </div>

        <div class="form-group">
            <label>URL de l'image :</label>
            <input type="url" name="image_url" placeholder="https://..." value="<?= $_SESSION['old']['image_url'] ?? '' ?>">
        </div>

        <br>
        <button type="submit" style="background-color: #28a745; color: white; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer;">
            Créer l'habitant
        </button>
    </form>

    <hr>
    <a href="/"><button type="button">Annuler et retourner à l'immeuble</button></a>
</section>

<?php
// On nettoie les anciennes données après l'affichage
unset($_SESSION['old']);

$content = ob_get_clean(); // Capture le contenu du tampon
require VIEWS . 'layout.php'; // Injecte dans le layout
?>