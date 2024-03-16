<?php
$parametre  = new Models\parametre;
?>
<div class="container" id="divcontact">
    <footer class="py-5">
        <div class="row">
            <div class="col-6 col-md-2 mb-3">
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="#divaccueil" class="nav-link p-0 text-muted"><?= _getText("menu.accueil") ?></a></li>
                    <li class="nav-item mb-2"><a href="#divapropos" class="nav-link p-0 text-muted"><?= _getText("a.propos") ?></a></li>
                    <li class="nav-item mb-2"><a href="#divactivite" class="nav-link p-0 text-muted"><?= _getText("activites") ?></a></li>
                    <li class="nav-item mb-2"><a href="#divactivite" class="nav-link p-0 text-muted"><?= _getText("activites") ?></a></li>
                    <li class="nav-item mb-2"><a href="#divcontact" class="nav-link p-0 text-muted"><?= _getText("menu.contact") ?></a></li>
                </ul>
            </div>
            <div class="col-6 col-md-2 mb-3">
            </div>
            <div class="col-6 col-md-2 mb-3">
            </div>
            <div class="col-md-5 offset-md-1 mb-3">
                <ul class="nav   list-unstyled d-flex">
                    <?php
                    $reseaux = [
                        "twitter" => ["icon" => "bi-twitter"],
                        "facebook" => ["icon" => "bi-facebook"],
                        "linkedin" => ["icon" => "bi-linkedin"],
                        "discord" => ["icon" => "bi-discord"],
                        "google" => ["icon" => "bi-google"],
                        "mailbox" => ["icon" => "bi-mailbox", "link_type" => "mailto"],
                        "instagram" => ["icon" => "bi-instagram"],
                        "phone" => ["icon" => "bi-telephone-fill", "link_type" => "tel"]
                    ];
                    foreach ($reseaux as $key => $value) {
                        $adresse = trim($parametre->lireCle("ADRESSE_" . strtoupper($key)));
                        $target = "";
                        if ($adresse != "") {
                            if ($value["link_type"]  == "tel") {
                                $href = "tel:$adresse";
                            } elseif ($value["link_type"] == "mailto") {
                                $href = "mailto:$adresse";
                                $target = 'target="_blank"';
                            } else {
                                $href = $adresse;
                                $target = 'target="_blank"';
                            }
                    ?>
                            <li class="display-6 ms-3">
                                <a data-toggle="tooltip" title="<?= $key . ":" . $href ?>" <?= $target ?> class="text-muted" href="<?= $href  ?>">
                                    <i class="<?= $value["icon"] ?>"></i>
                                </a>
                            </li>
                    <?php
                        }
                    }
                    ?>
                </ul>
                <h4><?= _getText("menu.contact") ?></h4>
                <ul>
                    <?php
                    $reseaux = [
                        "mailbox" => ["icon" => "bi-mailbox", "link_type" => ""],
                        "phone" => ["icon" => "bi-telephone-fill", "link_type" => ""],
                        "local" => ["icon" => "bi-home"],
                        "autre" => ["icon" => "bi-autre"],
                    ];
                    foreach ($reseaux as $key => $value) {
                        $adresse = trim($parametre->lireCle("ADRESSE_" . strtoupper($key)));
                        if ($adresse != "") {
                            $icon = "";
                            switch ($value["icon"]) {
                                case "bi-mailbox":
                                    $icon = "Mailbox";
                                    break;
                                case "bi-telephone-fill":
                                    $icon = "Phone";
                                    break;
                                case "bi-home":
                                    $icon = "Adresse";
                                    break;
                                default:
                                    $icon = ""; // ou une valeur par défaut
                                    break;
                            }
                            // Afficher l'adresse avec l'icône correspondante
                            echo "<li><h5><b>$icon</b> $adresse</h5></li>";
                        }
                    }
                    ?>
                </ul>
            </div>
        </div>
        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
            <span class="display-6  mb-3 mb-md-0 text-muted"><?= _getText("aire.company") ?></span>
        </div>
    </footer>
</div>
</body>
</html>
<script>
    jQuery(document).ready(function($) {});
</script>
<script>
    new WOW().init();
</script>