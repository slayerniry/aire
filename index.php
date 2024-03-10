<?php require_once "header.php";
$parametre = new Models\parametre;
/** code sous domaine  */
$tabsoustype =   explode("|", $parametre->lireCle("LIST_SOUS_TYPE_EVENT"));
$cri["param_key"] = "PRESENTATION_TEXT" ;
$dataPresentation = $parametre->lireParCritere($cri);
$cri["param_key"] = "OBJECTIF_TEXT" ;
$dataObjectif = $parametre->lireParCritere($cri);
$objectif_text = "";
if(count($dataObjectif)> 0){
    $objectif_text=$dataObjectif[0]["param_desc"];
}
if(count($dataPresentation)> 0){
    $presentation_text=$dataPresentation[0]["param_desc"];
}
foreach ($tabsoustype as $key => $value) {
    $tabsoustypeDeail[] = explode(":", $value);
}
$rech = $tabsoustypeDeail[0][0];
$rechLib = $tabsoustypeDeail[0][1];
$dev = $tabsoustypeDeail[1][0];
$devLib = $tabsoustypeDeail[1][1];
/** fin sous domaine */
?>
<style>
    #divactivite2 {
        display: none;
    }
    #divactivite {
        display: block;
    }
    .page-link i {
        color: #006633;
        font-size: 38px;
    }
    .page-link:hover {
        background-color: #73c17c;
    }
    .img-domaine {
        width: 200px;
    }
    .img-domaine:hover {
        filter: grayscale(100%);
        transition: filter 0.3s ease;
    }
    .btn-see-more {
        font-family: 'Nunito';
        font-weight: bold;
        background-color: white;
        color: #006633;
        width: fit-content;
        font-size: 38px;
    }
    .btn-see-more:hover {
        font-family: 'Nunito';
        background-color: #73c17c;
        color: white;
    }
    h1 {
        padding-top: 50px;
        font-size: 38pt;
        color: #006633;
    }
    h2 {
        font-size: 28pt;
        color: #663333;
    }
    .div-card-text {
        padding-right: 20px;
    }
    .card-text {
        font-family: 'Nunito';
        font-size: 14pt;
    }
    .title_head {
        padding-top: 40px;
        padding-left: 40px;
        font-size: 48pt;
        color: #006633;
    }
    #img-protgerlenvironnement-text {
        font-size: 60pt;
        padding: 50px;
        color: white;
    }
    #img-activite-text {
        padding: 10px;
    }
    #img-activite-text h2 {
        padding: 10px;
    }
    .activite-text p {
        padding: 10px;
        font-family: 'Nunito';
        font-size: 14pt;
        width: 50%;
    }
    @media screen and (max-width:1196px) {
        .title_head {
            padding-top: 10px;
            padding-left: 10px;
            font-size: 45px;
        }
        .card-text {
            font-size: 14px;
        }
        #img-protgerlenvironnement-text {
            font-size: 55pt;
        }
        h1 {
            font-size: 25pt;
            color: #006633;
        }
    }
    @media screen and (max-width:1024px) {
        #act-precedent .btn {
            width: 10px;
        }
        #act-suivant .btn {
            width: 10px;
        }
        h2 {
            font-size: 18pt;
        }
        .title_head {
            padding-top: 10px;
            padding-left: 10px;
            font-size: 25px;
        }
        #img-protgerlenvironnement-text {
            font-size: 30pt;
        }
        .activite-text p {
            padding: 2px;
            font-size: 10pt;
            width: 50%;
            height: 100px;
            overflow-y: scroll;
        }
        .card-text {
            font-family: 'Nunito';
            font-size: 10pt;
        }
    }
    @media screen and (max-width:390px) {
        .title_head {
            padding-top: 0px;
            padding-left: 0px;
            font-size: 20px;
        }
        .page-link i {
            color: #006633;
            font-size: 18px;
        }
        #img-protgerlenvironnement-text {
            font-size: 25pt;
        }
        #divactivite2 {
            display: block;
        }
        #divactivite {
            display: none;
        }
        .btn-see-more {
            font-size: 18px;
        }
        #liste-team .card {
            width: 150px !important;
        }
        #div-domaine .card {
            width: 150px !important;
        }
        .img-domaine {
            width: 100px;
            cursor: pointer;
        }
        .img-domaine:hover {
            width: 100px;
            cursor: pointer;
        }
    }
