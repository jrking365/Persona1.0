
<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-6">
        <h2>Publier une offre d'emploi</h2>
        <ol class="breadcrumb">
            <li>
                <a href="index-2.html">Accueil</a>
            </li>
            <li class="active">
                <strong>publier offre d'emploi</strong>
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
                        <i class="fa fa-edit fa-3x"></i>
                    </div>
                    <div class="col-xs-9 ">
                        <span>  </span>
                        <h3 class="font-bold"> Publier offre</h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-9">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Publier offre</h5>

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
                        <p>Remplissez le formulaire pour publier une offre d'emploi</p>
                        <div class="form-group"><label class="col-lg-2 control-label">Libbele</label>

                            <div class="col-lg-10"><input type="text" name="libelle" class="form-control" placeholder="libelle" required="" value="<?php echo set_value('libelle'); ?>"> 
                            </div>
                        </div>
                        <div class="form-group"><label class="col-lg-2 control-label">Catégorie</label>

                            <div class="col-lg-10"> 
                                <select id="typeList" class=" form-control " name="posteOffre" >
                                    <option selected="selected" ><?php echo set_value('posteOffre'); ?></option>
                                    <!--  mettre un foreach ici pour charger les valeurs -->
                                    <?php
                                   foreach ($posteOffre as $pOffre){
                                       ?><option><?php echo $pOffre->libelle; ?></option>
                                       <?php
                                   }
                                    ?>

                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group"><label class="col-lg-2 control-label">Description</label>

                            <div class="col-lg-10">
                                <textarea type="text" class="summernote form-control" name="descriptionss"  placeholder="description" required=""> <?php echo set_value('descriptionss'); ?> </textarea> 
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-2 col-lg-10">
                                <button class="btn btn-sm btn-primary btn-lg" type="submit">Publier</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



    </div>
</div>
