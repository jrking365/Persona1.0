<div class="row wrapper border-bottom white-bg page-heading" style="margin-top:20px">
    <div class="col-lg-10">
        <h2>Espace Candidat <small>***Completer vos informations</small></h2>

    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="container">
        <div class="row">
            <div class="row">
                <div class="col-lg-4">
                    <div class="widget lazur-bg p-xl">

                        <h2>

                            <?= $internaute->nom . ' ' . $internaute->prenom ?>
                        </h2>
                        <ul class="list-unstyled m-t-md">
                            <li>
                                <span class="fa fa-genderless m-r-xs"></span>
                                <label>Sexe:</label>
                                <?= $internaute->sexe ?>
                            </li>
                            <li>
                                <span class="fa fa-envelope m-r-xs"></span>
                                <label>Email:</label>
                                <?= $internaute->mail ?>
                            </li>

                            <li>
                                <span class="fa fa-phone m-r-xs"></span>
                                <label>Contact:</label>
                                <?= $internaute->telephone ?>
                            </li>
                        </ul>

                    </div>

                </div>
                <!-- ici -->
                <div class="col-lg-8">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Completion et modification des informations</h5>

                        </div>
                        <div class="ibox-content">
                             <?php echo validation_errors(); ?>
                            <form class="form-horizontal" method="post" >
                                
                                <p>Completer vos informations afin de pouvor postuler.</p>
                                <div class="form-group"><label class="col-lg-2 control-label">Prenom</label>

                                    <div class="col-lg-10"><input type="text" name="firstname" class="form-control" placeholder="Prenom" required="" value="<?php echo $internaute->prenom; ?>"> 
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Nom</label>

                                    <div class="col-lg-10"> <input type="text" name="lastname" class="form-control" placeholder="Nom" required="" value="<?php echo $internaute->nom; ?>"></div>
                                </div>
                                <div class="form-group"><label class="col-lg-2 control-label">Sexe</label>

                                    <div class="col-lg-10"> 
                                        <select id="typeList" class=" form-control " name="sexe" >
                                            <option selected="selected" ><?php echo $internaute->sexe; ?></option>
                                            <option>Masculin</option>
                                            <option>Feminin</option>

                                        </select>
                                    </div>
                                </div>
                               
                                <div class="form-group"><label class="col-lg-2 control-label">Téléphone</label>

                                    <div class="col-lg-10"> <input type="number" name="telephone" class="form-control" placeholder="telephone" required="" value="<?php echo $internaute->telephone ?>"></div>
                                </div>

                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-10">
                                        <button class="btn btn-sm btn-primary btn-lg" type="submit">Valider</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>





            </div>
        </div>

    </div>