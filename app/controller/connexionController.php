<?php
   require_once '../service.php';

       $email = htmlspecialchars($_POST['email']);
       $password = htmlspecialchars($_POST['password']);

       if(!empty($email) && !empty($password)) {
           $login = $usersdb->readConnexion($email, $password);
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
                header('Location:../index.phpp?view=dashboard');
            }
   }
?>