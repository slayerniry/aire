<?php

require_once __DIR__ . '/../../config.inc.php';

$t_cv_consultant = new Models\t_cv_consultant;

$tab = $t_cv_consultant->lireParCritere($_POST);

echo (count($tab));
