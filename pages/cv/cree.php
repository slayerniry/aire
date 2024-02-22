<?php

require_once __DIR__ . '/../header.php';

$langue = new Models\t_langue;
$t_cv_consultant = new Models\t_cv_consultant;
$t_diplome = new Models\t_diplome;
$t_experience = new Models\t_experience;

$tabLangue =  $langue->lireParCritere(array());

$critereCV["id_consultant"] =  $_SESSION["id_consultant"]  ?? 0;

$tabCv = $t_cv_consultant->lireParCritere($critereCV);

$tabDiplome = array();
$tabExperience = array();


if ($critereCV["id_consultant"]  > 0) {
    $tabCv = $tabCv[0];

    $tabDiplome = $t_diplome->lireParCritere($critereCV);

    $tabExperience = $t_experience->lireParCritere($critereCV);
}



$disabled = "";
$activeLogin = "active";
$activeCV = "";
if (isset($_SESSION["id_consultant"])) {
    $disabled = "disabled";
    $activeCV  = "active";

    $activeLogin = "";
} ?>

<style>
    .select2-container {
        width: 100% !important;
    }

    #myTab .nav-link {
        background-color: #adc1ff !important;
        color: #21215D;
        width: 200px;

    }



    /*profile-tab*/

    #myTab .nav-link.active {
        background-color: #d6e0ff !important;
        color: #21215D;
        font-weight: bold;
        font-style: italic;
    }


    #myTab .nav-link:hover {
        background-color: #21215D !important;
        color: white;

    }

    #myTabs .nav-link {
        background-color: azure !important;
        color: #21215D;

    }

    #myTabs .nav-link:hover {
        background-color: #21215D !important;
        color: white;

    }

    #myTabs .nav-link.active {
        background-color: transparent !important;
        color: #21215D;
        font-weight: bold;
        font-style: italic;
    }

    h4 {
        box-shadow: -16px 17px 12px -4px rgba(173, 193, 255, 0.8);
        -webkit-box-shadow: -16px 17px 12px -4px rgba(173, 193, 255, 0.8);
        -moz-box-shadow: -16px 17px 12px -4px rgba(173, 193, 255, 0.8);

        padding: 20px 20px 20px 20px;
        background-color: white;

        border-radius: 20px 20px 20px 20px;
        -webkit-border-radius: 20px 20px 20px 20px;
        -moz-border-radius: 20px 20px 20px 20px;

        color: #21215D;
    }
</style>

