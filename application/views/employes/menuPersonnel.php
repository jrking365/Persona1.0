<div class="row wrapper border-bottom white-bg page-heading" style="margin-top:20px">
    <div class="col-lg-10">
        <h2>Liste du personnel</h2>

    </div>
    <div class="col-lg-2">

    </div>
</div>

<div class="wrapper wrapper-content">
    <div class="container">
        <div class="row"  style="margin-bottom: 20px">
            <div class="col-lg-offset-7">
                <a href="<?= base_url() ?>Employes/add" class="btn btn-lg btn-white text-success"><span class="fa fa-2x fa-user-plus"> ajouter un employé</span></a>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Afficher Employes</h5>

                    </div>


                    <div class="ibox-content">

                        <button class="btn btn-primary btn-rounded btn-block" id="btn_generalList" >liste générale </button><br>

                        <span>Département</span>
                        <select id="typeList" class=" form-control " >
                            <option></option>
                            <?php
                            /*foreach ($posteOffre as $pOffre) {
                                ?><option><?php echo $pOffre->libelle_posteOffre; ?></option>
                                <?php
                            }*/
                            ?>

                        </select>

                    </div>
                </div>
            </div> 

            <div id="show_element" class="col-lg-8">

            </div>	


        </div>



    </div>

</div>