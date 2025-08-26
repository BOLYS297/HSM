<?php
 require_once '../centre.php';
 
     $intitule = htmlspecialchars($_POST['intitule']);
     $action = htmlspecialchars($_GET['action']);
 
     $path_dest= '../../storage/images/categorie/';
    if ($action == 'add') {
        if (!empty($intitule)) {
            $categoriedb->create($intitule);
            $_SESSION['erreur'] = array(
                'type' => 'success',
                'message' => 'Catégorie ajoutée avec succès'
            );
            header('Location:../index.php?view=categorie');
        } else {
            $_SESSION['erreur'] = array(
                'type' => 'danger',
                'message' => 'Echec d\'ajout de la catégorie'
            );
            header('Location:../index.php?view=categorie');
        }
    }
    if ($action == 'update') {
        $id = htmlspecialchars($_GET['idcategorie']);
        if (!empty($intitule)) {
            $categoriedb->update($id, $intitule);
            $_SESSION['erreur'] = array(
                'type' => 'success',
                'message' => 'Catégorie modifiée avec succès'
            );
            header('Location:../index.php?view=categorie');
        } else {
            $_SESSION['erreur'] = array(
                'type' => 'danger',
                'message' => 'Echec de modification de la catégorie'
            );
            header('Location:../index.php?view=categorie');
        }
    }
    if ($action == 'delete') {
        try {
            $idcategorie = $_GET['idcategorie'];
            $categoriedb->delete($idcategorie);
            $_SESSION['erreur'] = array(
                'type' => 'success',
                'message' => 'Catégorie supprimée avec succès'
            );
        } catch (Exception $ex) {
            $_SESSION['erreur'] = array(
                'type' => 'danger',
                'message' => "ERROR REQUEST : $ex->getMessage()"
            );
        } finally {
            header('Location:../index.php?view=categorie');
        }
    }
?>