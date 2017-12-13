<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>S'inscrire à Persona</title>
        <link href="../../../assets/email_templates/styles.css" media="all" rel="stylesheet" type="text/css" />
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"></link>
    </head>

    <body>
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6">
                <div class="jumbotron" style="background-color: #179d82">
                    <center><h1>Persona1.0 </h1></center>
                </div>

                <table class="body-wrap">
                    <tr>
                        <td></td>
                        <td class="container" width="600">
                            <div class="content">
                                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                    <tr>
                                        <td class="content-wrap">
                                            <table  cellpadding="0" cellspacing="0">

                                                <tr>
                                                    <td class="content-block">
                                                        <h3>Bienvenue sur Persona</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        Vous venez de vous inscrire sur la plateforme de recrutement de l'Agence de Régulation des Télécommunications (<strong>ART</strong>). Avant de finaliser votre inscription, nous devons vérifier votre adresse email. 
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block">
                                                        Sur la page  ouverte dans votre navigateur, entrez le code à 8 chiffres qui s'affiche ci dessous.<br></br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block aligncenter"><center><br></br>
                                                        <div class="alert alert-danger"><strong> <?php echo $code ?></strong></div>
                                                        <a href="localhost/persona1.0/accueil/entercode/<?php echo $id ?>" type="button" class="btn btn-lg btn-primary">entrer le code</a>
                                                        </center><br><br></br></br></td>
                                                </tr>
                                            </table>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </td>
                        <td></td>
                    </tr>
                </table>
                <div style="background-color: #179d82" >
                    <p class="aligncenter content-block"><center>Persona1.0- ART<br> By Kenshiro &copy; 2017.</center></p>
                </div>
            </div>
        </div>
    </body>

</html>
