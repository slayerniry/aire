<?php
require_once __DIR__ . '/../../config.inc.php';
// Récupérer les données POST
$t_event  = new Models\t_event;
$parametre = new Models\parametre ;
$type = $_POST["type"] ?? 1 ;
$limit = $_POST["limit"];
$critere["id_type_event"]  =  $parametre->lireCle("CODE_TYPE_ACTIVITES") ;
$dataNBR = $t_event->lireParCritere($critere);
if ($type == 0) { //precedent
    $limit = ($limit - 1 == -1) ? count($dataNBR) - 1 : $limit - 1;
} else { //suivant
    $limit = ($limit < count($dataNBR) - 1) ? $limit + 1 : 0;
}
$critere['limitNBR'] = 1 ;
$critere["limit"]  = $limit;
$data = $t_event->lireParCritere($critere);
$data[0]["limit"] = $limit;
// Encoder les données en JSON
$jsonResponse = json_encode($data[0]);
// Envoyer la réponse JSON
header('Content-Type: application/json');
echo $jsonResponse;
