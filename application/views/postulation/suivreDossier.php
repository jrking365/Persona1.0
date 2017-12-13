<div class="row wrapper border-bottom white-bg page-heading" style="margin-top:20px">
    <div class="col-lg-10">
        <h2>Espace candidat <small>Suivre Dossier</small></h2>

    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-3" style="margin-top:20px">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-search-plus fa-4x"></i>
                        </div>
                        <div class="col-xs-9 ">
                            <span>  </span>
                            <h3 class="font-bold"> Suivre mes demandes d'emploi</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="ibox">
                    <div class="ibox-content">

                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>

                                    <th data-toggle="true">Titre de l'offre</th>
                                    <th data-hide="phone">Date de postulation</th>
                                    <th data-hide="all">Description</th>
                                    <th data-hide="phone">Type de poste</th>
                                    <th data-hide="phone">Status</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($dossiers as $dossier){
                                    ?>
                               
                                <tr>
                                    <td>
                                        <?= $dossier->libelle ?>
                                    </td>
                                    <td>
                                        <?= date("l jS \, F Y",  strtotime($dossier->datePostulation)) ?> 
                                    </td>
                                    <td>
                                       <?= htmlspecialchars_decode($dossier->description,ENT_HTML5) ?>
                                    </td>
                                    <td>
                                        <?= $dossier->libelle_posteOffre ?>
                                    </td>
                                    <td>
                                        <span class="label label-primary"> <?= $dossier->libelle_etatPos ?></span>
                                    </td>

                                </tr>
                                 <?php
                                }
                                ?>

                        </table>
                    </div>


                </div>



            </div>
            

        </div>
    </div>
</div>
