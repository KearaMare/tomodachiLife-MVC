<h1><?= $habitant->getNom() ?></h1>
<p>ID : <?= $habitant->getId() ?></p>
<p>Humeur : <?= $habitant->getHumeur() ?></p>

<a href="/habitant/edit/<?= $habitant->getId() ?>">
    <button type="button" style="background-color: orange;">Modifier l'habitant</button>
</a>

<a href="/"><button type="button">Retour à l'immeuble</button></a>