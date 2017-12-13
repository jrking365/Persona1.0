<?php //echo date('Y-m-d'); ?>

<div class="wrapper wrapper-content">
    <div class="container">
        <div class='row'>
            <div class="col-lg-3" style="margin-top: 200px">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-info-circle fa-4x"></i>
                        </div>
                        <div class="col-xs-9 ">
                            <span>  </span>
                            <h2 class="font-bold"> Détails</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">

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
                                    <?= htmlspecialchars_decode($offre->description,ENT_HTML5) ?>

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
                                        <a  href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal"><i class="fa fa-plus-square" ></i> Postuler</a>
                                        <a  href="#"class="btn btn-white btn-sm"><i class="fa fa-backward"></i> Retourner a la liste des jobs</a>
                                    </div>
                                </div>



                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<div class="footer">
            <div class="pull-right">
                PersonaV1.0 for <strong>ART</strong>.
            </div>
            <div>
                <strong>Copyright</strong> Kenshiro &copy; 2017
            </div>
        </div>

        </div>
        </div>
        </body>



</html>



 <script src="<?=base_url()?>assets/js/jquery-3.1.1.min.js"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js"></script>