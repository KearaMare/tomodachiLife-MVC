<a href="/nouveau">
    <button>Ajouter un habitant</button>
</a>
<?php foreach ($habitants as $habitant): ?>
    <h1><?= $habitant->GetNom() ?></h1>
    <p><?= $habitant->GetId() ?></p>
    <p><?= $habitant->GetHumeur() ?></p>
    <a href="/habitant/<?= $habitant->GetId() ?>"><button>Details</button></a>
<?php endforeach; ?>
