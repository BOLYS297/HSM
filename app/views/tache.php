<?php

// session_start();
$tache = $tachedb->readAll();
$controllerName="controllerTache.php";        
// session_start();
?>


<div class="d-sm-flex align-items-center justify-content-between mt-4">
    <h1>Taches</h1>
    <button class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#formModal" onclick="createForm()">
        <i class="fas fa-plus me-1"></i> 
        Ajouter une tache
    </button>
</div>



<!-- Liste des Médicaments -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Liste des taches</h6>
                <div class="dropdown no-arrow">
                    <a aria-label="Ouvrir le menu" class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="#"><i class="fas fa-file-export me-2"></i>Exporter</a></li>
                        <li><a class="dropdown-item" href="#"><i class="fas fa-filter me-2"></i>Filtrer</a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="dataTable table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>idtache</th>
                                <th>iduser</th>
                                <th>intitule</th>  
                                <th>description</th>
                                <th>email_client</th>
                                <th>date_intervention</th>
                                <th>lieu_intervention</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($tache != null && sizeof($tache) > 0) :     // A CHANGER
                                    $i= 0;                                                                  
                                    foreach($tache as $tch) :             // A CHANGER    
                                        $i++;
                            ?>
                            <tr>
                                <td><?= $tch->idtache ?></td>
                                <td><?= $tch->iduser ?></td>  
                                <td><?= $tch->intitule ?></td>
                                <td><?= $tch->description ?></td>                                  
                                <td><?= $tch->email_client ?></td>
                                <td><?= $tch->date_intervention ?></td>
                                <td><?= $tch->lieu_intervention ?></td>
                                <td>
                                    <button aria-label="Modifier" class="btn btn-sm btn-warning btn-update" data-bs-toggle="modal" data-bs-target="#formModal" onclick="editForm(<?= $tch->idtache ?>)">  
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button aria-label="Supprimer" class="btn btn-sm btn-danger btn-delete" onclick="deleteForm(<?= $tch->idtache ?>)">   
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                            <?php
                                    endforeach;
                                endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>






<!-- Form Modal -->
<div class="modal fade" id="formModal" tableindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Informations sur la tache</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="form_edit" id="form_edit" method="POST" action="#" enctype="multipart/form-data">
                    <input type="hidden" name="idtache" id="idtache" />

                    <p>
                        <label class="form-label fw-bold">
                            Entrez l'intitulé
                        </label>
                        <input type="text" name="idintitule" id="idintitule" required class="form-control" />
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                            Description
                        </label>
                        <textarea name="iddescription" id="description" class="form-control"></textarea>
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                            Date d'intervention
                        </label>
                        <input type="text" name="idintitule" id="idintitule" required class="form-control" />
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                            Sélectionnez une photo
                        </label>
                        <input type="file" name="upload_image" id="upload_image" accept=".jpg, .png, .jpeg, .gif" required class="form-control" />
                        <div id="photo_view"></div>
                    </p>

                    <p class="text-right">
                        <input type="reset" class="btn btn-danger" value="Effacer" data-bs-dismiss="modal" />
                        <input type="submit" class="btn btn-success" value="Enregistrer" />
                    </p>
                </form>
            </div>
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>










<script type="text/javascript">
    const controllerName= 'controller/controllerTache.php';      // A CHANGER
    const tableid= 'idtache';

    function createForm() {
        document.querySelector("#form_edit").setAttribute('action', `${controllerName}?action=create`);
        // document.querySelector("#photo").setAttribute('required', '');
        document.querySelector("#form_edit").reset();
    }



    async function editForm(id) {
        try {
            const response= await fetch(`${controllerName}?action=read&${tableid}=${id}`);
            if(response.status == 200) {
                const data= await response.json();
                console.log(data);
                // document.querySelector("#idtache").value= data.idtache;
                document.querySelector("#idtache").value= data.idtache;    
                document.querySelector("#iduser_tech").value= data.iduser_tech;
                document.querySelector("#iddomaine").value= data.iddomaine;
                document.querySelector("#reference").value= data.reference;
                document.querySelector("#intitule").value= data.intitule;
                document.querySelector("#description").value= data.description;
                document.querySelector("#date_intervention").value= data.date_intervention;
                document.querySelector("#photo1").value= data.photo1;
                document.querySelector("#statut").value= data.statut;
                // document.querySelector("#created_at").value= data.created_at;
                // document.querySelector("#updated_at").value= data.updated_at;
                // document.querySelector("#photo").removeAttribute('required');
                // document.querySelector("#photo_view").innerHTML= `<img src="controller/files/medicament/${data.photo}" />`;
                // document.querySelector("#form_edit").setAttribute('action', `${controllerName}?action=update`);
            }
        }
        catch(error) {
            console.error('Erreur : ', error);
        }
    }


    
    function deleteForm(id) {
        document.location.href= `${controllerName}?action=delete&${tableid}=${id}`;
    }
</script>