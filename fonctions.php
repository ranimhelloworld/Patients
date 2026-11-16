<?php
include 'config.php';
function calculerFacture(int $age, int $TARIF_BASE_CONSULTATION)
{
    if($age > 65){
        $TARIF_BASE_CONSULTATION = $TARIF_BASE_CONSULTATION * 1.20;
    }
    return $TARIF_BASE_CONSULTATION;
}

function getBadgeService(string $code):array{
    switch ($code) {
        case 'CARDIO':
            return ['libelle' => 'Cardiologie', 'classe' => 'badge-cardio'];
        case 'DERMA':
            return ['libelle' => 'Dermatologie', 'classe' => 'badge-derma'];
        case 'PEDIATRE':
            return ['libelle' => 'Pédiatrie', 'classe' => 'badge-pediatre'];
        default:
            return ['libelle' => 'Inconnue', 'classe' => 'badge-inconnu'];
    }
}

function getLibelleUrgence(string $lib):array{
    switch ($lib) {
        case 'ROUGE':
            return ['urgence' => 'urgence absolue'];
        case 'ORANGE':
            return ['urgence' => 'urgence relative'];
        case 'VERT':
            return ['urgence' => 'urgence standard'];
        default:
            return ['urgence' => 'Inconnue'];
    }
}
function filtrerUrgences(array $patients): array
{
    return array_filter($patients, fn(array $patients) : bool => ($patients['urgence']) === 'ROUGE');
}


?>
