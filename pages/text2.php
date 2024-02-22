<?php
// Inclure l'autoloader de Composer
require_once  __DIR__ . '/../config.inc.php';


loadRessource("fr");
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagination Bootstrap 5 avec jQuery</title>
    <!-- Bootstrap CSS -->
    <link href="<?= HTTP_PAGE ?>css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }

        #texte {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .pagination {
            margin-top: 20px;
        }

        .page-link {
            border-radius: 5px !important;
        }

        .page-item.disabled .page-link {
            background-color: #e9ecef !important;
            border-color: #dee2e6 !important;
            color: #6c757d !important;
        }

        .page-item.disabled .page-link:hover {
            cursor: not-allowed !important;
        }

        .page-link:hover {
            background-color: #f1f1f1 !important;
        }
    </style>

</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <div id="texte" class="mb-3"></div>
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled" id="previousPage">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">></a>
                        </li>
                        <li class="page-item" id="nextPage">
                            <a class="page-link" href="#">></a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</body>


</html>
<!-- jQuery -->
<script src="<?= HTTP_PAGE ?>js/jquery-3.6.3.min.js"></script>
<!-- Bootstrap JS -->
<script src="<?= HTTP_PAGE ?>js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        // Texte à afficher
        var texte = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed et augue nisi. In id mauris nec justo vehicula efficitur. Vivamus venenatis quam ac gravida tempor. Ut a dui ligula. Sed a tortor bibendum, placerat velit ac, ullamcorper orci. Aliquam id lobortis risus, nec congue lorem. Sed feugiat malesuada nunc. Maecenas luctus felis nec tincidunt scelerisque. Phasellus sit amet ligula mi. Fusce vehicula congue metus ut interdum. Phasellus ut rutrum magna. Morbi consectetur dapibus nibh, sit amet tempor libero sodales et. Aliquam ornare scelerisque ipsum, at elementum mi volutpat non. Aliquam quis semper nisl. Nulla ultricies vehicula posuere. Nam varius urna non metus fermentum tristique. Duis malesuada eleifend nisi, at consectetur turpis lobortis at. Integer vel tincidunt magna. In rutrum, purus sit amet sagittis tristique, justo libero cursus quam, sit amet dapibus libero mauris non nunc. Suspendisse potenti. Cras rhoncus vel eros eget efficitur. Nullam rutrum risus nec risus maximus malesuada. Donec non malesuada diam. Duis sit amet dictum nunc, in ultrices sapien. Phasellus a lacinia sem. Nullam dapibus nibh nec nisi interdum tincidunt. Donec ut metus vel purus convallis viverra. Sed consectetur, libero non finibus dapibus, purus est vestibulum lectus, nec semper est dui ut tellus. Cras fermentum nisl id felis rutrum, et accumsan lectus pharetra. Aenean non varius odio, eu commodo dolor. Cras dapibus risus in tempor commodo. Sed vel arcu eu lacus fringilla interdum non eget mauris. Integer ut lectus ut lorem pharetra accumsan. Phasellus sit amet ex ac risus vestibulum vestibulum et sit amet magna. Proin nec aliquet nisi, at congue nulla. Vestibulum vel felis neque. Phasellus vel ex tortor. Sed porttitor enim ac nisl aliquet, id pretium velit vestibulum. Vestibulum sit amet eros at quam tempus mattis. Curabitur at tincidunt lorem. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Integer laoreet, ex sit amet tristique consequat, elit dolor cursus velit, ac facilisis ipsum magna at ligula. Cras sagittis libero nunc, non finibus leo commodo vel. Duis vitae feugiat magna. Cras non nisl bibendum, feugiat odio ac, hendrerit nisi. Nulla facilisi. Sed sed dictum eros. Integer suscipit erat ac dolor auctor tincidunt. Donec posuere ultrices diam, et tempor ligula dapibus non. Morbi auctor purus ac metus suscipit dictum. Morbi sagittis laoreet vestibulum. Mauris ac purus id neque venenatis congue. Integer sed erat nec velit tristique hendrerit. Nulla venenatis nunc a rhoncus pharetra. In hac habitasse platea dictumst. Vestibulum et lectus ex. Nullam finibus sapien et fermentum lacinia.";

        // Split du texte en mots
        var mots = texte.split(" ");

        // Nombre de mots par page
        var motsParPage = 50;

        // Numéro de la page actuelle
        var pageActuelle = 1;

        // Affichage initial
        afficherPage(pageActuelle);

        // Clic sur le bouton "Suivant"
        $("#nextPage").click(function() {
            if (pageActuelle < Math.ceil(mots.length / motsParPage)) {
                pageActuelle++;
                afficherPage(pageActuelle);
                // Activation/désactivation des boutons en fonction de la page actuelle
                //miseAJourBoutons();
            }
        });

        // Clic sur le bouton "Précédent"
        $("#previousPage").click(function() {
            if (pageActuelle > 1) {
                pageActuelle--;
                afficherPage(pageActuelle);
                // Activation/désactivation des boutons en fonction de la page actuelle
                //miseAJourBoutons();
            }
        });


        // Fonction pour afficher la page spécifiée
        function afficherPage(page) {
            var debut = (page - 1) * motsParPage;
            var fin = debut + motsParPage;
            var pageTexte = mots.slice(debut, fin).join(" ");
            $("#texte").text(pageTexte);
        }
    });
</script>