<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>INSPINIA | Dashboard v.4</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/plugins/footable/footable.core.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/plugins/dropzone/basic.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/plugins/dropzone/dropzone.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/plugins/jasny/jasny-bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/plugins/codemirror/codemirror.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/plugins/slick/slick.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/plugins/slick/slick-theme.css" rel="stylesheet">

    </head>

    <body class="top-navigation">

        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom white-bg">
                    <nav class="navbar navbar-static-top" role="navigation">
                        <div class="navbar-header">
                            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                <i class="fa fa-reorder"></i>
                            </button>
                            <a href="<?= base_url() ?>Internautes/index" class="navbar-brand">Persona</a>
                        </div>
                        <div class="navbar-collapse collapse" id="navbar">
                            <ul class="nav navbar-nav">

                                <li class="dropdown">
                                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle" data-toggle="dropdown"> Profil <span class="caret"></span></a>
                                    <ul role="menu" class="dropdown-menu">
                                        <li><a href="<?= base_url() ?>internautes/completerinfos">Completer infos</a></li>
                                        <li><a href="#">Modifier mot de passe</a></li>

                                    </ul>
                                </li>
                                <li class="dropdown">
                                    <a aria-expanded="false" role="button" href="<?= base_url() ?>Internautes/consulterOffre"> consulter les offres d'emploi </a>

                                </li>
                                <li class="dropdown">
                                    <a aria-expanded="false" role="button" href="<?= base_url() ?>Postulations/suivreDossier"> Suivre Mon dossier </a>

                                </li>



                            </ul>
                            <ul class="nav navbar-top-links navbar-right">
                                <li>
                                    <a href="<?= base_url() ?>Internautes/deconnexion">
                                        <i class="fa fa-sign-out"></i>Deconnexion
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
