<?php
require_once __DIR__ . '/../../config.inc.php';
// Récupérer les données POST
$t_event  = new Models\t_event;
$parametre = new Models\parametre;
$type = $_POST["type"] ?? 1;
$limit = $_POST["limit"];


$critere["id_type_event"]  =  $parametre->lireCle("CODE_TYPE_TEAMS");

$dataNBR = $t_event->lireParCritere($critere);


$nbr = 4 ;

if ($type == 0) { //precedent
    $limit -= $nbr;
    $remainder = count($dataNBR) % $nbr;
    
    if ($limit < 0) {
        $limit = $remainder != 0 ? count($dataNBR) - $remainder : count($dataNBR);
    }
    if ($limit == count($dataNBR)) {
        $limit = count($dataNBR) -$nbr;
    }
} else { //suivant
    $limit += $nbr;
    
    if (count($dataNBR) <= $limit) {
        $limit = 0;
    }
}


$critere["limit"]  = $limit;
$data = $t_event->lireParCritere($critere);
?>
<input type="hidden" id="txtlimitteam" value="<?= $limit ?>" />
<?php
for ($i = 0; $i < count($data); $i++) {
?>
    <div class="col">
        <div class="card" style="width: 18rem;">
            <?= $data[$i]["photo_event"] ?>
            <div class="card-body">
                <p class="card-text"><?= $data[$i]["titre"] ?></p>
            </div>
        </div>
    </div>
<?php } ?>