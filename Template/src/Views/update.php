<h1>Modifier l'habitant : <?= $habitant->getNom() ?></h1>

<form action="/habitant/update/<?= $habitant->getId() ?>" method="POST">
    
    <div class="form-group">
        <label>Nom de l'habitant :</label>
        <input type="text" name="nom" value="<?= $habitant->getNom() ?>" required>
    </div>

    <div class="form-group">
        <label>Numéro d'appartement :</label>
        <input type="number" name="num_appart" value="<?= $habitant->getNumAppart() ?>">
    </div>

    <div class="form-group">
        <label>Niveau de faim (0-100) :</label>
        <input type="number" name="niveau_faim" min="0" max="100" value="<?= $habitant->getNiveauFaim() ?>">
    </div>

    <div class="form-group">
        <label>Argent généré :</label>
        <input type="number" name="argent_genere" value="<?= $habitant->getArgentGen() ?>">
    </div>

    <div class="form-group">
        <label>Humeur :</label>
        <select name="humeur">
            <option value="Neutre" <?= $habitant->getHumeur() == 'Neutre' ? 'selected' : '' ?>>Neutre</option>
            <option value="Heureux" <?= $habitant->getHumeur() == 'Heureux' ? 'selected' : '' ?>>Heureux</option>
            <option value="Triste" <?= $habitant->getHumeur() == 'Triste' ? 'selected' : '' ?>>Triste</option>
        </select>
    </div>

    <div class="form-group">
        <label>URL de l'image :</label>
        <input type="url" name="image_url" value="<?= $habitant->getImageUrl() ?>">
    </div>

    <br>
    <button type="submit" style="background-color: green; color: white;">Enregistrer tous les changements</button>
</form>

<hr>
<a href="/habitant/<?= $habitant->getId() ?>"><button type="button">Annuler</button></a>
<a href="/"><button type="button">Retour à l'immeuble</button></a>