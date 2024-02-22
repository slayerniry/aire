<?php

require_once __DIR__ . '/../../config.inc.php';

$t_cv_consultant = new Models\t_cv_consultant;

if (isset($_POST["login"])) {

    $critere["login_compte"] = $_POST["login"];
    $critere["password_compte"] = $_POST["pwd"];

    $tab = $t_cv_consultant->lireParCritere($critere);


    if (count($tab) > 0) {
        session_start();
        $_SESSION["id_consultant"] = $tab[0]["id_consultant"];
        $_SESSION["nom_consultant"] = $tab[0]["nom_consultant"];
        $_SESSION["prenom_consultant"] = $tab[0]["prenom_consultant"];
        $_SESSION["login_compte"] = $tab[0]["login_compte"];

        header('Location: ' . HTTP_PAGE_CV . 'cree.php');
        exit();
    } else {
        header('Location: ' . HTTP_PAGE_CV . 'cree.php?err=1');
        exit();
    }
} else { //deconnecte

    if (isset($_GET["dec"])) {

        session_start();

        // remove all session variables
        session_unset();

        // destroy the session 
        session_destroy();

        header('Location: ' . HTTP_PAGE_CV . 'cree.php');
        exit();
    }
}
