<div class="row">
     <div class="ibox">
                    <div class="ibox-content">

                        <table class="footable table table-stripped toggle-arrow-tiny" data-page-size="15">
                            <thead>
                                <tr>

                                    <th data-toggle="true">Titre de l'offre</th>
                                    <th data-hide="all">Posté par</th>
                                    <th data-hide="phone">Type de poste</th>
                                    <th data-hide="phone">Détails & Postulants</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                foreach ($listes as $liste){
                                    ?>
                               
                                <tr>
                                    <td>
                                        <?= $liste->libelle ?>
                                    </td>
                                    <td>
                                        <?= $liste->nom.' '.$liste->prenom ?> 
                                    </td>
                                    <td>
                                       <?= $liste->libelle_posteOffre ?>
                                    </td>
                                    <td>
                                        <a href="<?= base_url() ?>Postulations/postulants/<?= $liste->off_id ?>" >
                                            <span class="label label-info "> Détails</span>
                                        </a>
                                        
                                    </td>
                                   

                                </tr>
                                 <?php
                                }
                                ?>

                        </table>
                    </div>


                </div>
    
</div>