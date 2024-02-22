<?php

require_once __DIR__ . '/../../config.inc.php';

$t_cv_consultant = new Models\t_cv_consultant;

$critere["id_consultant"] = $_POST["id_consultant"];
$critere["password_compte"] = $_POST["password_compte_ancien"];


$tab = $t_cv_consultant->lireParCritere($critere);

if (count($tab) > 0) {

    $critereModif["id_consultant"] = $_POST["id_consultant"];
    $critereModif["password_compte"] = md5($_POST["password_compte_new"]);

    $t_cv_consultant->modifier($critereModif);

    header('Location: ' . HTTP_PAGE_CV . 'changemdp.php?err=0');
    exit();
} else {
    header('Location: ' . HTTP_PAGE_CV . 'changemdp.php?err=1');
    exit();
}
