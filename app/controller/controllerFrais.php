<?php
 require_once '../service.php';
 
     $iddevis = htmlspecialchars($_POST['iddevis']);
     $montant = htmlspecialchars($_POST['montant']);
     $intitule = htmlspecialchars($_POST['intitule']);

     $action = htmlspecialchars($_GET['action']);
 
     $path_dest= '../../storage/images/categorie/';
    if ($action == 'create') {
        if (!empty($iddevis) && !empty($montant) && !empty($intitule)) {
            $fraisdb->create($iddevis, $montant, $intitule);
            $_SESSION['erreur'] = array(
                'type' => 'success',
                'message' => 'Frais ajouté avec succès'
            );
            header('Location:../index.php?view=frais');
        } else {
            $_SESSION['erreur'] = array(
                'type' => 'danger',
                'message' => 'Echec d\'ajout du frais'
            );
            header('Location:../index.php?view=frais');
        }
    }
    if ($action == 'update') {
        $idfrais = htmlspecialchars($_GET['idfrais']);
        if (!empty($iddevis) && !empty($montant) && !empty($intitule)) {
            $fraisdb->update($idfrais, $iddevis,$montant ,$intitule);
            $_SESSION['erreur'] = array(
                'type' => 'success',
                'message' => 'Frais modifié avec succès'
            );
            header('Location:../index.php?view=frais');
        } else {
            $_SESSION['erreur'] = array(
                'type' => 'danger',
                'message' => 'Echec de modification du frais'
            );
            header('Location:../index.php?view=frais');
        }
    }
    if ($action == 'delete') {
        try {
            $idfrais = $_GET['idfrais'];
            $fraisdb->delete($idfrais);
            $_SESSION['erreur'] = array(
                'type' => 'success',
                'message' => 'Frais supprimé avec succès'
            );
        } catch (Exception $ex) {
            $_SESSION['erreur'] = array(
                'type' => 'danger',
                'message' => "ERROR REQUEST : $ex->getMessage()"
            );
        } finally {
            header('Location:../index.php?view=frais');
        }
    }
?>