</style>
<div class="container" id="divaccueil">
    <div class="row justify-content-center align-items-center g-2" style="position: relative;">
        <img style="" src="<?= HTTP_IMG ?>pdc.jpg" class="w-100" alt="">
        <img style="position: absolute; top: 0; left: 0;" src="<?= HTTP_IMG ?>head.png" class="w-100" alt="">
        <div class="position-absolute start-0 top-0" id="">
            <h1 class="title_head">
                <p><?= _getText("titre.haut") ?></p>
                <p><?= _getText("titre.bat") ?></p>
            </h1>
        </div>
        <!--<div class="position-absolute start-50 bottom-0" style="padding: 2%;">
<button class="btn btn-see-more">See more</button>
</div>-->
    </div>
</div>
<div class="container" id="divapropos">
    <div class="row">
        <div class="col">
            <h1><?= _getText("a.propos") ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row">
                        <div>
                            <h2><?= _getText("presentation")  ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="card-text text-justify mb-auto" id="txtpresentation">
                                <!-- Placeholder text goes here -->
                            </p>
                            <input type="hidden" id="txtpresentation_input" value="<?= $presentation_text ?>">
                        </div>
                        <div class="col-md-4">
                            <img style="border: none;" src="<?= HTTP_IMG ?>presentation.gif" class="img-thumbnail" alt="Presentation Image">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <ul class="pagination justify-content-end bg-transparent">
                        <li class="page-item disabled" id="previousPagePresentation">
                            <button class="page-link border-0" tabindex="-1" aria-disabled="true">
                                <i class="bi bi-chevron-left"></i>
                            </button>
                        </li>
                        <li class="page-item" id="nextPagePresentation">
                            <button class="page-link border-0">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <div class="card h-100">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h2><?= _getText("objectif") ?></h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            <p class="card-text text-justify mb-auto" id="txtobjectif">
                                <!-- Placeholder text goes here -->
                            </p>
                            <input type="hidden" id="txtobjectif_input" value="<?= $objectif_text ?>">
                        </div>
                        <div class="col-md-4">
                            <img style="border: none;" src="<?= HTTP_IMG ?>objectif.gif" class="img-thumbnail " alt="Objectif Image">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <ul class="pagination justify-content-end bg-transparent">
                        <li class="page-item disabled" id="previousPageObjectif">
                            <button class="page-link border-0" tabindex="-1" aria-disabled="true">
                                <i class="bi  bi-chevron-left"></i>
                            </button>
                        </li>
                        <li class="page-item" id="nextPageObjectif">
                            <button class="page-link border-0">
                                <i class="bi bi-chevron-right"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <!--<div id="img-protgerlenvironnement" class="row justify-content-center align-items-center g-2">
        <div class="col position-relative">
            <center>
                <img src="" class="img-fluid" alt="Protéger l'environnement">
            </center>
            <div class="start-0 top-0  " id="img-protgerlenvironnement-text">
            </div>
        </div>
    </div>!-->
    <div class="row">
        <div class="col" style="background-image:url('<?= HTTP_IMG ?>protgerlenvironnement.jpg');">
            <div class="start-0 top-0  " id="img-protgerlenvironnement-text">
                <?= _getText("text.vert.haut") ?><br><?= _getText("text.vert.bas") ?>
            </div>
        </div>
    </div>
