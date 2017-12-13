<div class="ibox float-e-margins">
    <div class="ibox-title">
        <h5>Liste des employés</h5>
       
    </div>
    <div class="ibox-content">

        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example" >
                <thead>
                    <tr>
                        
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Telephone</th>
                        <th>Matricule</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    foreach ($employes as $employe){
                        
                   ?>
                    
                    <tr class="gradeX">
                       
                        <td><?= $employe->nom ?></td>
                        <td><?= $employe->prenom ?></td>
                        <td><?= $employe->telephone ?></td>
                        <td><?= $employe->matricule ?></td>
                        <td><span class="label label-primary">Actif</span></td>
                        <td class="text-center">
                            <a href="#"  class="btn btn-white btn-sm demo3" data-toggle="modal" data-target="#myModal"><span class="fa fa-eye"></span></a>
                            <a  href="#" class="btn btn-success btn-sm demo3" data-toggle="modal" data-target="#myModal"><span class="fa fa-edit"></span></a>
                            <a  href="#" class="btn btn-danger btn-sm demo4"><span class="fa fa-times"></span></a>

                        </td>
                    </tr>
                    <?php
                     }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Telephone</th>
                        <th>Matricule</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>

    </div>
</div>







