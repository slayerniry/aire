<?php

require_once __DIR__ . '/../../config.inc.php';

$t_cv_consultant = new Models\t_cv_consultant;
$t_diplome  = new Models\t_diplome;
$t_experience  = new Models\t_experience;

$tab = array();


if (isset($_GET["code"])) {

    $tab["id_consultant"] = base64_decode($_GET["code"]);
    $tab["user_code"] = $_SESSION["user_code"];

    $t_cv_consultant->supprimer($tab);

    $var_url = "suppr=" . base64_encode($_GET['code']);
} else {

    $source = $_FILES["photo_consultant"];

    $_POST["photo_consultant"] =  uploadFichierPhoto($source, "photo_consultant");

    $_POST["id_langue"] = implode("|", $_POST["id_langue"]);

    if ($_POST['id_consultant'] > 0) { //modifier 

        $id_consultant = $_POST['id_consultant'];

        $tabDiplome = array();

        if (isset($_POST['institution_diplome'])) {

            $id_diplome_NON_SUPPR = "0";

            for ($i = 0; $i < count($_POST['institution_diplome']); $i++) {

                $tabDiplome['id_consultant'] = $id_consultant;
                $tabDiplome['institution_diplome'] = $_POST['institution_diplome'][$i];
                $tabDiplome['date_diplome'] = $_POST['date_diplome'][$i];
                $tabDiplome['diplome_consultant'] = $_POST['diplome_consultant'][$i];

                $source = $_FILES["pj_diplome"]["tmp_name"][$i];
                $source_name = $_FILES["pj_diplome"]["name"][$i];

                $tabDiplome["pj_diplome"] =  uploadFichier($source,  $source_name, "pj_diplome");

                $tabDiplome['id_diplome'] = $_POST['id_diplome'][$i];

                if ($tabDiplome['id_diplome'] > 0) {
                    $t_diplome->modifier($tabDiplome);

                    $id_diplome_NON_SUPPR .= "," . $tabDiplome['id_diplome'];
                } else {
                    $t_diplome->ajouter($tabDiplome);

                    $id_diplome_NON_SUPPR .= "," . $t_diplome->lireMaxCode();
                }
            }

            $t_diplome->supprimerParConsultant($id_consultant,  $id_diplome_NON_SUPPR);

            unset($_POST['id_diplome']);
            unset($_POST['institution_diplome']);
            unset($_POST['date_diplome']);
            unset($_POST['diplome_consultant']);
        }

        $tabExperience = array();

        if (isset($_POST['experience_consultant'])) {

            $id_experience_NON_SUPPR = "0";

            for ($i = 0; $i < count($_POST['experience_consultant']); $i++) {

                $tabExperience['id_consultant'] = $id_consultant;
                $tabExperience['experience_consultant'] = $_POST['experience_consultant'][$i];
                $tabExperience['societe_experience'] = $_POST['societe_experience'][$i];
                $tabExperience['date_debut_experience'] = $_POST['date_debut_experience'][$i];
                $tabExperience['date_fin_experience'] = $_POST['date_fin_experience'][$i];

                $source = $_FILES["pj_certificat_travail"]["tmp_name"][$i];
                $source_name = $_FILES["pj_certificat_travail"]["name"][$i];


                //die($source . " " . $source_name);

                $tabExperience["pj_certificat_travail"] =  uploadFichier($source, $source_name, "pj_certificat_travail");

                $tabExperience['id_experience'] = $_POST['id_experience'][$i];

                if ($tabExperience['id_experience'] > 0) {
                    $t_experience->modifier($tabExperience);

                    $id_experience_NON_SUPPR .= "," . $tabExperience['id_experience'];
                } else {
                    $t_experience->ajouter($tabExperience);

                    $id_experience_NON_SUPPR .= "," . $t_experience->lireMaxCode();
                }
            }

            $t_experience->supprimerParConsultant($id_consultant,  $id_experience_NON_SUPPR);

            unset($_POST['id_experience']);
            unset($_POST['experience_consultant']);
            unset($_POST['societe_experience']);
            unset($_POST['date_debut_experience']);
            unset($_POST['date_fin_experience']);
        }

        if (trim($_POST["password_compte"] != "")) {
            $_POST["password_compte"] = md5($_POST["password_compte"]);
        } else {
            unset($_POST["password_compte"]);
        }

        if (isset($_POST["login_compte"])) {
            unset($_POST["login_compte"]);
        }


        $t_cv_consultant->modifier($_POST);

        $var_url = "edition=1";
    } else {

        $tabConsultant["id_langue"] = $_POST["id_langue"];
        $tabConsultant["login_compte"] = $_POST["login_compte"];
        $tabConsultant["password_compte"] = md5($_POST["password_compte"]);
        $tabConsultant["nom_consultant"] = $_POST["nom_consultant"];
        $tabConsultant["prenom_consultant"] = $_POST["prenom_consultant"];
        $tabConsultant["photo_consultant"] = $_POST["photo_consultant"];
        $tabConsultant["date_naissance"] = $_POST["date_naissance"];
        $tabConsultant["tel_consultant"] = $_POST["tel_consultant"];
        $tabConsultant["mail_consultant"] = $_POST["mail_consultant"];
        $tabConsultant["linkedin_consultant"] = $_POST["linkedin_consultant"];
        $tabConsultant["competence_consultant"] = $_POST["competence_consultant"];

        $t_cv_consultant->ajouter($tabConsultant);

        /*$id_consultant = $t_cv_consultant->lireMaxCode();

        $_POST['id_consultant'] =  $id_consultant;

        if (isset($_POST['institution_diplome'])) {
            for ($i = 0; $i < count($_POST['institution_diplome']); $i++) {

                $tabDiplome['id_consultant'] = $id_consultant;
                $tabDiplome['institution_diplome'] = $_POST['institution_diplome'][$i];
                $tabDiplome['date_diplome'] = $_POST['date_diplome'][$i];
                $tabDiplome['diplome_consultant'] = $_POST['diplome_consultant'][$i];

                $source = $_FILES["pj_diplome"]["tmp_name"][$i];
                $source_name = $_FILES["pj_diplome"]["name"][$i];

                $tabDiplome["pj_diplome"] =  uploadFichier($source,  $source_name, "pj_diplome");

                $t_diplome->ajouter($tabDiplome);
            }
        }

        if (isset($_POST['experience_consultant'])) {
            for ($i = 0; $i < count($_POST['experience_consultant']); $i++) {

                $tabExperience['id_consultant'] = $id_consultant;
                $tabExperience['experience_consultant'] = $_POST['experience_consultant'][$i];
                $tabExperience['societe_experience'] = $_POST['societe_experience'][$i];
                $tabExperience['date_debut_experience'] = $_POST['date_debut_experience'][$i];
                $tabExperience['date_fin_experience'] = $_POST['date_fin_experience'][$i];

                $source = $_FILES["pj_certificat_travail"]["tmp_name"][$i];
                $source_name = $_FILES["pj_certificat_travail"]["name"][$i];

                $tabExperience["pj_certificat_travail"] =  uploadFichier($source, $source_name, "pj_certificat_travail");

                $t_experience->ajouter($tabExperience);
            }
        }*/

        $var_url = "creation=1";
    }
}

header("location:" . HTTP_PAGE_CV . "cree.php?" . $var_url);

exit();
