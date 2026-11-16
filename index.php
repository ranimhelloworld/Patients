<?php
include 'fonctions.php';
$patients = [["id"=>"123456789","nom"=>"Rami","age"=>30,"code_service"=>"DERMA","urgence"=>"VERT"],
            ["id"=>"123456790","nom"=>"Mohamed","age"=>50,"code_service"=>"CARDIO","urgence"=>"ORANGE"],
            ["id"=>"123456791","nom"=>"Aws","age"=>6,"code_service"=>"PEDIATRE","urgence"=>"VERT"],
            ["id"=>"123456792","nom"=>"Houssem","age"=>21,"code_service"=>"DERMA","urgence"=>"VERT"],
            ["id"=>"123456793","nom"=>"Salah","age"=>60,"code_service"=>"CARDIO","urgence"=>"ROUGE"]];

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
    <?php foreach($patients as $p): ?>
        <?php
            $badge = getBadgeService($p['code_service']);
            $urgence = getLibelleUrgence($p['urgence']);
            $facture = calculerFacture($p['age'],$TARIF_BASE_CONSULTATION)
        ?>
        <div>
            <h3><?=$p["nom"]?> (<?=$p["age"]?> ans)</h3><br>
            <div class="<?= $badge['classe'] ?>">
                <?= $badge['libelle'] ?><?= $urgence['urgence'] ?>
            </div><br>
            <h3>Niveau d'urgence: <? $urgence ?></h3><br>
            <h3>Facture estimée :<? $facture ?> </h3>
        
        </div>
    
    <?php endforeach ?>


    
</body>
</html>