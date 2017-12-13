<!DOCTYPE html>
<html>



    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>Persona | Inscription</title>

        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/plugins/iCheck/custom.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">

    </head>

    <body class="gray-bg">

        <div class="middle-box text-center loginscreen   animated fadeInDown">
            <div>
                <div>

                    <h1 class="logo-name">ART+</h1>

                </div>
                <h3>S'inscrire +</h3>
                <p>Créer un compte et débuter l'aventure</p>

                <?php echo validation_errors(); ?>

                <?php echo form_open('accueil/register'); ?>
                <!--<form class="m-t" role="form" method="post" >-->
                    <div class="form-group">
                        <input type="text" name="firstname" class="form-control" placeholder="Prenom" required="" value="<?php echo set_value('firstname'); ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="lastname" class="form-control" placeholder="Nom" required="" value="<?php echo set_value('lastname'); ?>">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="Email" required="" value="<?php echo set_value('email'); ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Mot de Passe" required="" value="<?php echo set_value('password'); ?>">
                    </div>
                    <div class="form-group">
                        <input type="password" name="passwordconf" class="form-control" placeholder="Confirmer le mot de passe" required="">
                    </div>
                    <div class="form-group">
                        <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> J'accepte les conditions d'utilisation et les termes de confidentialité  </label></div>
                    </div>
                    <button type="submit" class="btn btn-primary block full-width m-b">S'inscrire</button>

                    <p class="text-muted text-center"><small>Vous avez déja un compte?</small></p>
                    <a class="btn btn-sm btn-white btn-block" href="<?= base_url() ?>Accueil/login/">Login</a>
                </form>
                <p class="m-t"> <small>Persona By <i>Kenshiro</i> &copy; 2017</small> </p>
            </div>
        </div>

        <!-- Mainly scripts -->
        <script src="<?= base_url() ?>assets/js/jquery-3.1.1.min.js"></script>
        <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="<?= base_url() ?>assets/js/plugins/iCheck/icheck.min.js"></script>
        <script>
            $(document).ready(function () {
                $('.i-checks').iCheck({
                    checkboxClass: 'icheckbox_square-green',
                    radioClass: 'iradio_square-green',
                });
            });
        </script>
    </body>



</html>
