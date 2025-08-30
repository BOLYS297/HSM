<?php 
require_once '../service.php';


// Chemin vers les images de profil utilisateur
$path_dest= '../../storage/photo/'; 

$action= $_GET['action'];
// die(var_dump($_POST));

if($action == 'create') {
    try {
    
        $intitule= $_POST['intitule'];
        $description=$_POST['description'];
        $email_client= $_POST['email_client'];
        $date_intervention= $_POST['date_intervention'];
        $lieu_intervention= $_POST['lieu_intervention'];
    
        // if(isset($_FILES['photo']) == true && $_FILES['photo']['size'] > 0) {
        //         $image= $paquet->upload_image($_FILES['photo'], 'user', 300, 300, $path_dest);
        //     }    
        $tachedb->create($intitule, $description, $email_client, $date_intervention, $lieu_intervention);
        $_SESSION['erreur']= array(
            'type' => 'success',
            'message' => "Tâche ajoutée avec succès"
        );
        header('Location:../../front/creationtache');
    }
     catch(Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
        header('Location:../../front/creationtache');
    }
}
if ($action == 'read') {
    $idtache= $_GET['idtache'];
    if(!empty($idtache)) {
        $taches= $tachedb->read($idtache);
        $_SESSION['taches']= $taches;
        header('Location:../../front/creationtache');
    } else {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "Echec de chargement de la  tâche"
        );
        header('Location:../../front/creationtache');
    }
}
if ($action == 'delete') {
    try {
        $idtache= $_GET['idtache'];
        $tachedb->delete($idtache);
        $_SESSION['erreur']= array(
            'type' => 'success',
            'message' => "Tâche supprimée avec succès"
        );
    }
    catch(Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
    }
    finally {
        header('Location:../../front/creationtache');
    }
}
    
if($action == 'update') {
    $idtache= $_GET['idtache'];
    if(!empty($idtache) && !empty($intitule) && !empty($description) && !empty($email_client) && !empty($date_intervention) && !empty($lieu_intervention)){
        $tachedb->update($idtache, $intitule, $description, $email_client, $date_intervention, $lieu_intervention);
        $_SESSION['erreur']= array(
            'type' => 'success',
            'message' => "Tâche modifiée avec succès"
        );
        header('Location:../../front/creationtache');
    } else {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "Echec de modification de la tâche"
        );
        header('Location:../../front/creationtache');
    }
}
?>