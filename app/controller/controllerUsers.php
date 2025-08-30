<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../service.php';

// Chemin vers les images de profil utilisateur
$path_dest = '../../storage/photo/';

$action = $_GET['action'];
var_dump($_POST);
// die();

if ($action == 'create') {
    try {
        // Récupération des champs textes
        $nom_complet   = $_POST['nom_complet'];
        $email         = $_POST['email'];
        $telephone     = $_POST['telephone'];
        $adresse       = $_POST['adresse'];
        $cni           = null;
        $profil        = null;
        $role          = $_POST['role'];
        $password      = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $domaine_tech  = $_POST['domaine_tech'];
        // Fichiers uploadés
        $attestation_cv= null;
        // $photo = '';

        // Vérification si l'utilisateur existe déjà
        $data = $usersdb->readConnexion2($email,$password); 

        if ($data != false) {
            $_SESSION['erreur'] = array(
                'type' => 'warning',
                'message' => "Un utilisateur avec cet email et ce mot de passe existe déjà"
            );
        } else {
            // Upload photo de profil
            // if ($profil && $profil['size'] > 0) {
            //     $photo = $paquet->upload_image($profil, 'user', 300, 300, $path_dest);
            // }
            // Création de l'utilisateur
            $usersdb->create($nom_complet,$email,$telephone,$adresse,$cni,$profil,$role,$password,$domaine_tech,$attestation_cv);
            $_SESSION['erreur'] = array(
                'type' => 'success',
                'message' => "L'utilisateur $nom_complet a été ajouté avec succès"
            );
        }
    } catch (Exception $ex) {
        $_SESSION['erreur'] = array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : " . $ex->getMessage()
        );
    } finally {
        header('Location: ../../front/page profil utilisateur.php');
    }
}

if ($action == 'read') {
    header('Content-Type: application/json');
    try {
        $users_id = $_GET['users_id'] ?? 0;
        $data = $usersdb->read($users_id);
        http_response_code(200);
        echo json_encode($data);
    } catch (Exception $ex) {
        http_response_code(500);
        echo json_encode(array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : " . $ex->getMessage()
        ));
    }
}

if ($action == 'update') {
    try {
        $iduser       = $_GET['iduser'] ?? 0;
        $user         = $usersdb->read($iduser);

        $nom_complet  = $_POST['nom_complet'] ?? $user->nom_complet;
        $email        = $_POST['email'] ?? $user->email;
        $telephone    = $_POST['telephone'] ?? $user->telephone;
        $adresse      = $_POST['adresse'] ?? $user->adresse;
        $role         = $_POST['role'] ?? $user->role;
        $domaine_tech = $_POST['domaine_tech'] ?? $user->domaine_tech;

        $password     = $_POST['password'] ?? '';
        $password_h   = $password ? password_hash($password, PASSWORD_DEFAULT) : $user->password;

        $cni          = $_FILES['cni'] ?? null;
        $profil       = $_FILES['profil'] ?? null;
        $attestation_cv = $_FILES['attestation_cv'] ?? null;

        $photo = $user->photo;

        if (isset($_FILES['profil']) && $_FILES['profil']['size'] > 0) {
            if ($user->photo && file_exists($path_dest . $user->photo)) {
                unlink($path_dest . $user->photo);
            }
            $photo = $paquet->upload_image($_FILES['profil'], 'user', 300, 300, $path_dest);
        }

        $usersdb->update(
            $iduser,
            $nom_complet,
            $email,
            $telephone,
            $adresse,
            $cni ? $cni['name'] : $user->cni,
            $profil ? $profil['name'] : $user->profil,
            $role,
            $password_h,
            $domaine_tech,
            $attestation_cv ? $attestation_cv['name'] : $user->attestation_cv,
            $photo
        );

        $_SESSION['erreur'] = array(
            'type' => 'success',
            'message' => "L'utilisateur $nom_complet a été modifié avec succès"
        );

    } catch (Exception $ex) {
        $_SESSION['erreur'] = array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : " . $ex->getMessage()
        );
    } finally {
        header('Location:../index.php?view=user');
        exit;
    }
}

if ($action == 'delete') {
    try {
        $idusers = $_GET['iduser'] ?? 0;
        $user = $usersdb->read($idusers);

        if ($user->photo && file_exists($path_dest . $user->photo)) {
            unlink($path_dest . $user->photo);
        }

        $usersdb->delete($idusers);

        $_SESSION['erreur'] = array(
            'type' => 'success',
            'message' => "L'utilisateur $user->nom_complet a été supprimé avec succès"
        );
    } catch (Exception $ex) {
        $_SESSION['erreur'] = array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : " . $ex->getMessage()
        );
    } finally {
        header('Location:../index.php?view=user');
        exit;
    }
}
