<?php

use Models\t_event;

require_once __DIR__ . '/../../config.inc.php';

// Récupérer les données POST
$t_event  = new Models\t_event;

$type = $_POST["type"];
$limit = $_POST["limit"];

$critere["id_type_event"]  = 3;

if ($type == 0) { //precedent
    $limit = $limit - 1;

    if ($limit == 0) {
        $limit = 0;
    }
} else { //suivant

    $dataNBR = $t_event->lireParCritere($critere);

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
