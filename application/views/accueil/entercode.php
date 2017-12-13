<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Entrer code de verification</title>

        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">

        <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    </head>

    <body class="gray-bg">

        <div class="loginColumns animated fadeInDown">
            <div class="row">

                <div class="col-md-6">
                    <h2 class="font-bold">Vérification de l'email.</h2>


                    <p>
                        Veuillez entrer  le code que vous avez recu par email. ceci nous permettra de vérifier votre adresse email
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

                        <form method="post">
                        <div class="form-group">
                            <input type="text" name="code" class="form-control" placeholder="code de vérification" required="" value="<?php echo set_value('code'); ?>">
                        </div>

                        <button type="submit" class="btn btn-primary block full-width m-b">Vérifier</button>





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
