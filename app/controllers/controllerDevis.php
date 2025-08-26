<?php
  require_once '../centre.php';
    $idtache = htmlspecialchars($_GET['idtache']);
    $diagnostic = htmlspecialchars($_GET['diagnostic']);
    $materiels = htmlspecialchars($_POST['materiels']);
    $main_oeuvre = htmlspecialchars($_POST['main_oeuvre']);
    $date_debut = htmlspecialchars($_POST['date_debut']);
    $date_fin = htmlspecialchars($_POST['date_fin']);
    $duree = htmlspecialchars($_POST['duree']);
     
    $action=$_GET['action'];

    if($action == 'add') {
        if(!empty($idtache) && !empty($diagnostic) && !empty($materiels) && !empty($main_oeuvre) && !empty($date_debut) && !empty($date_fin) && !empty($duree)) {
            $devisdb->create($idtache, $diagnostic, $materiels, $main_oeuvre, $date_debut, $date_fin, $duree);
            $_SESSION['erreur']= array(
                'type' => 'success',
                'message' => 'Devis ajouté avec succès'
            );
            header('Location:../index.php?view=devis');
        }
        else {
            $_SESSION['erreur']= array(
                'type' => 'danger',
                'message' => 'Echec d\'ajout du devis'
            );
            header('Location:../index.php?view=add_devis');
        }
    }
     
    if ($action == 'update') {
        $id = htmlspecialchars($_GET['iddevis']);
        if (!empty($idtache) && !empty($diagnostic) && !empty($materiels) && !empty($main_oeuvre) && !empty($date_debut) && !empty($date_fin) && !empty($duree)) {
            $devisdb->update($id, $idtache, $diagnostic, $materiels, $main_oeuvre, $date_debut, $date_fin, $duree);
            $_SESSION['erreur'] = array(
                'type' => 'success',
                'message' => 'Devis modifié avec succès'
            );
            header('Location:../index.php?view=devis');
        } else {
            $_SESSION['erreur'] = array(
                'type' => 'danger',
                'message' => 'Echec de modification du devis'
            );
            header('Location:../index.php?view=edit_devis');
        }
    }
    
?>