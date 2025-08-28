<?php
$users= $usersdb->readAll();
$controllerName="controllerUsers.php"; 
?>


<div class="d-sm-flex align-items-center justify-content-between mt-4">
    <h1>Utilisateurs</h1>
    <button class="btn btn-primary btn-md" data-bs-toggle="modal" data-bs-target="#formModal" onclick="createForm()">
        <i class="fas fa-plus me-1"></i> 
        Ajouter un Utilisateur
    </button>
</div>



<!-- Liste des Utilisateurs -->
<div class="row mt-4">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Liste des Utilisateurs</h6>
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
                    <table class="dataTable table table-bordered usersTable"width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>iduser</th>
                                <th>nom_complet</th>
                                <th>email</th>
                                <th>telephone</th>
                                <th>adresse</th>
                                <th>cni</th>
                                <th>profil</th>
                                <th>role</th>
                                <th>password</th>
                                <th>domaine_tech</th>
                                <th>attestation_cv</th>
                                <th>created_at</th>
                                <th>updated_at</th>
                                <th>Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if($users != null && sizeof($users) > 0) :
                                    $i= 0;
                                    foreach($users as $user) :
                                        $i++;
                            ?>
                            <tr>
                                <td><?= $user->iduser ?></td>
                                <!-- <td>
                                    <?php
                                        if($user->profil != null && $user->profil != '') {
                                            echo '<img src="controller/files/user/' . $user->profil . '" width="100px" />';
                                        }
                                        else {
                                            echo '<span style="color:gray;"><i class="fa fa-user-circle fa-2x"></i></span>';
                                        }
                                    ?>
                                </td> -->
                                <td><?= $user->nom_complet ?></td>
                                <td><?= $user->email ?></td>
                                <td><?= $user->telephone ?></td>
                                <td><?= $user->adresse ?></td>
                                <td><?= $user->cni ?></td>
                                <td><?= $user->profil ?></td>                                
                                <td><?= $user->role ?></td>
                                <td><?= $user->password ?></td>
                                <td><?= $user->domaine_tech ?></td>
                                <td><?= $user->attestation_cv ?></td>

                                <td>
                                    <button aria-label="Modifier" class="btn btn-sm btn-warning btn-update" data-bs-toggle="modal" data-bs-target="#formModal" onclick="editForm(<?= $user->iduser ?>)">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button aria-label="Supprimer" class="btn btn-sm btn-danger btn-delete" onclick="deleteForm(<?= $user->iduser ?>)">
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
<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Informations sur l'Utilisateur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form name="form_edit" id="form_edit" method="POST" action="#" enctype="multipart/form-data">
                    <input type="hidden" name="iduser" id="iduser" />

                    <p>
                        <label class="form-label fw-bold">
                            Entrez le nom complet
                        </label>
                        <input type="text" name="fullName" id="fullName" required class="form-control" />
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                            Entrez l'email
                        </label>
                        <input type="text" name="email" id="email" required class="form-control" />
                    </p>


                    <p>
                        <label class="form-label fw-bold">
                            Entrez le numéro de telephone
                        </label>
                        <input type="tel" name="phone" id="phone" required class="form-control" />
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                            Entrez l'addresse 
                        </label>
                        <input type="text" name="addresse" id="addresse" required class="form-control" />
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                            Sélectionnez une image de la CNI
                        </label>
                        <input type="file" name="cni" id="cni" accept=".jpg, .png, .jpeg, .gif" class="form-control" />
                        <!-- <div id="photo_view"></div> -->
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                            Sélectionnez une photo de profil
                        </label>
                        <input type="file" name="profil" id="profil" accept=".jpg, .png, .jpeg, .gif" class="form-control" />
                        <!-- <div id="photo_view"></div> -->
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                            Selectionnez le role
                        </label>
                        <select name="role" id="role">
                            <option value="cl">Client</option>
                            <option value="pr">Prestataire</option>

                        </select>
                    </p>

                    <p>
                        <label class="form-label fw-bold">
                            Entrez le mot de passe
                        </label>
                        <input type="password" name="password" id="password" required class="form-control" />
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
    const controllerName= 'controller/controllerUser.php';
    const tableid= 'iduser';

    function createForm() {
        document.querySelector("#form_edit").setAttribute('action', `${controllerName}?action=create`);
        document.querySelector("#form_edit").reset();
    }



    async function editForm(id) {
        try {
            const response= await fetch(`${controllerName}?action=read&${tableid}=${id}`);
            if(response.status == 200) {
                const data= await response.json();
                console.log(data);
                document.querySelector("#iduser").value= data.iduser;
                document.querySelector("#fullName").value= data.fullName;
                document.querySelector("#email").value= data.email;
                document.querySelector("#phone").value= data.phone;
                document.querySelector("#location").value= data.location;
                document.querySelector("#cni").value= data.cni;
                document.querySelector("#statut").value= data.statut;
                document.querySelector("#password").value= data.password;
                if(data.profil != null && data.profil != '') {
                    document.querySelector("#profil").innerHTML= `<img src="controller/files/user/${data.profil}" />`;
                }
                document.querySelector("#form_edit").setAttribute('action', `${controllerName}?action=update`);
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