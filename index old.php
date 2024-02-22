<?php require_once "header.php";
?>

<style>
    h1 {
        padding-top: 50px;
        font-size: 38pt;

        color: #006633;
    }

    h2 {
        padding-top: 50px;
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

    #img-activite-text p {

        padding: 10px;
        font-family: 'Nunito';
        font-size: 24pt;
        width: 50%;
    }

    .div-domaine {
        padding: 100px;
    }

    .img-domaine {
        width: fit-content;
        height: 200px;
    }

    @media screen and (max-width: 1024px) {

        .title_head {
            padding-top: 10px;
            padding-left: 10px;
            font-size: 25px;
        }

        #img-protgerlenvironnement-text {
            font-size: 30pt;
        }

        #img-activite-text p {

            padding: 2px;

            font-size: 14pt;
            width: 50%;
        }

        .div-domaine {
            padding: 0px;
        }
    }
</style>

<div class="container">
    <div id="" class="row g-2 position-relative">
        <div class="col position-relative">

            <img style="width: 100%; z-index: 0;" src="<?= HTTP_IMG ?>pdc.jpg" class="img-fluid position-absolute start-0 top-0" alt="">
            <img style="width: 100%; z-index: 1;" src="<?= HTTP_IMG ?>head.png" class="img-fluid position-absolute start-0 top-0" alt="">

            <div class="position-absolute start-0 top-0" id="">
                <h1 class="title_head">
                    <p>ACTING FOR IMPROVING</p>
                    <p>RURAL ENVIRONMENT</p>
                </h1>
            </div>
            <div class="position-absolute end-0 bottom-0" style="padding: 5%;">
                <button class="btn btn-secondary">See more</button>
            </div>
        </div>
    </div>
</div>



<div class="container">

    <h1>Qui somme nous</h1>

    <div class="row mb-2 align-items-stretch">
        <div class="col-md-6" style="display: flex;">
            <div class="div-card-text row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow position-relative" style="flex-grow: 1;">
                <div class="col p-4 d-flex flex-column position-static">
                    <h2>Presentation</h2>
                    <p class="card-text">
                        AIRE est une Association dont un de ses expertises est le domaine de l'environnement allant de la conservation et la gestion des ressources naturelles à la gestion de l'environnement dans sa globalité.
                    </p>

                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination justify-content-left">

                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>

                        </ul>
                    </nav>

                </div>
                <div class="col-auto d-none d-lg-flex justify-content-center align-items-center">
                    <img src="<?= HTTP_IMG ?>presentation.gif">
                </div>
            </div>
        </div>
        <div class="col-md-6" style="display: flex;">
            <div class="div-card-text row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow position-relative" style="flex-grow: 1;">
                <div class="col p-4 d-flex flex-column position-static">
                    <h2>Objectif</h2>
                    <p class="card-text mb-auto">
                        Phasellus quis orci eget nibh feugiat pellentesque. Curabitur ex risus, volutpat in tortor vel, feugiat tristique erat. Proin mattis ligula lorem, ut gravida diam interdum pulvinar. Morbi convallis pharetra augue ac scelerisque. Mauris facilisis eu est porttitor
                    </p>

                    <!-- Pagination -->
                    <nav>
                        <ul class="pagination justify-content-left">

                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>

                        </ul>
                    </nav>
                </div>
                <div class="col-auto d-none d-lg-flex justify-content-center align-items-center">
                    <img src="<?= HTTP_IMG ?>objectif.gif">
                </div>
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
                Acting for improving<br><?= str_repeat("&nbsp;", 20)  ?>Rural environnement
            </div>
        </div>
    </div>
</div>

<div class="container">
    <h1>Nos activites</h1>
</div>

<div class="container">
    <div id="" class="row  g-2">
        <div class="col position-relative">
            <img style="width: 100%;" src="<?= HTTP_IMG ?>activite.jpg" class="img-fluid" alt="">
            <div class="position-absolute start-0 top-0  " id="img-activite-text">
                <h2>1. Cartographie</h2>

                <p>Cartographie par drone de differente classe de mangrove suivant la densite et la degradation</p>


            </div>
            <div class="position-absolute end-0 bottom-0" style="padding: 5%;">
                <button class="btn btn-secondary">See more</button>
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
                <button class="btn btn-secondary w-25">See more</button>
            </center>

        </div>

    </div>

</div>







<?php require_once "footer.php"; ?>
<script type="text/javascript">
    jQuery(document).ready(function($) {

    });
</script>