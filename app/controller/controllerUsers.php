<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once '../service.php';

// Chemin vers les images de profil utilisateur
$path_dest= '../../storage/photo/'; 

$action= $_GET['action'];

if($action == 'create') {
    try {
        $nom_complet = isset($_POST['nom_complet']) ? $_POST['nom_complet'] : '';
        $email= isset($_POST['email']) ? $_POST['email'] : '';
        $telephone= isset($_POST['telephone']) ? $_POST['telephone'] : '';
        $adresse= isset($_POST['adresse']) ? $_POST['adresse'] : '';
        $cni= isset($_FILES['cni']) ? $_FILES['cni'] : '';
        $profil= isset($_FILES['profil']) ? $_FILES['profil'] : '';
        $role= isset($_POST['role']) ? $_POST['role'] : '';
        $password= isset($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : '';
        $domaine_tech= isset($_POST['domaine_tech']) ? $_POST['domaine_tech'] : '';
        $attestation_cv= isset($_FILES['attestation_cv']) ? $_FILES['attestation_cv'] : '';
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
            if(isset($_FILES['profil']) == true && $_FILES['profil']['size'] > 0) {
                $photo= $paquet->upload_image($_FILES['profil'], 'user', 300, 300, $path_dest);
            }

            // On crée l'utilisateur avec le mot de passe hashé : $password_h
            $usersdb->create($nom_complet, $email, $telephone, $adresse, $cni, $profil, $role, $password, $domaine_tech, $attestation_cv, $photo);
            $_SESSION['erreur']= array(
                'type' => 'success',
                'message' => "L'utilisateur $nom_complet a été ajoutée avec succès"
            );
        }
        if (!$result) {
    echo "Erreur SQL : " . $mysqli->error;
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
        $iduser= $_GET['iduser'];
        $user= $usersdb->read($iduser);

        $nom_complet= $_POST['nom_complet'];
        $email= $_POST['email'];
        $telephone= $_POST['telephone'];
        $adresse= $_POST['adresse'];
        $cni= $_POST['cni'];
        $profil= $_POST['profil'];
        $role= $_POST['role'];
        $password= password_hash($_POST['password'], PASSWORD_DEFAULT);
        $domaine_tech= $_POST['domaine_tech'];
        $attestation_cv= $_POST['attestation_cv'];
        $photo= '';       

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
                $photo= $paquet->upload_image($_FILES['photo'], 'user', 300, 300, $path_dest);
            }

            $usersdb->update($iduser, $nom_complet, $email, $telephone, $adresse, $cni, $profil, $role, $password, $domaine_tech, $attestation_cv, $photo);
            $_SESSION['erreur']= array(
                'type' => 'success',
                'message' => "L'utilisateur $nom_complet a été modifiée avec succès"
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
        $idusers= $_GET['iduser'];
        $user= $usersdb->read($idusers);

        unlink($path_dest . $user->photo);
        $usersdb->delete($idusers);
        $_SESSION['erreur']= array(
            'type' => 'success',
            'message' => "L'utilisateur $nom_complet a été supprimée avec succès"
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