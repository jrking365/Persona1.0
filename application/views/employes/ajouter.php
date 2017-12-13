
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-6">
        <h2>Ajouter un employé</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">Accueil</a>
            </li>
            <li>
                <a href="index-2.html">liste des employés</a>
            </li>
            <li class="active">
                <strong>Ajouter un employé</strong>
            </li>
        </ol>
    </div>

</div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-3" style="margin-top: 150px">
            <div class="widget style1 lazur-bg">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-user-plus fa-3x"></i>
                    </div>
                    <div class="col-xs-9 ">

                        <h3 class="font-bold"> Créer employé</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>AJouter un Employé</h5>

                </div>
                <div class="ibox-content">
                    <?php echo validation_errors(); ?>
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger">
                            <strong> <?= $error ?> </strong>
                        </div>
                    <?php endif; ?>
                    <?php if (isset($erreur)) : ?>
                        <div class="alert alert-danger">
                            <strong> <?= $erreur ?> </strong>
                        </div>
                    <?php endif; ?>
                    <form class="form-horizontal" method="post">
                        <p>* Obligatoire</p>

                        <div class="form-group"><label class="col-lg-2 control-label">Prenom*</label>

                            <div class="col-lg-10">
                                <input type="text" name="firstname" class="form-control" placeholder="Prenom" required="" value="<?php echo set_value('firstname'); ?>">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Nom*</label>

                            <div class="col-lg-10">
                                <input type="text" name="lastname" class="form-control" placeholder="Nom" required="" value="<?php echo set_value('lastname'); ?>">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Sexe*</label>

                            <div class="col-lg-10"> 
                                <select id="typeList" class=" form-control " name="sexe" required="required" >
                                    <option selected="selected" ><?php echo set_value('sexe'); ?></option>
                                    <option>Masculin</option>
                                    <option>Feminin</option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Email*</label>

                            <div class="col-lg-10">
                                <input type="email" name="email" class="form-control" placeholder="Email" required="" value="<?php echo set_value('email'); ?>">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Téléphone*</label>

                            <div class="col-lg-10">
                                <input type="number" name="telephone" class="form-control" placeholder="telephone" required="" value="<?php echo set_value('telephone'); ?>">
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Groupe*</label>

                            <div class="col-lg-10"> 
                                <select  class=" form-control " name="groupe" >
                                    <option selected="selected" ><?php echo set_value('groupe'); ?></option>
                                    <?php
                                    foreach ($groupes as $groupe) {
                                        ?><option><?php echo $groupe->libelle; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Poste*</label>

                            <div class="col-lg-10"> 
                                <select  class=" form-control " name="poste" >
                                    <option selected="selected" ><?php echo set_value('poste'); ?></option>
                                    <?php
                                    foreach ($postes as $poste) {
                                        ?><option><?php echo $poste->nom; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>




                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn  lazur-bg " type="submit">Créer employé</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>
