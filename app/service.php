<?php
session_start();

require_once 'models/AvisDB.php';
require_once 'models/DevisDB.php';
require_once 'models/FraisDB.php';
require_once 'models/NotificationDB.php';
require_once 'models/PaiementDB.php';
require_once 'models/TacheDB.php';
require_once 'models/UsersDB.php';
require_once __DIR__ . '/../storage/paquet.php';

$avisdb= new AvisDB();
$devisdb= new DevisDB();
$fraisdb= new FraisDB();
$notificationdb= new NotificationDB();
$paiementdb= new PaiementDB();
$tachedb= new TacheDB();
$usersdb= new UsersDB();
$paquet= new Paquet();
?>