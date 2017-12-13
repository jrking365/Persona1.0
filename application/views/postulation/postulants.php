<div class="row wrapper border-bottom white-bg page-heading"  >
    <div class="col-sm-6">
        <h2>Details sur l'offre:</h2>
        <ol class="breadcrumb">

            <li class="active">
                <strong><?= $offre->libelle ?></strong>
            </li>
        </ol>
    </div>
</div>   



<div class="wrapper wrapper-content">
    <div class="container">
        <div class='row'>

            <div class=" col-lg-10">

                <div class="ibox product-detail">
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-5">


                                <div class="product-images">

                                    <div>
                                        <div class="image-imitation">
                                            [IMAGE 1]
                                        </div>
                                    </div>



                                </div>

                            </div>
                            <div class="col-md-7">

                                <h2 class="font-bold m-b-xs">
                                    <?= $offre->libelle ?>
                                </h2>
                                <small><?= $poste->libelle_posteOffre ?></small>

                                <hr>

                                <h4>Description de L'offre</h4>

                                <div class="small text-muted">
                                    <?= htmlspecialchars_decode($offre->description, ENT_HTML5) ?>

                                </div>
                                <dl class="small m-t-md">

                                    <dt>Document a fournir</dt>
                                    <dd>- Curriculum Vitae.</dd>
                                    <dd>- Lettre de Motivation.</dd>
                                    <dd>- Scan des diplomes.</dd>
                                </dl>
                                <hr>

                                <div>
                                    <div class="btn-group">

                                        <a  href="#"class="btn btn-white btn-sm" style="margin-right: 250px"><i class="fa fa-edit"></i>Modifier</a>
                                        <a  href="#"class="btn btn-danger btn-sm"><i class="fa fa-times"></i> Supprimer l'offre</a>
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>

        <div class="row">
            <?php
            foreach ($postulations as $postulation) {
                ?>

                <div class="col-lg-4">
                    <div class="ibox">
                        <div class="ibox-title">
                            <span class="label label-primary pull-right">Postulant</span>
                            <h5>Postulé le: <?= date("l jS \, F Y", strtotime($postulation->datePostulation)) ?></h5>
                        </div>
                        <div class="ibox-content">

                            <h4>Information sur le postulant:</h4>
                            <h5>Nom: <span><?= $postulation->nom ?></span></h5>
                            <h5>Prenom: <span><?= $postulation->prenom ?></span></h5>
                            <h5>Sexe:<?= $postulation->sexe ?></h5>
                            <h5>Telephone: <?= $postulation->telephone ?></h5>
                            <h5>email: <span class="text text-success"><?= $postulation->mail ?></span></h5>


                            <div>
                                <span>Profil complété à:</span>
                                <div class="stat-percent">100%</div>
                                <div class="progress progress-mini">
                                    <div style="width: 100%;" class="progress-bar"></div>
                                </div>
                            </div>
                            <div class="ibox-content">
                                <div class="team-members">
                                    <h4>Piéces jointes</h4>
                                    <a href="<?= base_url() ?>uploads/<?= $postulation->cv ?>" target="_blank" class="btn btn-primary ">CV <span class="fa fa-external-link"></span></a>
                                    <a href="<?= base_url() ?>uploads/<?= $postulation->lettreDeMotivation ?>"target="_blank" class="btn btn-success ">lettre de Motivation <span class="fa fa-external-link"></span></a>
                                    <a href="<?= base_url() ?>uploads/<?= $postulation->scanDiplome ?>"target="_blank" class="btn btn-warning " style="margin-top: 10px">Scan des diplomes <span class="fa fa-external-link"></span></a>

                                </div>

                            </div>
                            <div class="ibox-footer">
                                <a href="<?= base_url() ?>Postulations/inviterEntretien/<?= $postulation->id ?>" class="btn btn-white">Inviter à entretien</a>
                                <a href="#"  class="btn btn-danger">Rejeter demande</a>
                            </div>
                        </div>
                    </div>


                </div>
                <?php
            }
            ?>
        </div>


    </div>
</div>