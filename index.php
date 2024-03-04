<?php require_once "header.php";
?>
<style>
    .page-link i {
        color: #006633;
    }
    .page-link:hover {
        background-color: #73c17c;
    }
    .img-domaine {
        width: 200px;
    }
    .btn-see-more {
        font-family: 'Nunito';
        font-size: 12pt;
        font-weight: bold;
        background-color: white;
        color: #006633;
        width: fit-content;
    }
    .btn-see-more:hover {
        font-family: 'Nunito';
        font-size: 12pt;
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
    #img-protgerlenvironnement {
        background-color: #73c17c;
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
    .div-domaine {
        padding: 100px;
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
        #last .display-6,
        #last .display-4,
        #last .display-5 {
            font-size: 20px;
        }
        .display-1 {
            font-size: calc(4.5vw);
            font-weight: 300;
            line-height: 1.2;
        }
        .display-6 {
            font-size: calc(1.5vw);
            font-weight: 300;
            line-height: 1.2;
        }
        h1 {
            font-size: 25pt;
            color: #006633;
        }
    }
    @media screen and (max-width:1024px) {
        #last .display-6,
        #last .display-4,
        #last .display-5,
        #last .card-text {
            font-size: 10px;
        }
        #last .display-6,
        #last .display-4,
        #last .display-5 {
            font-size: 14px;
        }
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
        .div-domaine {
            padding: 0px;
        }
        .card-text {
            font-family: 'Nunito';
            font-size: 10pt;
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
    <h1><?= _getText("a.propos") ?></h1>
    <div class="row mb-2 align-items-stretch">
        <div class="col-md-6" style="display: flex;">
            <div class="div-card-text row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow position-relative" style="flex-grow: 1;">
                <div class="col p-4 d-flex flex-column position-static">
                    <h2>Presentation</h2>
                    <p class="card-text text-justify" id="txtpresentation">
                        <!-- Placeholder text goes here -->
                    </p>
                    <input type="hidden" id="txtpresentation_input" value="<?= _getText("presentation") ?>">
                </div>
                <div class="col-auto d-none d-lg-flex justify-content-center align-items-center">
                    <img src="<?= HTTP_IMG ?>presentation.gif" alt="Presentation Image">
                </div>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled" id="previousPagePresentation">
                        <button class="page-link border-0" tabindex="-1" aria-disabled="true">
                            <i class="bi bi-caret-left-fill"></i>
                        </button>
                    </li>
                    <li class="page-item" id="nextPagePresentation">
                        <button class="page-link border-0">
                            <i class="bi bi-caret-right-fill"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-md-6" style="display: flex;">
            <div class="div-card-text row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow position-relative" style="flex-grow: 1;">
                <div class="col p-4 d-flex flex-column position-static">
                    <h2>Objectif</h2>
                    <p class="card-text text-justify mb-auto" id="txtobjectif">
                        <!-- Placeholder text goes here -->
                    </p>
                    <input type="hidden" id="txtobjectif_input" value="<?= _getText("objectif") ?>">
                </div>
                <div class="col-auto d-none d-lg-flex justify-content-center align-items-center">
                    <img src="<?= HTTP_IMG ?>objectif.gif" alt="Objectif Image">
                </div>
                <ul class="pagination justify-content-center">
                    <li class="page-item disabled" id="previousPageObjectif">
                        <button class="page-link border-0" tabindex="-1" aria-disabled="true">
                            <i class="bi bi-caret-left-fill"></i>
                        </button>
                    </li>
                    <li class="page-item" id="nextPageObjectif">
                        <button class="page-link border-0">
                            <i class="bi bi-caret-right-fill"></i>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div id="img-protgerlenvironnement" class="row justify-content-center align-items-center g-2">
        <div class="col position-relative">
            <center>
                <img src="<?= HTTP_IMG ?>protgerlenvironnement.jpg" class="img-fluid" alt="Protéger l'environnement">
            </center>
            <div class="position-absolute start-0 top-0  " id="img-protgerlenvironnement-text">
                <?= _getText("text.vert.haut") ?><br><?= str_repeat("&nbsp;", 20)  ?><?= _getText("text.vert.bas") ?>
            </div>
        </div>
    </div>
</div>
<div class="container" id="divactivite">
    <h1><?= _getText("activites") ?></h1>
    <div class="row justify-content-center align-items-center g-2" style="position: relative;">
        <!--<img style="" src="<?= HTTP_IMG ?>mamsoala.jpg" alt="">-->
        <div id="photo_event">
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
                    <h2 id="titre_activite"></h2>
                </div>
            </div>
            <div id="loading" style="display: none;">
                <div class="spinner-grow  text-success" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <div class="activite-text">
                <p id="contenu_activite"></p>
            </div>
        </div>
        <div class="position-absolute bottom-0" style="padding: 2%;">
            <div class="row">
                <div class="col">
                </div>
                <div class="col">
                    <div class="row">
                        <div class="col">
                            <input type="hidden" id="txtlimit" value="0" />
                            <ul class="pager pager-activite">
                                <li><a href="javascript:void(0)" data-type="0" id="act-precedent"> <button class="btn btn-see-more"><i class="bi bi-caret-left-fill"></i></button> </a></li>
                                <li><a href="javascript:void(0)" data-type="1" id="act-suivant"><button class="btn btn-see-more"><i class="bi bi-caret-right-fill"></i></button></a></li>
                            </ul>
                        </div>
                        <div class="col">
                            <div style="text-align: right;">
                                <button class="btn btn-see-more">See more</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <h1>Nos Domaine</h1>
</div>
<div class="container div-domaine">
    <div class="row justify-content-center align-items-center g-2">
        <div class="col">
            <img class="card-img-top img-domaine" src="<?= HTTP_IMG ?>homme-lampe.png" alt="Title" />
            <br>
            <button class="btn btn-success"><i class="bi bi-123"></i></button>
            <div class="card-body">
                <h2 class="card-title">Research and technogy</h2>
                <p class="card-text">Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem </p>
                <hr>
                <div>Location 0.3 miles.</div>
            </div>
        </div>
        <div class="col">
            <img class="card-img-top img-domaine" src="<?= HTTP_IMG ?>mode-feuille.jpg" alt="Title" />
            <br>
            <button class="btn btn-success"><i class="bi bi-123"></i></button>
            <div class="card-body">
                <h2 class="card-title">development & conservation</h2>
                <p class="card-text">Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem Lorem </p>
                <hr>
                <div>Location 0.3 miles.</div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center align-items-center g-2">
        <div class="col">
            <center>
                <button class="btn btn-see-more">See more</button>
            </center>
        </div>
    </div>
</div>
<!--<div class="container" style="background-image: url('<?= HTTP_IMG ?>apres-domaine.jpg');background-size: cover;">
    <div class="row">
        <div class="col-md-6">
            <div class="h-100 p-5 text-white position-relative">
                <p class="position-absolute bottom-50 start-0 mb-0 display-6">
                    21.05.20
                </p>
                <div class="position-absolute start-0 bottom-0" style="padding: 2%;">
                    <button class="btn btn-see-more">See more</button>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="h-100 p-5 text-white text-end">
                <div class="display-1">Hiking & Backpacking</div>
                <div class="display-4">this hike is the next best option</div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <h1>Hiking And Camping Classes</h1>
        </div>
    </div>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <div class="col">
            <div class="card h-100 border-0">
                <center>
                    <img src="<?= HTTP_IMG ?>activity.gif" class="h-0" alt="...">
                </center>
                <div class="card-body text-center">
                    <h2 class="card-title">Activity</h2>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-see-more">See more</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0">
                <center>
                    <img src=" <?= HTTP_IMG ?>hiking.gif" class="h-0" alt="...">
                </center>
                <div class="card-body text-center">
                    <h2 class="card-title">Hiking</h2>
                    <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-see-more">See more</button>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card h-100 border-0">
                <center>
                    <img src=" <?= HTTP_IMG ?>montain.gif" class="h-0" alt="...">
                </center>
                <div class="card-body text-center">
                    <h2 class="card-title">Montains</h2>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-see-more">See more</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" id="last">
    <div class="row justify-content-center align-items-center g-2" style="position: relative;">
        <img style="" src="<?= HTTP_IMG ?>climb.jpg" class="w-100" alt="">
        <img style="position: absolute; top: 0; left: 0;" src="<?= HTTP_IMG ?>last.png" class="w-100" alt="">
        <div class="position-absolute start-0 top-0" id="">
            <div class="row p-5">
                <div class="col">
                    <p class="display-6">23.06.20</p>
                </div>
                <div class="col">
                    <p class="display-6">Price</p>
                    <p class="display-6">$900</p>
                </div>
                <div class="col-6">
                    <p class="display-4">mountaineering</p>
                    <p class="display-4">ice Climbing</p>
                    <p class="display-5"> 2. activities</p>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
                    <hr>
                    <p class="display-6">10 modules </p>
                    <p class="display-6">divided into 7 weekends</p>
                </div>
            </div>
        </div>
    </div>
</div>-->
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
                    <li><a href="javascript:void(0)" data-type="0" id="teams-precedent"> <button class="btn btn-see-more"><i class="bi bi-caret-left-fill"></i></button> </a></li>
                    <li><a href="javascript:void(0)" data-type="1" id="teams-suivant"><button class="btn btn-see-more"><i class="bi bi-caret-right-fill"></i></button></a></li>
                </ul>
            </center>
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
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $("#txtpresentation").height(400);
            $("#txtobjectif").height(400);
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
                        $("#titre_activite").html(r.titre);
                        $("#contenu_activite").html(r.contenu);
                        $("#photo_event").html(r.photo_event);
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