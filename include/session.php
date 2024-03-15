<?php
session_start();
$langue_par_defaut = "fr";
if (isset($_GET["l"])) {
    $langue = $_GET["l"] ;
    // Vérifier si la langue est valide (vous pouvez ajouter d'autres vérifications si nécessaire)
    if (in_array($langue, ["fr", "en"])) {
        $_SESSION["l"] = $langue;
    } else {
        $_SESSION["l"] = $langue_par_defaut;
    }
} elseif (!isset($_SESSION["l"])) {
    
    $_SESSION["l"] = $langue_par_defaut;
}
loadRessource( $_SESSION["l"]);