</div>
<!--activite-->
<div class="container" id="divactivite">
    <h1><?= _getText("activites") ?></h1>
    <div class="row justify-content-center align-items-center g-2" style="position: relative;">
        <!--<img style="" src="<?= HTTP_IMG ?>mamsoala.jpg" alt="">-->
        <div class="photo_event">
        </div>
        <img style="position: absolute; top: 0; left: 0;" src="<?= HTTP_IMG ?>activite-head.png" class="w-100" alt="">
        <div class="position-absolute start-0 top-0" id="">
            <style>
                ul.pager li {
                    display: inline;
                }
            </style>
            <div class="row">
                <div class="col">
                    <h2 class="titre_activite"></h2>
                </div>
            </div>
            <div id="loading" style="display: none;">
                <div class="spinner-grow  text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="activite-text">
                <p class="contenu_activite"></p>
            </div>
        </div>
        <div class="position-absolute bottom-0" style="padding: 2%;">
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col" style="text-align: right;">
                            <input type="hidden" id="txtlimit" value="0" />
                            <ul class="pager pager-activite">
                                <li><a href="javascript:void(0)" data-type="0"> <button class="btn btn-see-more"><i class="bi  bi-chevron-left"></i></button> </a></li>
                                <li><a href="javascript:void(0)" data-type="1"><button class="btn btn-see-more"><i class="bi bi-chevron-right"></i></button></a></li>
                            </ul>
                        </div>
                        <!--<div class="col">
                            <div style="text-align: right;">
                                <button class="btn btn-see-more">See more</button>
                            </div>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" id="divactivite2">
    <div class="row">
        <div class="col">
            <h1><?= _getText("activites") ?></h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header titre_activite">Header</div>
                <div class="photo_event"></div>
                <div class="card-body">
                    <p class="card-text contenu_activite">Text</p>
                </div>
                <div class="card-footer text-muted">
                    <ul class="pager pager-activite">
                        <li><a href="javascript:void(0)" data-type="0"> <button class="btn btn-see-more"><i class="bi  bi-chevron-left"></i></button> </a></li>
                        <li><a href="javascript:void(0)" data-type="1"><button class="btn btn-see-more"><i class="bi bi-chevron-right"></i></button></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h1><?= _getText("domaines") ?></h1>
</div>
<div class="container div-domaine">
    <div class="row justify-content-center align-items-center g-2">
        <div class="col">
            <div class="card bg-body-secondary p-5" style="cursor: pointer; border: none;">
                <center>
                    <img class="card-img-top img-domaine" type="<?= $rech ?>" src="<?= HTTP_IMG ?>homme-lampe.png" alt="Title" />
                    <div class="card-body">
                        <h2 class="card-title"><?= $rechLib ?></h2>
                    </div>
                </center>
            </div>
        </div>
        <div class="col">
            <div class="card p-5" style="cursor: pointer;border: none;">
                <center>
                    <img class="card-img-top img-domaine" type="<?= $dev ?>" src="<?= HTTP_IMG ?>mode-feuille.png" alt="Title" />
                    <div class="card-body">
                        <h2 class="card-title"><?= $devLib ?></h2>
                    </div>
                </center>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col" id="listeDomaine">
        </div>
    </div>
</div>
<div class="container">
    <h1>Nos Teams</h1>
</div>
<div class="container">
    <div id="loading" style="display: none;">
        <div class="spinner-grow  text-success" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div class="row" id="liste-team">
    </div>
    <hr>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col">
            <center>
                <ul class="pager pager-teams">
                    <li><a href="javascript:void(0)" data-type="0" id="teams-precedent"> <button class="btn btn-see-more"><i class="bi  bi-chevron-left"></i></button> </a></li>
                    <li><a href="javascript:void(0)" data-type="1" id="teams-suivant"><button class="btn btn-see-more"><i class="bi bi-chevron-right"></i></button></a></li>
                </ul>
            </center>
        </div>
    </div>
</div>
<div class="container" style="padding-left: 25px;padding-right: 25px;">
    <div class="row text-white" style="background-image: url('<?= HTTP_IMG ?>gris.jpg'); background-size: cover;">
        <div class="col p-5">
            <p class="display-6">HOW TO RECOVER FROM A HIKE</p>
            <p class="display-6">15.09.20</p>
        </div>
        <div class="col p-5">
            <div class="row">
                <div class="col">
                    <p class="display-1">50%</p>
                </div>
                <div class="col">
                    <p class="display-6">OFF</p>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <p class="display-6">orem Ipsum Consectetur</p>
                    <p class="display-6">15.30 hs</p>
                </div>
            </div>
            <p class="display-6">21.09.20</p>
        </div>
    </div>
</div>
<div class="container" style="padding-left: 25px;padding-right: 25px;">
    <div class="row text-white" style="background-image: url('<?= HTTP_IMG ?>violet.png'); background-size: cover;">
        <div class="col p-5">
            <p class="display-3 text-center">FOR CONSERVING AND RESTORING ECOSYSTEM</p>
            <br><br><br><br>
            <center>
                <button class="btn btn-see-more">Donate</button>
            </center>
        </div>
    </div>
