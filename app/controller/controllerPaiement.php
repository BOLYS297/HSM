<?php 
require_once '../service.php';

$path_dest= '../../storage/photo/'; 

$action= $_GET['action'];

if($action == 'create') {
    try {
        $idtache= $_POST['idtache'];
        $motif= $_POST['motif'];
        $intitule= $_POST['intitule'];
        $montant= $_POST['montant'];

    if (!empty($idtache) && !empty($motif) && !empty($intitule) && !empty($montant)) {
        $paiementdb->create($idtache, $motif, $intitule, $montant);
        $_SESSION['erreur']= array(
            'type' => 'success',
            'message' => "paiement ajouté avec succès"
        );
        header('Location:../index.php?view=paiement');
    } else {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "Echec d'ajout du paiement"
        );
    }}
        catch(Exception $ex) {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
        header('Location:../index.phpp?view=paiement');
    }
}
if ($action == 'read') {
    $idpaiement= $_POST['idpaiement'];
    if(!empty($idpaiement)) {
        $paiements= $paiementdb->read($idpaiement);
        $_SESSION['paiements']= $paiements;
        header('Location:../index.phpp?view=paiement');
    } else {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "Echec de chargement du paiement"
        );
        header('Location:../index.phpp?view=paiement');
    }
}
if ($action == 'delete') {
    try {
        $idpaiement = $_GET['idpaiement'];
        $paiementdb->delete($idpaiement);
        $_SESSION['erreur'] = array(
            'type' => 'success',
            'message' => 'Paiement supprimé avec succès'
        );
    } catch (Exception $ex) {
        $_SESSION['erreur'] = array(
            'type' => 'danger',
            'message' => "ERROR REQUEST : $ex->getMessage()"
        );
    } finally {
        header('Location:../index.phpp?view=paiement');
    }
}
    
if($action == 'update') {
    $idpaiement= $_GET['idpaiement'];
    $idtache= $_POST['idtache'];
    
    $motif= $_POST['motif'];
    $intitule= $_POST['intitule'];
    $montant= $_POST['montant'];

    if(!empty($idtache) && !empty($motif) && !empty($intitule) && !empty($montant)){
        $paiementdb->update($idpaiement, $idtache, $motif, $intitule, $montant);
        $_SESSION['erreur']= array(
            'type' => 'success',
            'message' => "Paiement modifié avec succès"
        );
        header('Location:../index.php?view=paiement');
    } else {
        $_SESSION['erreur']= array(
            'type' => 'danger',
            'message' => "Echec de modification du paiement"
        );
        header('Location:../index.phpp?view=paiement');
    }
}
?>