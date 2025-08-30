<?php
// Mapping des vues
$folder_views = "views";
$views = array(
    "dashboard" => "$folder_views/dashboard.php",
    "user" => "$folder_views/users.php",
    "paiement" => "$folder_views/paiement.php",
    "tache" => "$folder_views/tache.php",
    "devis" => "$folder_views/devis.php",
    "avis" => "$folder_views/avis.php",
    "notification" => "$folder_views/notification.php",
    "frais" => "$folder_views/frais.php", 
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
