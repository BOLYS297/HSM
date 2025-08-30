<?php 
require_once '../service.php';

$path_dest= '../../storage/photo/'; 

$action= $_GET['action'];
// var_dump($_POST);
if($action == 'create') {
    try {
        $nom_complet= $_POST['nom_complet'];
        $objet= $_POST['objet'];
        $description= $_POST['description'];
        $notificationdb->create($nom_complet,$objet,$description);

    if (!empty($nom_complet) && !empty($email) && !empty($telephone) && !empty($sujet) && !empty($message)){
        $notificationdb->create($nom_complet,$email,$telephone,$sujet,$message);
        $_SESSION['erreur']=array(
            'type'=>'succes',
            'message'=>'notification ajoutee avec succes'
        );
    }else{
        $_SESSION['erreur']=array(
            'type'=>'danger',
            'message'=>'echec de l\'ajout de la notification'
        );
        header('Location:../../front/page contact.php');
    }
    }
        catch(Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
        header('Location:../../front/page contact.php');
    }
}
if ($action == 'read') {
    try {
        $idnotification = $_GET['idnotification'];
        $notification = $notificationdb->read($idnotification);
        if ($notification) {
            $_SESSION['notification'] = $notification;
        } else {
            $_SESSION['erreur'] = array(
                'type' => 'danger',
                'message' => 'notification introuvable'
            );
        }
    } catch (Exception $ex) {
        $_SESSION['erreur'] = array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
    }
}
if ($action == 'delete') {
    try {
        $idnotification = $_GET['idnotification'];
        $notificationdb->delete($idnotification);
        $_SESSION['erreur'] = array(
            'type' => 'success',
            'message' => 'notification supprimé avec succès'
        );
    } catch (Exception $ex) {
        $_SESSION['erreur'] = array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
    } finally {
        header('Location:../index.php?view=notification');
    }
}
    
if($action == 'update') {
    $idnotification= $_GET['idnotification'];
    try {
        $iduser= $_POST['iduser'];
        $objet= $_POST['objet'];
        $description= $_POST['description'];
        $statut= $_POST['statut'];

        if (!empty($iduser) && !empty($objet) && !empty($description) && !empty($statut)){
            $notificationdb->update($idnotification, $iduser, $objet, $description, $statut);
            $_SESSION['erreur']=array(
                'type'=>'succes',
                'message'=>'notification modifiée avec succes'
            );
        }else{
            $_SESSION['erreur']=array(
                'type'=>'danger',
                'message'=>'echec de la modification de la notification'
            );
            header('Location:../index.php?view=notification');
        }
    } catch (Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
        header('Location:../index.php?view=notification');
    }
}
?>