<?php
   require_once '../service.php';
 $action = $_GET['action'];  
if($action == 'login') {
$email = isset($_POST['email']) ? $_POST['email'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;
$role = "admin";
       if(!empty($email) && !empty($password)) {
           $login = $usersdb->readConnexion($email, $password,$role);
            if($login == false) {
                $_SESSION['erreur']= array(
                    'type' => 'danger',
                    'message' => 'Echec de connexion'
                );
                header('Location:../../login.php');
            }
            else {
                $_SESSION['erreur']= array(
                    'type' => 'success',
                    'message' => "Bienvenue $login->prenom"
                );
                $_SESSION['profil']= $login;

                if($user->role == 'Admin') {
                header('Location:../index.php?view=dashboard');
                }
                
                header('Location:../index.php?view=dashboard');
            }
   }}
?>