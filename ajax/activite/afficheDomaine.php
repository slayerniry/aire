<?php
require_once __DIR__ . '/../../config.inc.php';
// Récupérer les données POST
$t_event  = new Models\t_event;
$parametre  = new Models\parametre;
$critere["type"]  =  $_POST["type"];
$critere["id_type_event"]  =  $parametre->lireCle("CODE_TYPE_DOMAINES");
$data = $t_event->lireParCritere($critere);
$tabsoustype =   explode("|", $parametre->lireCle("LIST_SOUS_TYPE_EVENT"));
foreach ($tabsoustype as $key => $value) {
    $tabsoustypeDeail[] = explode(":", $value);
}
$typeLib = "";
foreach ($tabsoustypeDeail as $key => $value) {
    if ($critere["type"] == $value[0]) {
        $typeLib = $value[1];
    }
}

if($_POST["type"] == "rech"){
    $bg = "#678ee9";
}else{
    $bg = "#a1b869";
}

?>
<style>
    .accordion-body {
        font-family: 'Nunito';
        font-size: 14pt;
    }
    .accordion-button:not(.collapsed) {
        color: green;
        background-color: white;
    }
</style>
<hr>

<div class="accordion bg-dark" id="accordionPanelsStayOpenExample">
    <?php
    $show = "show";
    foreach ($data as $key => $value) {
    ?>
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-heading<?= $value["id_event"] ?>">
                <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $value["id_event"] ?>" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    <h3><?= $value["titre"] ?></h3>
                </button>
            </h2>
            <div id="panelsStayOpen-collapse<?= $value["id_event"] ?>" class="accordion-collapse collapse <?= $show ?>" aria-labelledby="panelsStayOpen-heading<?= $value["id_event"] ?>">
                <div class="accordion-body ">
                    <div class="row">
                        <div class="col-md-3">
                            <?= $value["photo_event"] ?>
                        </div>
                        <div class="col-md-9 rounded-2 text-white p-2" style="background-color: <?= $bg  ?>;">
                             <h4><?= $value["contenu"] ?></h4> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        //$show = "";
    } ?>
</div>