<?php

$parametre  = new Models\parametre;

?>
<div class="container" id="divcontact">
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <div class="col-md-4 d-flex align-items-center">

            <span class="display-6  mb-3 mb-md-0 text-muted"><?= _getText("aire.company") ?></span>
        </div>

        <ul class="nav col-md-7 justify-content-end list-unstyled d-flex">

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
                        <a data-toggle="tooltip" title="<?= $key ?>"  <?=  $target ?>  class="text-muted"  href="<?= $href ?>">
                            <i class="<?= $value["icon"] ?>"></i>
                        </a>
                    </li>
            <?php
                }
            }
            ?>






        </ul>
    </footer>
</div>
<script>
    jQuery(document).ready(function($) {

    });
</script>

<script>
    // Initialize Wow.js
    new WOW().init();
</script>