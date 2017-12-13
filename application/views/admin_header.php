<!DOCTYPE html>
<html>



    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>PERSONA1.0</title>

        <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/font-awesome/css/font-awesome.css" rel="stylesheet">
        
         <link href="<?= base_url() ?>assets/css/plugins/dataTables/datatables.min.css" rel="stylesheet">

        <link href="<?= base_url() ?>assets/css/animate.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/plugins/summernote/summernote.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
        <link href="<?= base_url() ?>assets/css/style.css" rel="stylesheet">
        
        
        <link href="<?= base_url() ?>assets/css/plugins/footable/footable.core.css" rel="stylesheet">
        
        
       

    </head>

    <body class="">

        <div id="wrapper">

            <nav class="navbar-default navbar-static-side" role="navigation">
                <div class="sidebar-collapse">
                    <ul class="nav metismenu" id="side-menu">
                        <li class="nav-header">
                            <div class="dropdown profile-element"> 
                                <a data-toggle="dropdown" class="dropdown-toggle" src="<?= base_url() ?>assets/#">
                                    <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?= $utilisateur->prenom . ' ' . $utilisateur->nom ?></strong>
                                        </span> <span class="text-muted text-xs block"><?= $poste->nom ?> <b class="caret"></b></span> </span> </a>
                                <ul class="dropdown-menu animated fadeInRight m-t-xs">
                                    <li><a href="<?= base_url() ?>assets/profile.html">Profile</a></li>

                                    <li><a href="<?= base_url() ?>utilisateurs/deconnexion">Logout</a></li>
                                </ul>
                            </div>
                            <div class="logo-element">
                                P+
                            </div>
                        </li>
                        <li >
                            <a href="#"><i class="fa fa-th-large"></i> <span class="nav-label">Emploi</span> <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li><a href="<?= base_url() ?>Administrateurs/MenuOffre">Emploi Posté</a></li>
                                
                                <li><a href="<?= base_url() ?>OffreEmplois/create">Publier une offre d'emploi</a></li>
                                <li><a href="<?= base_url() ?>Administrateurs/entretiens">Liste des personnes invité à un entretien</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Absences</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="eric_permission.html">Permissions</a></li>
                                <li><a href="eric_congé.html">Congés</a></li>
                                <li><a href="eric_planning.html">Planning</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="mailbox.html"><i class="fa fa-envelope"></i> <span class="nav-label">Mailbox </span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="eric_mail_inbox.html">Inbox</a></li>

                                <li><a href="eric_mail_compose.html">Compose email</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-flask"></i> <span class="nav-label">Promotion</span></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Sanctions</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="eric_sanction_affectation.html">Affectation</a></li>
                                <li><a href="eric_sanction_mise a pied.html">Mise a pied</a></li>
                                <li><a href="eric_sanction_licenciement.html">Licenciement</a></li>
                            </ul>   
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Statistique</span>  </a>

                        </li>
                        <li>
                            <a href="#"><i class="fa fa-edit"></i> <span class="nav-label">Departement</span><span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="#">Liste des departements</a></li>
                            </ul>   
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-desktop"></i> <span class="nav-label">Employées</span>  <span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level collapse">
                                <li><a href="<?= base_url() ?>Employes/index">Liste du personnel</a></li>
                            </ul>
                        </li>




                    </ul>

                </div>
            </nav>

            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom">
                    <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                        <div class="navbar-header">
                            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " src="<?= base_url() ?>assets/#"><i class="fa fa-bars"></i> </a>

                        </div>
                        <ul class="nav navbar-top-links navbar-right">
                            <li>
                                <span class="m-r-sm text-muted welcome-message">Bienvenu sur la plateforme Persona.</span>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" src="<?= base_url() ?>assets/#">
                                    <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                                </a>
                                <ul class="dropdown-menu dropdown-messages">
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <a href="<?= base_url() ?>assets/profile.html" class="pull-left">
                                                <img alt="image" class="img-circle" src="<?= base_url() ?>assets/img/a7.jpg">
                                            </a>
                                            <div class="media-body">
                                                <small class="pull-right">46h ago</small>
                                                <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                                <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <a href="<?= base_url() ?>assets/profile.html" class="pull-left">
                                                <img alt="image" class="img-circle" src="<?= base_url() ?>assets/img/a4.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right text-navy">5h ago</small>
                                                <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                                <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="dropdown-messages-box">
                                            <a href="<?= base_url() ?>assets/profile.html" class="pull-left">
                                                <img alt="image" class="img-circle" src="<?= base_url() ?>assets/img/profile.jpg">
                                            </a>
                                            <div class="media-body ">
                                                <small class="pull-right">23h ago</small>
                                                <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                                <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                            <a href="<?= base_url() ?>assets/mailbox.html">
                                                <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a class="dropdown-toggle count-info" data-toggle="dropdown" src="<?= base_url() ?>assets/#">
                                    <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                                </a>
                                <ul class="dropdown-menu dropdown-alerts">
                                    <li>
                                        <a href="<?= base_url() ?>assets/mailbox.html">
                                            <div>
                                                <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?= base_url() ?>assets/profile.html">
                                            <div>
                                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                                <span class="pull-right text-muted small">12 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="<?= base_url() ?>assets/grid_options.html">
                                            <div>
                                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                                <span class="pull-right text-muted small">4 minutes ago</span>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <div class="text-center link-block">
                                            <a href="<?= base_url() ?>assets/notifications.html">
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>


                            <li>
                                <a href="<?= base_url() ?>utilisateurs/deconnexion">
                                    <i class="fa fa-sign-out"></i> Deconnexion
                                </a>
                            </li>
                        </ul>

                    </nav>
                </div>