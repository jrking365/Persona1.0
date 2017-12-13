<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta name="viewport" content="width=device-width" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Invitation Entretien</title>
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
                                                        <h3>Invitation Entretien</h3>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block text-justify">
                                                        M/Mme. <strong><?= $internaute->prenom.' '.$internaute->nom ?></strong>,<br>
                                                        Suite à votre postulation au poste de <strong><?= $offre->libelle ?></strong> à l'Agence de Régulation des Télécommunications (<strong>ART</strong>), nous avons le plaisir de vous inviter à un entretien d'embauche afin d'examiner en profondeur votre dossier
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block text-justify">
                                                        Bienvouloir repondre au mail suivant afin d'arranger une date selon votre disponibilité<br>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="content-block"><br>
                                                        <div class="alert alert-danger">Si nous ne recevons aucune reponse de votre part dans un délais d'une semaine, nous vous considérons automatiquement comme démissionaire</div>
                                                        
                                                        </td>
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
