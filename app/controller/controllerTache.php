<?php 
require_once '../service.php';

// Chemin vers les images de profil utilisateur
$path_dest= '../../storage/photo/'; 

$action= $_GET['action'];

if($action == 'create') {
    try {
        $iduser= $_POST['iduser'];
        $iduser_tech= $_POST['iduser_tech'];
        $reference= $_POST['reference'];
        $intitule= $_POST['intitule'];
        $description=$_POST['description'];
        $email_tech= $_POST['email_tech'];
        $email_client= $_POST['email_client'];
        $date_intervention= $_POST['date_intervention'];
        $image= '';
        $lieu_intervention= $_POST['lieu_intervention'];
        $statut= $_POST['statut'];
    if(isset($_FILES['photo']) == true && $_FILES['photo']['size'] > 0) {
                $image= $paquet->upload_image($_FILES['photo'], 'user', 300, 300, $path_dest);
            }    

    if(!empty($iduser) && !empty($iduser_tech) && !empty($reference) && !empty($intitule) && !empty($description) && !empty($email_tech) && !empty($email_client) && !empty($date_intervention) && !empty($image) && !empty($lieu_intervention) && !empty($statut)){
        $tachedb->create($iduser, $iduser_tech, $reference, $intitule, $description, $email_tech, $email_client, $date_intervention, $image, $lieu_intervention, $statut);
        $_SESSION['erreur']= array(
            'type' => 'success',
            'message' => "Tâche ajoutée avec succès"
        );
        header('Location:../index.phpp?view=tache');
    } else {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "Echec d'ajout de la tâche"
        );
        header('Location:../index.phpp?view=tache');
    }
    } catch(Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
        header('Location:../index.phpp?view=tache');
    }
}
if ($action == 'read') {
    $idtache= $_GET['idtache'];
    if(!empty($idtache)) {
        $taches= $tachedb->read($idtache);
        $_SESSION['taches']= $taches;
        header('Location:../index.phpp?view=tache');
    } else {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "Echec de chargement de la  tâche"
        );
        header('Location:../index.phpp?view=tache');
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
        header('Location:../index.phpp?view=tache');
    }
}
    
if($action == 'update') {
    $idtache= $_GET['idtache'];
    if(!empty($iduser) && !empty($iduser_tech) && !empty($reference) && !empty($intitule) && !empty($description) && !empty($email_tech) && !empty($email_client) && !empty($date_intervention) && !empty($image) && !empty($lieu_intervention) && !empty($statut)){
        $tachedb->update($idtache, $iduser, $iduser_tech, $reference, $intitule, $description, $email_tech, $email_client, $date_intervention, $image, $lieu_intervention, $statut);
        $_SESSION['erreur']= array(
            'type' => 'success',
            'message' => "Tâche modifiée avec succès"
        );
        header('Location:../index.phpp?view=tache');
    } else {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "Echec de modification de la tâche"
        );
        header('Location:../index.phpp?view=tache');
    }
}
?>