<div class="container">
    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane <?= $activeLogin ?>" id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <br>
                    <form id="formLogin" method="POST" action="<?= HTTP_EXEC_CV ?>login.php" class="needs-validation">


                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <center>
                                    <i style="font-size: 60px;" class="bi bi-person-square"></i>

                                    <h1 class="h3 mb-3 fw-normal"><?= _getText("message.sign.up") ?></h1>

                                </center>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-floating col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input required type="text" class="form-control" id="login" name="login" placeholder="<?= _getText("login") ?>">
                                <label for="login">
                                    <?= _getText("login") ?>
                                </label>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-floating col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <input required type="password" class="form-control" name="pwd" id="pwd" placeholder="<?= _getText("pwd") ?>">
                                <label for="pwd"><?= _getText("pwd") ?></label>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-floating col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                <button class="btn btn-primary w-100 py-2" type="submit"><?= _getText("btnValider") ?></button>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="col-md-4">
                    <br>
                    <?php if (isset($_GET["creation"])) {
                        if ($_GET["creation"] == 1) { ?>
                            <div class="alert alert-success" role="alert">
                                <i style="font-size: 28px;" class="bi bi-check-circle"></i><br>
                                <div>
                                    <p> <?= _getText("message.creation.consultant.reussi") ?></p>
                                </div>
                            </div>
                    <?php   }
                    } ?>

                    <?php if (isset($_GET["err"])) {
                        if ($_GET["err"] == 1) { ?>

                            <div class="alert alert-danger" role="alert">
                                <i style="font-size: 28px;" class="bi bi-exclamation-triangle-fill"></i><br>
                                <div>
                                    <p> <?= _getText("message.mot.de.passe.invalide") ?></p>
                                </div>
                            </div>

                    <?php   }
                    } ?>


                </div>
            </div>
        </div>
        <div class="tab-pane   <?= $activeCV ?>" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <?php if (isset($_SESSION["id_consultant"])) { ?>
                <br>
                <center>
                    <h4><?= _getText("maj.cv") ?></h4>
                </center>
            <?php } else { ?>
                <center>
                    <h4><?= _getText("message.sign.in") ?></h4>
                </center>
            <?php } ?>
            <form enctype="multipart/form-data" id="formCV" method="POST" action="cree_exec.php" class="needs-validation">

                <input type="hidden" name="id_consultant" id="id_consultant" class="form-control" value="<?= $critereCV["id_consultant"] ?? 0 ?>">

                <ul class="nav nav-pills nav-justified" id="myTabs">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab1" data-bs-toggle="tab" href="#content1"><?= (isset($_SESSION["id_consultant"]) ?  _getText("info.personnel") : "")   ?></a>
                    </li>

                    <?php if (isset($_SESSION["id_consultant"])) { ?>
                        <li class="nav-item">
                            <a class="nav-link" id="tab2" data-bs-toggle="tab" href="#content2"><?= _getText("diplome") ?></a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" id="tab3" data-bs-toggle="tab" href="#content3"><?= _getText("experience") ?></a>
                        </li>
                    <?php } ?>
                </ul>

                <div class="tab-content mt-2">
                    <div class="tab-pane fade show active" id="content1">

                        <fieldset>
                            <!-- <legend><?= _getText("login") ?></legend>-->
                            <div class="row">
                                <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <input <?= $disabled ?> type="text" class="form-control" id="login_compte" name="login_compte" placeholder="<?= _getText("login") ?>" value="<?= $tabCv["login_compte"] ?? "" ?>" required>
                                    <label for="login_compte" class="form-label"><?= _getText("login") ?>:</label>
                                </div>
                            </div>
                            <?php if (!isset($_SESSION["id_consultant"])) { ?>
                                <div class="row">
                                    <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <input type="password" class="form-control" id="password_compte" placeholder="<?= _getText("pwd") ?>" name="password_compte" value="" required>
                                        <label for="password_compte" class="form-label"><?= _getText("pwd") ?>:</label>
                                    </div>
                                    <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                        <input type="password" class="form-control" id="password_compte_confirm" placeholder="<?= _getText("pwd.confirm") ?>" value="" required>
                                        <label for="password_compte_confirm" class="form-label"><?= _getText("pwd.confirm") ?>:</label>
                                    </div>
                                </div>
                            <?php } ?>
                        </fieldset>
                        <fieldset>
                            <!--    <legend><?= _getText("identite") ?></legend> -->
                            <div class="row">
                                <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" id="nom_consultant" name="nom_consultant" placeholder="<?= _getText("nom") ?>" value="<?= $tabCv["nom_consultant"] ?? "" ?>" required>
                                    <label for="nom_consultant" class="form-label"><?= _getText("nom") ?>:</label>
                                </div>
                                <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" id="prenom_consultant" placeholder="<?= _getText("prenom") ?>" name="prenom_consultant" value="<?= $tabCv["prenom_consultant"] ?? "" ?>" required>
                                    <label for="prenom_consultant" class="form-label"><?= _getText("prenom") ?>:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <input type="date" class="form-control formdate" id="date_naissance" placeholder="<?= _getText("date.naissance") ?>" name="date_naissance" value="<?= $tabCv["date_naissance"] ?? "" ?>" required>
                                    <label for="date_naissance" class="form-label"><?= _getText("date.naissance") ?>:</label>
                                </div>
                                <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <input type="file" class="form-control" id="photo_consultant" name="photo_consultant">
                                    <span id="preview">
                                        <?= $tabCv["photo_consultant"] ?? "" ?>
                                    </span>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <!-- <legend><?= _getText("contact") ?></legend>-->
                            <div class="row">
                                <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <input type="number" class="form-control" id="tel_consultant" name="tel_consultant" placeholder="<?= _getText("phone") ?>" value="<?= $tabCv["tel_consultant"] ?? "" ?>">
                                    <label for="tel_consultant" class="form-label"><?= _getText("phone") ?>:</label>
                                </div>
                                <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <input type="email" class="form-control" id="mail_consultant" placeholder="<?= _getText("mail") ?>" name="mail_consultant" value="<?= $tabCv["mail_consultant"] ?? "" ?>">
                                    <label for="mail_consultant" class="form-label"><?= _getText("mail") ?>:</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <input type="text" class="form-control" id="linkedin_consultant" placeholder="<?= _getText("linkedin") ?>" name="linkedin_consultant" value="<?= $tabCv["linkedin_consultant"] ?? "" ?>">
                                    <label for="linkedin_consultant" class="form-label"><?= _getText("linkedin") ?>:</label>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <!-- <legend><?= _getText("autre") ?></legend>-->
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="" class="form-label"><?= _getText("langue") ?></label>


                                    <?php
                                    $tab_id_langue = explode("|", $tabCv["id_langue"]);
                                    ?>

                                    <select class="" name="id_langue[]" id="id_langue" multiple="multiple" required>

                                        <?php
                                        foreach ($tabLangue as $value) {
                                            // Réinitialisez la variable $selected à chaque itération
                                            $selected = "";

                                            foreach ($tab_id_langue as $value_id) {
                                                if ($value_id == $value["id_langue"]) {
                                                    $selected = "selected";
                                                }
                                            }
                                        ?>
                                            <option <?= $selected ?> value="<?= $value["id_langue"] ?>"><?= $value["langue"] ?></option>
                                        <?php } ?>
                                    </select>


                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <label for="competence_consultant" class="form-label"><?= _getText("competence") ?>:</label>
                                    <textarea rows="8" class="form-control" id="competence_consultant" name="competence_consultant" placeholder="<?= _getText("competence") ?>"><?= $tabCv["competence_consultant"] ?? "" ?></textarea>
                                </div>
                            </div>
                        </fieldset>

                    </div>
                    <div class="tab-pane fade" id="content2">
                        <table width="100%" id="listeDiplome" class="table">
                            <tbody>

                            </tbody>
                        </table>

                        <button data-bs-toggle="tooltip" data-bs-placement="right" title="<?= _getText("ajouter.autre") ?>" class="btn btn-secondary" type="button" id="addRowDIplome">
                            <i style="font-size: 28px;" class="bi bi-clipboard2-plus"></i>
                        </button>


                    </div>
                    <div class="tab-pane fade" id="content3">
                        <table width="100%" id="listeExperience" class="table">
                            <tbody>
                                <!-- Lignes du tableau seront ajoutées ici -->
                            </tbody>
                        </table>
                        <button data-bs-toggle="tooltip" data-bs-placement="right" title="<?= _getText("ajouter.autre") ?>" class="btn btn-secondary" type="button" id="addRowExperience">
                            <i style="font-size: 28px;" class="bi bi-clipboard2-plus"></i>
                        </button>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="myCheck" required>
                                <label class="form-check-label" for="myCheck"><?= _getText("message.accepte.cv.template") ?></label>
                                <div class="valid-feedback"><?= _getText("valider") ?></div>
                                <div class="invalid-feedback"><?= _getText("message.coche.accepte") ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 ">
                        </div>
                        <div class="col-md-2">
                            <button style="width: 100%;" type="submit" class="btn btn-primary"><?= _getText("btnValider") ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if (!isset($_SESSION["id_consultant"])) { ?>
        <br>
        <div class="row">

            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <ul class="nav nav-pills nav-fill" id="myTab" role="tablist">
                    <li class="nav-item " role="presentation">
                        <button <?= $disabled ?> class="nav-link <?= $activeLogin ?> " id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true"><?= _getText("message.sign.up") ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link  <?= $activeCV ?> " id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false"><?= _getText("message.sign.in") ?></button>
                    </li>
                </ul>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">

            </div>
        </div>



    <?php } ?>

