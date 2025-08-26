<?php
// Mapping des vues
$folder_views = "views";
$views = array(
    "avis" => "$folder_views/avis.php",
    "categorie" => "$folder_views/categorie.php",
    "devis" => "$folder_views/devis.php",
    "domaine" => "$folder_views/domaine.php",
    "frais" => "$folder_views/frais.php",
    "mode" => "$folder_views/mode.php",
    "notification" => "$folder_views/notification.php",
    "paiement" => "$folder_views/paiement.php",
    "tache" => "$folder_views/tache.php",
    "users" => "$folder_views/users.php"
);


$view = null;
if (isset($_GET['view']) == true) {
    if (array_key_exists($_GET['view'], $views) == true) {
        $view = $views[$_GET['view']];
    } else {
        $view = "$folder_views/404.php";
    }
} else {
    header("Location:../index.php");
}
