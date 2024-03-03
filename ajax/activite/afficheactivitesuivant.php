<?php

use Models\t_event;

require_once __DIR__ . '/../../config.inc.php';

// Récupérer les données POST
$t_event  = new Models\t_event;

$type = $_POST["type"] ?? 1 ;
$limit = $_POST["limit"];

$critere["id_type_event"]  = 3;

$dataNBR = $t_event->lireParCritere($critere);

if ($type == 0) { //precedent
    $limit = $limit - 1;

    if ($limit == -1) {
        $limit = count($dataNBR) - 1 ;
    }
} else { //suivant

    if ($limit < count($dataNBR) - 1) {
        $limit = $limit + 1;
    } else {
        $limit = 0;
    }
}


$critere["limit"]  = $limit;

$data = $t_event->lireParCritere($critere);

$data[0]["limit"] = $limit;





// Encoder les données en JSON
$jsonResponse = json_encode($data[0]);

// Envoyer la réponse JSON
header('Content-Type: application/json');
echo $jsonResponse;
