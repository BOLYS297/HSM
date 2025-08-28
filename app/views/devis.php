<?php
$devis = $devisdb->readAll(); 
$controllerName="controllerDevis.php";        // A CHANGER
?>


<!-- <div class="d-sm-flex align-items-center justify-content-between mt-4">
    <h1>Historique des paiements</h1>
    <button class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#formModal" onclick="createForm()">
        <i class="fas fa-plus me-1"></i> 
        Ajouter un Médicament
    </button>
</div> -->



<!-- Liste des Médicaments -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Liste des devis</h6>
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
                    <table class="dataTable table table-bordered" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>iddevis</th>
                                <th>idtache</th>
                                <th>diagnostic</th>
                                <th>materiels</th>
                                <th>main_oeuvre</th>
                                <th>date_debut</th>
                                <th>date_fin</th>
                                <th>duree</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($devis != null && sizeof($devis) > 0) :     // A CHANGER
                                    $i= 0;                                                                  
                                    foreach($devis as $devi) :             // A CHANGER    
                                        $i++;
                            ?>
                            <tr>
                                <td><?= $devi->iddevis ?></td>
                                <td><?= $devi->idtache?></td>
                                <td><?= $devi->diagnostic ?></td>              // A CHANGER
                                <td><?= $devi->materiels ?></td>              // A CHANGER
                                <td><?= $devi->main_oeuvre ?></td>              // A CHANGER
                                <td><?= $devi->date_debut ?></td>              // A CHANGER
                                <td><?= $devi->date_fin ?></td> 
                                <td><?= $devi->duree ?></td> 
                                <td><?= $devi->created_at ?></td> 
                                <td><?= $devi->updated_at ?></td>  // A CHANGER                                
                                <td>
                                    <button aria-label="Modifier" class="btn btn-sm btn-warning btn-update" data-bs-toggle="modal" data-bs-target="#formModal" onclick="editForm(<?= $devi->iddevis ?>)">  
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button aria-label="Supprimer" class="btn btn-sm btn-danger btn-delete" onclick="deleteForm(<?= $devi->iddevis ?>)">  
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
                <h5 class="modal-title">Informations sur le Devis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="form_edit" id="form_edit" method="POST" action="#" enctype="multipart/form-data">
                    <input type="hidden" name="iddevis" id="iddevis" />

                    <p>
                        <label class="form-label fw-bold">
                            Entrez le diagnostic
                        </label>
                        <input type="text" name="diagnostic" id="diagnostic" required class="form-control" />
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                        Entrez les matériaux nécessaires
                        </label>
                        <textarea name="materiels" id="materiels" class="form-control"></textarea>
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                        Entrez le cout de la main d'oeuvre
                        </label>
                        <input type="text" name="main_oeuvre" id="main_oeuvre" required class="form-control" />
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                        Entrez la date du début   
                        </label>
                        <input type="text" name="date_debut" id="date_debut" required class="form-control" />
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                        Entrez la date de fin   
                        </label>
                        <input type="text" name="date_fin" id="date_fin" required class="form-control" />
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                        Entrez une duree
                        </label>
                        <input type="text" name="duree" id="duree" required class="form-control" />
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
    const controllerName= 'controller/controllerDevis.php';      // A CHANGER
    const tableid= 'iddevis';

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
                document.querySelector("#iddevis").value= data.iddevis;    
                document.querySelector("#idtache").value= data.idtache;
                document.querySelector("#diagnostic").value= data.diagnostic;
                document.querySelector("#materiels").value= data.materiels;
                document.querySelector("#main_oeuvre").value= data.main_oeuvre;
                document.querySelector("#date_debut").value= data.date_debut;
                document.querySelector("#date_fin").value= data.date_fin;
                // document.querySelector("#duree").value= data.duree;
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