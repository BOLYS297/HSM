<?php
session_start();

require_once 'models/AvisDB.php';
require_once 'models/CategorieDB.php';
require_once 'models/DevisDB.php';
require_once 'models/DomaineDB.php';
require_once 'models/FraisDB.php';
require_once 'models/ModeDB.php';
require_once 'models/NotificationDB.php';
require_once 'models/PaiementDB.php';
require_once 'models/TacheDB.php';
require_once 'models/UsersDB.php';
require_once '../storage/paquet.php';

$avisdb= new AvisDB();
$categoriedb= new CategorieDB();
$devisdb= new DevisDB();
$domainedb= new DomaineDB();
$fraisdb= new FraisDB();
$modedb= new ModeDB();
$notificationdb= new NotificationDB();
$paiementdb= new PaiementDB();
$tachedb= new TacheDB();
$usersdb= new UsersDB();
$paquet= new Paquet();
?>