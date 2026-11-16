<?php
include 'fonctions.php';
$patients = [
    ["id" => "123456789", "nom" => "Rami", "age" => 30, "code_service" => "DERMA", "urgence" => "VERT"],
    ["id" => "123456790", "nom" => "Mohamed", "age" => 50, "code_service" => "CARDIO", "urgence" => "ORANGE"],
    ["id" => "123456791", "nom" => "Aws", "age" => 6, "code_service" => "PEDIATRE", "urgence" => "VERT"],
    ["id" => "123456792", "nom" => "Houssem", "age" => 21, "code_service" => "DERMA", "urgence" => "VERT"],
    ["id" => "123456793", "nom" => "Salah", "age" => 70, "code_service" => "CARDIO", "urgence" => "ROUGE"]
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h2>Liste des patients</h2>
    <?php foreach ($patients as $p): ?>
        <?php
        $badge = getBadgeService($p['code_service']);
        $urgence = getLibelleUrgence($p['urgence']);

        ?>
        <div>
            <h3><?= $p["nom"] ?> (<?= $p["age"] ?> ans)</h3><br>
            <div class="<?= $badge['classe'] ?>">
                <?= $badge['libelle'] ?>
            </div><br>
            <h3>Niveau d'urgence: <?= $urgence['urgence'] ?></h3><br>
            <h3>Facture estimée : <?= calculerFacture($p['age'], $TARIF_BASE_CONSULTATION) ?> </h3>

        </div>

    <?php endforeach ?>
</div>
    <section class="recapitulatif">
            <h2>Récapitulatif</h2>
            
            <p><strong>Nombre total de patients :</strong> <?= count($patients) ?></p>
            
            <h3>Urgences Absolue(ROUGE) :</h3>
            <ul>
                <?php foreach ($patients as $p): ?>
                    <?php if ($p['urgence'] === 'ROUGE'): ?>
                        <?php $urgence = getLibelleUrgence($p['urgence']); ?>
                        <li><?= $p['nom'] ?> - <?= $urgence['urgence'] ?></li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
    </section>
</body>

</html>