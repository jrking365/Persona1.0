<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Espace Employe ART</title>

        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    </head>

    <body class="gray-bg">

        <div class="loginColumns animated fadeInDown">
            <div class="row">

                <div class="col-md-6">
                    <h2 class="font-bold">Bienvenu sur Persona.</h2>
                    <small>Plateforme de GRH de l'Agence de Régulation des Télécommunications(<strong>ART</strong>)</small> <br><br><br>

                    <p>
                        A partir d'une interface simplifié, consultez votre statut
                    </p>

                    <p>
                        Demandez une promotion, des congés
                    </p>

                    <p>
                       Soyez notifié au fur et a mesure
                    </p>

                    <p>
                        <small>Toutes données que nous enregistrons serons utilisées dans le cadre du traitement de votre candidature.</small>
                    </p>

                </div>
                <div class="col-md-6">
                    <div class="ibox-content">
                        <?php echo validation_errors(); ?>
                        <?php if (isset($error)) : ?>
                            <div class="alert alert-danger">
                                <strong> <?= $error ?> </strong>
                            </div>
                        <?php endif; ?>

                        <?php echo form_open('controle47/index'); ?>
                        <!--<form class="m-t" role="form" action="">-->
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Nom d'utlisateur" required="" value="<?php echo set_value('email') ?>">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required="" value="<?php echo set_value('password') ?>">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Se connecter</button>

                        <a href="#">
                            <small>Mot de passe oublié?</small>
                        </a>

                       
                        </form>
                        <p class="m-t">
                            <small>Persona1.0 By Kenshiro &copy; 2017</small>
                        </p>
                    </div>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    Copyright ART
                </div>
                <div class="col-md-6 text-right">
                    <small>© 2017</small>
                </div>
            </div>
        </div>

    </body>



</html>
