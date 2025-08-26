<?php 
require_once '../centre.php';

// Chemin vers les images de profil utilisateur
$path_dest= '../../storage/photo/'; 

$action= $_GET['action'];

if($action == 'create') {
    try {
        $iddomaine= $_POST['iddomaine'];
        $nom= $_POST['nom'];
        $prenom= $_POST['prenom'];
        $adresse= $_POST['adresse'];
        $telephone= $_POST['telephone'];
        $email= $_POST['email'];
        $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role= $_POST['role'];
        $media= $_POST['media'];
        $cni= $_POST['cni'];
        $attestation_cv= $_POST['attestation_cv'];
        $photo= '';

        // Recherche pour la connexion en fonction de l'email et
        // du mot de passe original
        $data= $usersdb->readConnexion2($email, $password);

        if($data != false) {
            $_SESSION['erreur']= array(
                'type' => 'warning',
                'message' => "Email et mot de passe déjà existant"
            );
        }
        else {
            if(isset($_FILES['photo']) == true && $_FILES['photo']['size'] > 0) {
                $photo= $package->upload_image($_FILES['photo'], 'user', 300, 300, $path_dest);
            }

            // On crée l'utilisateur avec le mot de passe hashé : $password_h
            $usersdb->create($iddomaine, $nom, $prenom, $adresse, $telephone, $email, $password, $role, $media, $cni, $attestation_cv);
            $_SESSION['erreur']= array(
                'type' => 'success',
                'message' => "L'utilisateur $nom $prenom a été ajoutée avec succès"
            );
        }
    }
    catch(Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
    }
    finally {
        header('Location:../index.php?view=users');
    }
}


if($action == 'read') {
    header('Content-Type: application/json');
    try {
        $users_id= $_GET['users_id'];
        $data= $usersdb->read($users_id);
        http_response_code(200);
        echo json_encode($data);
    }
    catch(Exception $ex) {
        http_response_code(500);
        echo json_encode(array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        ));
    }
}



if($action == 'update') {
    try {
        $iduser= $_POST['iduser'];
        $user= $usersdb->read($iduser);

       $iddomaine= $_POST['iddomaine'];
        $nom= $_POST['nom'];
        $prenom= $_POST['prenom'];
        $adresse= $_POST['adresse'];
        $telephone= $_POST['telephone'];
        $email= $_POST['email'];
        $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $role= $_POST['role'];
        $media= $_POST['media'];
        $cni= $_POST['cni'];
        $attestation_cv= $_POST['attestation_cv'];
        $photo= $user->photo;

        $data= $usersdb->readConnexion2($email, $password);

        if($data != false && $data->iduser != $user->iduser) {
            $_SESSION['erreur']= array(
                'type' => 'warning',
                'message' => "Email et mot de passe déjà existant"
            );
        }
        else {
            if(isset($_FILES['photo']) == true && $_FILES['photo']['size'] > 0) {
                unlink($path_dest . $user->photo);
                $photo= $package->upload_image($_FILES['photo'], 'user', 300, 300, $path_dest);
            }

            $usersdb->update($iduser, $iddomaine, $nom, $prenom, $adresse, $telephone, $email, $password, $role, $media, $cni, $attestation_cv);
            $_SESSION['erreur']= array(
                'type' => 'success',
                'message' => "L'utilisateur $nom $prenom a été modifiée avec succès"
            );
        }
    }
    catch(Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
    }
    finally {
        header('Location:../index.php?view=user');
    }
}




if($action == 'delete') {
    try {
        $users_id= $_GET['iduser'];
        $user= $usersdb->read($iduser);

        unlink($path_dest . $user->photo);
        $usersdb->delete($iduser);
        $_SESSION['erreur']= array(
            'type' => 'success',
            'message' => "L'utilisateur $nom $prenom a été supprimée avec succès"
        );
    }
    catch(Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
    }
    finally {
        header('Location:../index.php?view=user');
    }
}




?>