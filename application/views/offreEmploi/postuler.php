<div class="modal inmodal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-laptop modal-icon"></i>
                <h4 class="modal-title">Postuler A </h4>
                <small class="font-bold"><?= $offre->libelle ?></small>
            </div>

            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12 b-r"><h3 class="m-t-none m-b">A Remplir</h3>
                        <p>Remplissez les informations suivantes.</p>
                         
                        <?php echo form_open_multipart('OffreEmplois/Postuler');?>
                            <div class="form-group">
                                
                                <input type="hidden" name="idoffre" value="<?=$offre->id ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Curriculum Vitae*</label> 
                                <input type="file" placeholder="Joindre votre CV" class="form-control"name="cv">
                            </div>
                             <div class="form-group">
                                <label>Lettrede motivation*</label> 
                                <input type="file" placeholder="lettre de motivation" class="form-control"  name="motivation">
                            </div>
                             <div class="form-group">
                                <label>Scan des diplomes*</label> 
                                <input type="file" placeholder="scan des diplomes" class="form-control" name="diplomes">
                                <span class="help-block m-b-none bg-warning">Joindre vos diplome en un seul document PDF.</span>
                            </div>

                           
                            
                            
                            <div class="modal-footer">
                                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Soumettrte</button>
                            </div>

                        </form>

                    </div>
                </div>
            </div>	