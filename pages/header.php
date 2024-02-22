<!-- header.php -->

<?php
// Inclure l'autoloader de Composer
require_once __DIR__ . '/../config.inc.php';
require_once __DIR__ . '/../include/session.php';

loadRessource("fr");

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>ID consulting</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?= HTTP_PAGE ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= HTTP_PAGE ?>css/bootstrap-icons.min.css" rel="stylesheet">

    <link href="<?= HTTP_PAGE ?>css/bootstrap-icons-1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <link href="<?= HTTP_PAGE ?>css/select2.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= HTTP_PAGE ?>css/style.css"> <!-- Ajout du fichier CSS personnalis&eacute; -->
    <script src="<?= HTTP_PAGE ?>js/jquery-3.6.3.min.js"></script>
    <script src="<?= HTTP_PAGE ?>js/bootstrap.bundle.min.js"></script>

    <script src="<?= HTTP_PAGE ?>js/select2.min.js"></script>

    <link href="<?= HTTP_PAGE ?>summernote-0.8.18-dist/summernote-bs4.css" rel="stylesheet">
    <script src="<?= HTTP_PAGE ?>summernote-0.8.18-dist/summernote-bs4.js"></script>

    <style>
        .nav-item i {
            font-size: 26px;
        }
    </style>
    <script>

    </script>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">

                <a class="navbar-brand" href="<?= HTTP_MAIN ?>">
                    <img style="height: 100px;width:100px;" src="<?= HTTP_IMG ?>logo.png" alt=""> &nbsp; <?= _getText("nom.societe") ?>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">

                        <li class="nav-item">
                            <a class="nav-link" href="<?= HTTP_PAGE_CV ?>cree.php"> <i class="bi bi-house-door-fill"></i></a>
                        </li> <?php if (isset($_SESSION["id_consultant"])) { ?>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-menu-up"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="<?= HTTP_PAGE_CV ?>changemdp.php"> <i class="bi bi-highlighter"></i><?= _getText("changement.mdp") ?></a></li>
                                    <li><a class="dropdown-item" href="<?= HTTP_EXEC_CV ?>login.php?dec=0"><?= _getText("deconnecte") ?></a></li>
                                </ul>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </nav>

    </header>