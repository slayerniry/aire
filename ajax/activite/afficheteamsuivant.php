<?php
require_once __DIR__ . '/../../config.inc.php';
// Récupérer les données POST
$t_event  = new Models\t_event;
$parametre = new Models\parametre;
$type = $_POST["type"] ?? 1;
$limit = $_POST["limit"];


$critere["id_type_event"]  =  $parametre->lireCle("CODE_TYPE_TEAMS");

$dataNBR = $t_event->lireParCritere($critere);


$nbr = 4;

if ($type == 0) { //precedent
    $limit -= $nbr;
    $remainder = count($dataNBR) % $nbr;

    if ($limit < 0) {
        $limit = $remainder != 0 ? count($dataNBR) - $remainder : count($dataNBR);
    }
    if ($limit == count($dataNBR)) {
        $limit = count($dataNBR) - $nbr;
    }
} else { //suivant
    $limit += $nbr;

    if (count($dataNBR) <= $limit) {
        $limit = 0;
    }
}

$critere['limitNBR'] = 4;
$critere["limit"]  = $limit;
$data = $t_event->lireParCritere($critere);
?>
<style>
    .clickable:hover {
        filter: grayscale(100%);
        transition: filter 0.3s ease;

    }
</style>
<input type="hidden" id="txtlimitteam" value="<?= $limit ?>" />
<?php
for ($i = 0; $i < count($data); $i++) {
?>
    <div class="col">
        <div class="card" style="width: 18rem;">
            <div type="button" class="clickable  animate__animated animate__fadeInRight" data-bs-toggle="modal" data-bs-target="#modalteam">
                <?= $data[$i]["photo_event"] ?>
            </div>
            <div class="card-body">
                <p class="card-text">
                <h3 class="text-center"><?= $data[$i]["titre"] ?></h3>
                </p>
            </div>
            <span style="display: none;">
                <?= $data[$i]["contenu"] ?>
            </span>
        </div>
    </div>
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('.clickable').click(function() {
            // Get the source of the clicked image
            var src = $(this).find('.photo_team').attr("src");

            var titre = $(this).parent().find('h3').html();
            var contenu = $(this).parent().find('span').html();

            $('#titre_deail').html(titre);
            $('#contenu_detail').html(contenu);
            $('#img_detail').attr('src', src);

        });
    });
</script>