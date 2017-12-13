<?php
    foreach ($liste as $offre){
        ?>
<div class="col-md-4">
                    <div class="ibox">
                        <div class="ibox-content product-box">

                            <div class="product-imitation">
                                [ IMG ]
                            </div>
                            <div class="product-desc">
                                <span class="product-price">
                                    ACTIF
                                </span>
                                <small class="text-muted">Category</small>
                                <a href="#" class="product-name"> Titre:</a>



                                <div class="small m-t-xs">
                                    <?php echo $offre->libelle ?>
                                </div>
                                <div class="m-t text-righ">

                                    <a  href="<?= base_url() ?>OffreEmplois/detail_offre/<?php echo $offre->id ?>"  class="btn btn-xs btn-outline btn-primary">Detail <i class="fa fa-long-arrow-right"></i> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
				


<?php
    }
?>


