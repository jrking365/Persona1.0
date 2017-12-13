
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-6">
        <h2>Faire une demande d'absence</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">Accueil</a>
            </li>
            <li class="active">
                <strong>Absence</strong>
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
                        <i class="fa fa-question-circle fa-3x"></i>
                    </div>
                    <div class="col-xs-9 ">

                        <h3 class="font-bold"> Demande d'absence</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Demande d'absence</h5>

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

                        <div class="form-group"><label class="col-lg-2 control-label">Motif*</label>

                            <div class="col-lg-10">
                                <input type="text" name="libelle" class="form-control" placeholder="Motif" required="" value="<?php echo set_value('libelle'); ?>">
                            </div>
                        </div>
                       
                        <div class="form-group"><label class="col-lg-2 control-label">Type d'absence*</label>

                            <div class="col-lg-10"> 
                                <select id="typeList" class=" form-control " name="type" required="required" >
                                    <option selected="selected" ><?php echo set_value('type'); ?></option>
                                     <?php
                                    foreach ($types as $type) {
                                        ?><option><?php echo $type->libelle; ?></option>
                                        <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
                        
                         
                        
                        
                        <div class="form-group"><label class="col-lg-2 control-label">Date début</label>

                            <div class="col-lg-10">
                                <input type="date" name="debut" class="form-control" placeholder="date de début" required="" value="<?php echo set_value('debut'); ?>">
                            </div>
                        </div>
                        
                         <div class="form-group"><label class="col-lg-2 control-label">Date de fin</label>

                            <div class="col-lg-10">
                                <input type="date" name="fin" class="form-control" placeholder="date de fin" required="" value="<?php echo set_value('fin'); ?>">
                            </div>
                        </div>
                       
                       
                        <div class="form-group"><label class="col-lg-2 control-label">Commnetaire*</label>

                            <div class="col-lg-10">
                                <input type="text" name="commentaire" class="form-control summernote" placeholder="Commentaire" required="" value="<?php echo set_value('commentaire'); ?>">
                            </div>
                        </div>
                       




                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn  lazur-bg " type="submit">Demander</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>