</div>


<div id="div_source_diplome" style="display: none;">
    <fieldset>
        <div class="row">
            <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <input type="hidden" name="id_diplome[]" value="0">
                <input required type="text" class="form-control" name="institution_diplome[]" placeholder="<?php echo _getText('institution')  ?>" value="">
                <label><?php echo _getText('institution')  ?></label>
            </div>

            <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <input required type="date" class="form-control formdate" name="date_diplome[]" placeholder="<?php echo _getText('date')  ?>" value="">
                <label for=""><?php echo _getText('date')  ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label> <?php echo _getText('piece.jointe')  ?></label>
                <input type="file" class="form-control" name="pj_diplome[]">

            </div>
            <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">

                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <label for="">
                            <?php echo _getText('telecharge')  ?>
                        </label>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        <a target=" _blank" tag="pj_diplome[]" href=""></a>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <label for="" class="form-label"><?php echo _getText('diplome.consultant')  ?></label>
                <textarea required rows="5" type="text" class="form-control" name="diplome_consultant[]" placeholder="<?php echo _getText('diplome.consultant')  ?>"></textarea>
            </div>
        </div>
    </fieldset>
</div>



<div id="div_source_Experience" style="display: none;">

    <fieldset>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for="" class="form-label"><?php echo _getText('experience')  ?></label>
                <textarea rows="6" required class="form-control" name="experience_consultant[]" placeholder="<?php echo _getText('experience')  ?>"></textarea>
                <input type="hidden" name="id_experience[]" value="0">
            </div>
            <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <input required type="text" class="form-control" name="societe_experience[]" placeholder="<?php echo _getText('societe')  ?>" value="">
                <label for=""><?php echo _getText('societe')  ?></label>
            </div>
        </div>
        <div class="row">
            <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <input required type="date" class="form-control formdate" name="date_debut_experience[]">
                <label for=""><?php echo _getText('date.debut')  ?></label>
            </div>
            <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <input required type="date" class="form-control formdate" name="date_fin_experience[]">
                <label for=""><?php echo _getText('date.fin')  ?></label>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <label for=""> <?php echo _getText('piece.jointe')  ?></label>
                <input type="file" class="form-control" name="pj_certificat_travail[]">

            </div>
            <div class="form-floating col-xs-12 col-sm-12 col-md-6 col-lg-6">
                <a target="_blank" tag="pj_certificat_travail[]" href=""></a>
            </div>
        </div>

    </fieldset>

