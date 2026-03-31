<?php ob_start(); ?>


<a href="/nouveau">
    <button>Ajouter un habitant</button>
</a>
<?php foreach ($habitants as $habitant): ?>
    <h1><?= $habitant->GetNom() ?></h1>
    <p><?= $habitant->GetId() ?></p>
    <p><?= $habitant->GetHumeur() ?></p>
    <a href="/habitant/<?= $habitant->GetId() ?>"><button>Details</button></a>
<?php endforeach; ?>

<?php
// On nettoie les anciennes données après l'affichage
unset($_SESSION['old']);

$content = ob_get_clean(); // Capture le contenu du tampon
require VIEWS . 'layout.php'; // Injecte dans le layout
?>