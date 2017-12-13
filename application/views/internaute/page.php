<div class="row wrapper border-bottom white-bg page-heading" style="margin-top:20px">
    <div class="col-lg-10">
        <h2>Espace Candidat <small>Plateforme de recructement de l'ART</small></h2>

    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="container">

        <div class="row">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget lazur-bg p-xl">

                        <h2>
                           
                            <?= $internaute->nom . ' ' . $internaute->prenom ?>
                        </h2>
                        <ul class="list-unstyled m-t-md">
                            <li>
                                <span class="fa fa-genderless m-r-xs"></span>
                                <label>Sexe:</label>
                               <?= $internaute->sexe ?>
                            </li>
                            <li>
                                <span class="fa fa-envelope m-r-xs"></span>
                                <label>Email:</label>
                                 <?= $internaute->mail ?>
                            </li>
                            
                            <li>
                                <span class="fa fa-phone m-r-xs"></span>
                                <label>Contact:</label>
                               <?= $internaute->telephone ?>
                            </li>
                        </ul>

                    </div>
                    <div class="widget red-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-bell fa-4x"></i>
                            <h1 class="m-xs">#</h1>
                            <h3 class="font-bold no-margins">
                                Notification
                            </h3>
                            <small>cliquer pour consulter vos notifications.</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="widget navy-bg no-padding">
                        <div class="p-m">
                            <h1 class="m-xs">#</h1>

                            <h3 class="font-bold no-margins">
                                Postulation
                            </h3><br>
                            <small>Vous avez postulé à une offre d'emploi, cliquer ici pour la consulter et suivre votre dossier Nous vous notifierons au fur et à mesure que nous traiterons votre dossier .</small>
                            <small>SI vous ne recevez pas de notification au dela de trois semaines, considerez votre demande d'emploi comme rejeté</small>
                        </div>
                        <div class="flot-chart">
                            <div class="flot-chart-content" id="flot-chart1"></div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="widget style1 lazur-bg">
                        <div class="row">
                            <div class="col-xs-4">
                                <i class="fa fa-envelope-o fa-5x"></i>
                            </div>
                            <div class="col-xs-8 text-right">
                                <span> Nouveau message </span>
                                <h2 class="font-bold">#</h2>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>    
    </div>
    