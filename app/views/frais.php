<?php
$frais = $fraisdb->readAll(); 
$controllerName="controllerFrais.php";       // A CHANGER
?>


<div class="d-sm-flex align-items-center justify-content-between mt-4">
    <h1>Frais</h1>
    <button class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#formModal" onclick="createForm()">
        <i class="fas fa-plus me-1"></i> 
        Ajouter un Frais
    </button>
</div>



<!-- Liste des Médicaments -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Liste des frais</h6>
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
                                <th>idfrais</th>
                                <th>iddevis</th>
                                <th>montant</th>
                                <th>Intitule</th>
                                <th>created_at</th>
                                <th>updated_at</th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($frais != null && sizeof($frais) > 0) :     // A CHANGER
                                    $i= 0;                                                                  
                                    foreach($frais as $fr) :             // A CHANGER    
                                        $i++;
                            ?>
                            <tr>
                                <td><?= $fr->idfrais ?></td>
                                <td><?= $fr->iddevis ?></td>
                                <td><?= $fr->montant ?></td> 
                                <td><?= $fr->intitule ?></td> 
                                <td><?= $fr->created_at ?></td> 
                                <td><?= $fr->updated_at ?></td> 
                                                            // A CHANGER
                                <td>
                                    <button aria-label="Modifier" class="btn btn-sm btn-warning btn-update" data-bs-toggle="modal" data-bs-target="#formModal" onclick="editForm(<?= $fr->frais ?>)">      // A CHANGER
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button aria-label="Supprimer" class="btn btn-sm btn-danger btn-delete" onclick="deleteForm(<?= $fr->idfrais ?>)">       // A CHANGER
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
                <h5 class="modal-title">Informations sur la categorie</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="form_edit" id="form_edit" method="POST" action="#" enctype="multipart/form-data">
                    <input type="hidden" name="idcategorie" id="idcategorie" />

                    <p>
                        <label class="form-label fw-bold">
                            Entrez l'intitulé
                        </label>
                        <input type="text" name="intitule" id="intitule" required class="form-control" />
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
    const controllerName= 'controller/controllerFrais.php';      // A CHANGER
    const tableid= 'idfrais';

    function createForm() {
      document.querySelector("#form_edit").setAttribute('action', `${controllerName}?action=create`);
    //     document.querySelector("#photo").setAttribute('required', '');
        document.querySelector("#form_edit").reset();
    }



    async function editForm(id) {
        try {
            const response= await fetch(`${controllerName}?action=read&${tableid}=${id}`);
            if(response.status == 200) {
                const data= await response.json();
                console.log(data);
                document.querySelector("#intitule").value= data.intitule;    
                // document.querySelector("#idtache").value= data.idtache;
                // document.querySelector("#idmode").value= data.idmode;
                // document.querySelector("#motif").value= data.motif;
                // document.querySelector("#montant").value= data.montant;
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