<?php
require_once 'centre.php';
$iduser_auteur = htmlspecialchars($_POST['iduser_auteur']);
$iduser_cible = htmlspecialchars($_POST['iduser_cible']);
$idtache = htmlspecialchars($_POST['idtache']);
$note = htmlspecialchars($_POST['note']);
$commentaires = htmlspecialchars($_POST['commentaires']);
$action = $_GET['action'];

if ($action == 'add') {
  if (!empty($iduser_auteur) && !empty($iduser_cible) && !empty($idtache) && !empty($note) && !empty($commentaires)) {
    $avisdb->create($iduser_auteur, $iduser_cible, $idtache, $note, $commentaires);
    $_SESSION['erreur'] = array(
      'type' => 'success',
      'message' => 'Avis ajouté avec succès'
    );
    header('Location:../index.php?view=avis');
  } else {
    $_SESSION['erreur'] = array(
      'type' => 'danger',
      'message' => 'Echec d\'ajout de l\'avis'
    );
    header('Location:../index.php?view=add_avis');
  }
}

if ($action == 'update') {
  $id = htmlspecialchars($_GET['idavis']);
  if (!empty($iduser_auteur) && !empty($iduser_cible) && !empty($idtache) && !empty($note) && !empty($commentaires)) {
    $avisdb->update($id, $iduser_auteur, $iduser_cible, $idtache, $note, $commentaires);
    $_SESSION['erreur'] = array(
      'type' => 'success',
      'message' => 'Avis modifié avec succès'
    );
    header('Location:../index.php?view=avis');
  } else {
    $_SESSION['erreur'] = array(
      'type' => 'danger',
      'message' => 'Echec de modification de l\'avis'
    );
    header('Location:../index.php?view=edit_avis');
  }
}

if ($action == 'classify') {
  $classement = $avisdb->classement();
  $_SESSION['classement'] = $classement;
  header('Location:../index.php?view=classement');

}

if ($action == 'search') {
  $keyword = htmlspecialchars($_GET['keyword']);
  if (!empty($keyword)) {
    $data = $avisdb->search($keyword);
    $_SESSION['search_results'] = $data;
    header('Location:../index.php?view=avis');
  } else {
    $_SESSION['erreur'] = array(
      'type' => 'danger',
      'message' => 'Veuillez entrer un mot-clé pour la recherche'
    );
    header('Location:../index.php?view=avis');
  }

}