</div>
<?php require_once "footer.php"; ?>
<!-- Modal -->
<div class="modal fade" id="modalteam" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nos Teams</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img id="img_detail" src="" class="img-fluid rounded-start" alt="...">
                        </div>
                        <div class="col-md-8 ">
                            <div class="card-body">
                                <h3 id="titre_deail" class="card-title">Card title</h3>
                                <p class="card-text" id="contenu_detail">
                                    ...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>-->
        </div>
    </div>
</div>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $(".img-domaine").click(function(event) {
            $(".card").removeClass('bg-body-secondary');
            $(this).closest('.card').addClass('bg-body-secondary');
            var type = $(this).attr("type");
            var divload = '<div class="spinner-grow  text-success" role="status"><span class="visually-hidden">Loading...</span></div>'
            $("#listeDomaine").html(divload);
            $.ajax({
                    url: '<?= HTTP_AJAX_ACTIVITE ?>afficheDomaine.php',
                    type: 'POST',
                    dataType: 'html',
                    data: {
                        type: type
                    },
                })
                .done(function(r) {
                    $("#listeDomaine").html(r);
                })
                .fail(function() {
                    console.log("error");
                })
                .always(function() {
                    console.log("complete");
                });
        });
        $(".img-domaine").trigger("click");
    });
</script>
<script>
    $(document).ready(function() {
        // Texte à afficher
        var textePresentation = $("#txtpresentation_input").val();
        var texteObj = $("#txtobjectif_input").val();
        // Split du texte en mots pour la présentation
        var motsPresentation = textePresentation.split(" ");
        // Split du texte en mots pour les objectifs
        var motsObj = texteObj.split(" ");
        // Nombre de mots par page
        var motsParPage = <?= _getText("motsParPage") ?>;
        // Numéro de la page actuelle pour la présentation
        var pageActuellePresentation = 1;
        // Numéro de la page actuelle pour les objectifs
        var pageActuelleObjectif = 1;
        // Identifiants des éléments où afficher les textes
        var idResultatPresentation = "txtpresentation";
        var idResultatObjectif = "txtobjectif";
        // Affichage initial pour la présentation
        afficherPage(pageActuellePresentation, idResultatPresentation, motsPresentation);
        // Affichage initial pour les objectifs
        afficherPage(pageActuelleObjectif, idResultatObjectif, motsObj);
        // Clic sur le bouton "Suivant" pour la présentation
        $("#nextPagePresentation").click(function() {
            suivant('presentation');
        });
        // Clic sur le bouton "Précédent" pour la présentation
        $("#previousPagePresentation").click(function() {
            precedent('presentation');
        });
        // Clic sur le bouton "Suivant" pour les objectifs
        $("#nextPageObjectif").click(function() {
            suivant('objectif');
        });
        // Clic sur le bouton "Précédent" pour les objectifs
        $("#previousPageObjectif").click(function() {
            precedent('objectif');
        });
        // Fonction pour afficher la page spécifiée
        function afficherPage(page, idResultat, mots) {
            var debut = (page - 1) * motsParPage;
            var fin = debut + motsParPage;
            var pageTexte = mots.slice(debut, fin).join(" ");
            $("#" + idResultat).fadeOut("slow", function() {
                $(this).text(pageTexte).fadeIn("slow");
            });
            miseAJourBoutons(page, idResultat);
        }
        // Fonction pour afficher la page précédente ou suivante
        function precedentOuSuivant(pageType, direction) {
            var pageActuelle;
            if (pageType === 'presentation') {
                pageActuelle = (direction === 'precedent') ? pageActuellePresentation : pageActuellePresentation++;
                afficherPage(pageActuelle, idResultatPresentation, motsPresentation);
            } else if (pageType === 'objectif') {
                pageActuelle = (direction === 'precedent') ? pageActuelleObjectif : pageActuelleObjectif++;
                afficherPage(pageActuelle, idResultatObjectif, motsObj);
            }
        }
        // Fonction pour afficher la page précédente
        function precedent(pageType) {
            if (pageType === 'presentation') {
                if (pageActuellePresentation > 1) {
                    pageActuellePresentation--;
                    afficherPage(pageActuellePresentation, idResultatPresentation, motsPresentation);
                }
            } else if (pageType === 'objectif') {
                if (pageActuelleObjectif > 1) {
                    pageActuelleObjectif--;
                    afficherPage(pageActuelleObjectif, idResultatObjectif, motsObj);
                }
            }
            var hp = 400;
            var ho = 450;
            hp = $("#txtpresentation").height();
            ho = $("#txtobjectif").height();
            if (hp < ho) {
                $("#txtpresentation").height(hp);
                $("#txtobjectif").height(hp);
            } else {
                $("#txtpresentation").height(ho);
                $("#txtobjectif").height(ho);
            }
        }
        // Fonction pour afficher la page suivante
        function suivant(pageType) {
            if (pageType === 'presentation') {
                if (pageActuellePresentation < Math.ceil(motsPresentation.length / motsParPage)) {
                    pageActuellePresentation++;
                    afficherPage(pageActuellePresentation, idResultatPresentation, motsPresentation);
                }
            } else if (pageType === 'objectif') {
                if (pageActuelleObjectif < Math.ceil(motsObj.length / motsParPage)) {
                    pageActuelleObjectif++;
                    afficherPage(pageActuelleObjectif, idResultatObjectif, motsObj);
                }
            }
            var hp = 400;
            var ho = 450;
            hp = $("#txtpresentation").height();
            ho = $("#txtobjectif").height();
            if (hp < ho) {
                $("#txtpresentation").height(ho);
                $("#txtobjectif").height(ho);
            } else {
                $("#txtpresentation").height(hp);
                $("#txtobjectif").height(hp);
            }
        }
        // Fonction pour activer ou désactiver les boutons en fonction de la page actuelle
        function miseAJourBoutons(page, idResultat) {
            if (idResultat === idResultatPresentation) {
                $("#previousPagePresentation").toggleClass("disabled", page === 1);
                $("#nextPagePresentation").toggleClass("disabled", page === Math.ceil(motsPresentation.length / motsParPage));
            } else if (idResultat === idResultatObjectif) {
                $("#previousPageObjectif").toggleClass("disabled", page === 1);
                $("#nextPageObjectif").toggleClass("disabled", page === Math.ceil(motsObj.length / motsParPage));
            }
        }
    });
