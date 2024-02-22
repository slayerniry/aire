<!-- header.php -->
<?php
// Inclure l'autoloader de Composer
require_once __DIR__ . '/config.inc.php';
loadRessource("fr");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title><?= _getText("nom.societe") ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="<?= HTTP_PAGE ?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= HTTP_PAGE ?>css/bootstrap-icons.min.css" rel="stylesheet">
    <link href="<?= HTTP_PAGE ?>css/bootstrap-icons-1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= HTTP_PAGE ?>css/style.css">
    <script src="<?= HTTP_PAGE ?>js/jquery-3.6.3.min.js"></script>
    <script src="<?= HTTP_PAGE ?>js/bootstrap.bundle.min.js"></script>
    <script src="<?= HTTP_PAGE ?>js/aire.js"></script>
    <style type="text/css">
        @font-face {
            font-family: 'Nunito Black';
            src: url('<?= HTTP_FONT ?>Nunito-Black.ttf') format('truetype');
            /* Spécifiez d'autres formats de police ici si nécessaire */
        }

        @font-face {
            font-family: 'Bebas Neue';
            src: url('<?= HTTP_FONT ?>BebasNeue-Regular.ttf') format('truetype');
            /* Ajoutez d'autres formats de police ici si nécessaire */
        }


        .nav-item {
            position: relative;
            font-size: 20px;
        }

        .navbar-nav .nav-item {
            padding: 0px 20px 0px 20px;
        }

        .nav-item:hover::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 1px;
            background-color: #000;
            /* Couleur de la ligne */
        }

        @media screen and (max-width: 1024px) {
            .navbar-toggler {
                display: block;
            }
        }

        @media screen and (max-width: 992px) {
            .navbar-nav .nav-item {
                padding: 0px 0px 0px 0px;
                font-size: 18px;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md nav-link custom-navbar navbar-light bg-light">
            <div class="container">
                <!-- Replace "your-logo.png" with the path to your logo -->
                <a class="navbar-brand" href="#">
                    <img style="height: 100px;width:100px;" src="<?= HTTP_IMG ?>logo.jpg" alt="">
                    <sapn style="color: green;"><?= _getText("nom.societe") ?></sapn>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-md-center" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="#divaccueil"><?= _getText("menu.accueil") ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#divapropos"><?= _getText("a.propos") ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#divactivite"><?= _getText("activites") ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#divcontact"><?= _getText("menu.contact") ?></a>
                        </li>
                    </ul>
                    <form style="width: 200px;" class="input-group" role="search">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
    </header>