</div>

<?php

require_once __DIR__ . '/../../footer.php';

?>






<script type="text/javascript">
    jQuery(document).ready(function($) {

        $('#id_langue').select2();

        <?php if (!isset($_SESSION["id_consultant"])) { ?>

            $("#password_compte").blur(function(event) {

                if ($(this).val() != "" && $("#password_compte_confirm").val() != "") {
                    if ($(this).val() != $("#password_compte_confirm").val()) {
                        $(this).val("");
                    }
                }

            });

            $("#password_compte_confirm").blur(function(event) {
                if ($(this).val() != "" && $("#password_compte").val() != "") {
                    if ($(this).val() != $("#password_compte").val()) {
                        $(this).val("");
                    }
                }
            });


            $("#login_compte").blur(function(event) {

                if ($("#id_consultant").val() == 0 && $("#login_compte").val() != "") {

                    $.ajax({
                            url: '<?= HTTP_AJAX_CV ?>ajaxveriflogin.php',
                            type: 'POST',
                            dataType: 'html',
                            data: {
                                login_compte: $("#login_compte").val()
                            },
                        })
                        .done(function(r) {

                            if (r == 1) {
                                alert("<?php echo _gettext("message.login.non.valide") ?>");
                                $("#login_compte").val("");
                                $("#login_compte").focus();
                            }
                        })
                        .fail(function() {})
                        .always(function() {});
                }
            });

        <?php } ?>



        // Fonction pour <?= _gettext("ajouter.autre") ?> au tableau
        $("#addRowDIplome").click(function() {
            // Ajouter une nouvelle ligne avec des champs input et textarea
            // $("#listeDiplome").append($("#div_source_diplome").html());

            $("#listeDiplome tbody").append(
                '<tr>' +
                '<td>' + $("#div_source_diplome").html() + '</td>' +
                '<td><button title="<?= _getText("supprimer") ?>" type="button" class="deleteRow"><i style="font-size:26px" class="bi bi-clipboard2-x" ></i></button></td>' +
                '</tr>'
            );
        });

        // Fonction pour <?= _gettext("ajouter.autre") ?> au tableau
        $("#addRowExperience").click(function() {
            // Ajouter une nouvelle ligne avec des champs input et textarea
            // $("#listeDiplome").append($("#div_source_diplome").html());

            $("#listeExperience tbody").append(
                '<tr>' +
                '<td>' + $("#div_source_Experience").html() + '</td>' +
                '<td><button title="<?= _getText("supprimer") ?>"   type="button" class="deleteRow"><i style="font-size:26px" class="bi bi-clipboard2-x" ></i></button></td>' +
                '</tr>'
            );
        });

        // Fonction pour supprimer une ligne du tableau
        $("#listeDiplome").on("click", ".deleteRow", function() {

            var rowToDelete = $(this).closest("tr");

            customConfirm("<?= _getText("messege.titre.confirm.supprimer") ?>", "<?= _getText("message.confirm.supprimer") ?>", function() {
                // Supprimer la ligne
                rowToDelete.remove();
            });
        });

        $("#listeExperience").on("click", ".deleteRow", function() {

            var rowToDelete = $(this).closest("tr");

            customConfirm("<?= _getText("messege.titre.confirm.supprimer") ?>", "<?= _getText("message.confirm.supprimer") ?>", function() {
                // Supprimer la ligne
                rowToDelete.remove();
            });
        });

        <?php
        if (count($tabDiplome) > 0) {
            foreach ($tabDiplome as $key => $value) {
        ?>
                $("#addRowDIplome").trigger("click");

                $('#formCV input[name="institution_diplome[]"]:last').val("<?= $value["institution_diplome"] ?>");
                $('#formCV input[name="date_diplome[]"]:last').val("<?= $value["date_diplome"] ?>");
                $('#formCV textarea[name="diplome_consultant[]"]:last').val("<?= $value["diplome_consultant"] ?>");
                $('#formCV a[tag="pj_diplome[]"]:last').html("<?= $value["pj_diplome"] ?>");

                $('#formCV a[tag="pj_diplome[]"]:last').attr("href", "<?= HTTP_PJ .  $value["pj_diplome"] ?>");

                $('#formCV input[name="id_diplome[]"]:last').val("<?= $value["id_diplome"] ?>");

        <?php
            }
        } ?>

        <?php
        if (count($tabExperience) > 0) {
            foreach ($tabExperience as $key => $value) {
        ?>
                $("#addRowExperience").trigger("click");

                $('#formCV textarea[name="experience_consultant[]"]:last').val("<?= $value["experience_consultant"] ?>");
                $('#formCV input[name="societe_experience[]"]:last').val("<?= $value["societe_experience"] ?>");
                $('#formCV input[name="date_debut_experience[]"]:last').val("<?= $value["date_debut_experience"] ?>");
                $('#formCV input[name="date_fin_experience[]"]:last').val("<?= $value["date_fin_experience"] ?>");
                $('#formCV a[tag="pj_certificat_travail[]"]:last').html("<?= $value["pj_certificat_travail"] ?>");

                $('#formCV a[tag="pj_certificat_travail[]"]:last').attr("href", "<?= HTTP_PJ .  $value["pj_certificat_travail"] ?>");

                $('#formCV input[name="id_experience[]"]:last').val("<?= $value["id_experience"] ?>");

        <?php
            }
        } ?>

        $('#photo_consultant').on('change', function(e) {
            var file = e.target.files[0];

            if (file) {
                // Utilisation de l'API FileReader pour lire le fichier
                var reader = new FileReader();

                reader.onload = function(e) {
                    // Affichage de l'aperçu de l'image
                    $('#preview').html('<img class="photo_consultant" src="' + e.target.result + '" alt="Preview">');
                };

                reader.readAsDataURL(file);
            }
        });
    });


    /**
     * 
     *  
     * $(document).ready(function() {
      // Lorsque le fichier sélectionné change
      $('#fileInput').on('change', function(e) {
        var file = e.target.files[0];

        if (file) {
          // Utilisation de l'API FileReader pour lire le fichier
          var reader = new FileReader();

          reader.onload = function(e) {
            // Vérifier le type de fichier et afficher l'aperçu en conséquence
            if (file.type.startsWith('image/')) {
              // Affichage de l'aperçu de l'image
              $('#preview').html('<img src="' + e.target.result + '" alt="Preview">');
            } else if (file.type === 'application/pdf') {
              // Affichage de l'aperçu pour les fichiers PDF
              $('#preview').html('<embed src="' + e.target.result + '" type="application/pdf" width="100%" height="600px"/>');
            } else if (file.type === 'text/plain') {
              // Affichage de l'aperçu pour les fichiers texte (txt)
              $('#preview').text(e.target.result);
            } else {
              // Type de fichier non pris en charge
              $('#preview').html('<p>Fichier non pris en charge</p>');
            }
          };

          // Lecture du contenu du fichier en tant que Data URL
          reader.readAsDataURL(file);
        }
      });
    });
     * 
     */
</script>