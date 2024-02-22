<?php

require_once __DIR__ . '/../header.php';

if (!isset($_SESSION["id_consultant"])) {

    header('Location: ' . HTTP_PAGE_CV . 'cree.php');
    exit();
}


?>
<div class="container">
    <h1><?= _getText("changement.mdp")  ?></h1>
    <div class="row justify-content-center align-items-center g-2">

        <div class="col-md-4">
            <fieldset>
                <legend><?= _getText("identite") ?></legend>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" readonly value="<?= $_SESSION["login_compte"] ?>" />
                    <label for=""><?= _getText("login") ?></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" readonly value="<?= $_SESSION["nom_consultant"] ?>" />
                    <label for=""><?= _getText("nom") ?></label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" readonly value="<?= $_SESSION["prenom_consultant"] ?>" />
                    <label for=""><?= _getText("prenom") ?></label>
                </div>


            </fieldset>



        </div>
        <div class="col-md-4">
            <fieldset>
                <legend><?= _getText("pwd") ?></legend>
                <form id="formLogin" method="POST" action="changemdp_exec.php" class="was-validated">

                    <input type="hidden" name="id_consultant" id="id_consultant" value="<?= $_SESSION["id_consultant"] ?>">

                    <div class="form-floating mb-3">
                        <input required type="password" class="form-control" name="password_compte_ancien" />
                        <label for=""><?= _getText("ancien")  ?></label>
                        <div class="invalid-feedback"><?= _getText("message.remplir") ?></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input required type="password" class="form-control" id="password_compte_new" name="password_compte_new" />
                        <label for=""><?= _getText("nouveau")  ?></label>
                        <div class="invalid-feedback"><?= _getText("message.remplir") ?></div>
                    </div>
                    <div class="form-floating mb-3">
                        <input required type="password" class="form-control" id="password_compte_confirm" />
                        <label for=""><?= _getText("confirme")  ?></label>
                        <div class="invalid-feedback"><?= _getText("message.remplir") ?></div>
                    </div>
                    <center>
                        <button type="submit" class="btn btn-secondary">
                            <?= _getText("btnValider") ?>
                        </button>
                    </center>

                </form>
            </fieldset>
        </div>
        <div class="col-md-4">

            <?php
            if (isset($_GET["err"])) {
            ?>
                <fieldset id="alertMessage" style="display: none;">
                    <?php
                    if ($_GET["err"] == 1) {
                    ?>
                        <div class="alert alert-danger" role="alert">
                            <?= _getText("message.changement.mdp.non.valide") ?>
                        </div>
                    <?php  } ?>
                    <?php
                    if ($_GET["err"] == 0) {
                    ?>
                        <div class="alert alert-success" role="alert">
                            <?= _getText("message.changement.mdp.valide") ?>
                        </div>
                    <?php  } ?>

                </fieldset>

            <?php  } ?>

        </div>

    </div>

</div>
<?php

require_once __DIR__ . '/../../footer.php';

?>
<script type="text/javascript">
    $(document).ready(function() {
        $('#formLogin').submit(function(event) {
            // Récupérer les valeurs des champs
            var newPassword = $('#password_compte_new').val();
            var confirmPassword = $('#password_compte_confirm').val();

            // Vérifier si les valeurs sont égales
            if (newPassword !== confirmPassword) {
                // Afficher une alerte d'erreur
                alert('Les mots de passe ne correspondent pas.');

                $('#password_compte_confirm').val("");

                event.preventDefault();
            }
        });


        $('#alertMessage').fadeIn();

        // Disparaître après 3 secondes (3000 millisecondes)
        setTimeout(function() {
            $('#alertMessage').fadeOut();
        }, 5000);
    });
</script>