</script>
<script>
    $(document).ready(function() {
        $(".pager-activite li a").click(function(e) {
            e.preventDefault();
            var type = $(this).data("type");
            var params = {
                type: type,
                limit: $("#txtlimit").val()
            };
            // Afficher l'indicateur de chargement
            $("#loading").show();
            // Effectuer une requête AJAX
            $.ajax({
                url: "<?= HTTP_AJAX_ACTIVITE ?>afficheactivitesuivant.php",
                method: "POST",
                data: params,
                dataType: "json",
                success: function(r) {
                    //debugJSON(r);
                    $(".titre_activite").html(r.titre);
                    $(".contenu_activite").html(r.contenu);
                    $(".photo_event").html(r.photo_event);
                    //class="w-100"
                    $("#txtlimit").val(r.limit);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                },
                complete: function() {
                    // Masquer l'indicateur de chargement une fois la requête terminée
                    $("#loading").hide();
                }
            });
        });
        $(".pager-activite li a").trigger("click");
    });
    $(document).ready(function() {
        $(".pager-teams li a").click(function(e) {
            e.preventDefault();
            var type = $(this).data("type");
            var params = {
                type: type,
                limit: $("#txtlimitteam").val()
            };
            // Afficher l'indicateur de chargement
            $("#loadingteam").show();
            // Effectuer une requête AJAX
            $.ajax({
                url: "<?= HTTP_AJAX_ACTIVITE ?>afficheteamsuivant.php",
                method: "POST",
                data: params,
                dataType: "html",
                success: function(r) {
                    //debugJSON(r);
                    $("#liste-team").html(r);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                },
                complete: function() {
                    // Masquer l'indicateur de chargement une fois la requête terminée
                    $("#loadingteam").hide();
                }
            });
        });
        $(".pager-teams li a").trigger("click");
    });
</script>