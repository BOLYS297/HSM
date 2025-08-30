<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom_complet = ($_POST['nom_complet']);
    $objet = ($_POST['objet']);
    $description = ($_POST['description']);

    // Validation basique
    if (empty($nom_complet) || empty($objet) || empty($description)) {
        echo "<script type='text/javascript'>alert('Veuillez remplir tous les champs correctement.');</script>";
        exit;
    }

    $mail = new PHPMailer(true);
    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'dd9159360@gmail.com'; // Remplace par ton adresse Gmail
        $mail->Password = 'hgnpuwopbcchslfz'; // Utilise un mot de passe d'application Google
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;
        $mail->setFrom('princetherich1@gmail.com', $nom_complet); // Utilise ton adresse Gmail ici
        $mail->addReplyTo('princetherich1@gmail.com', $nom_complet); // L'expéditeur réel
        $mail->addAddress('dd9159360@gmail.com');
        $mail->Subject = " message de $nom_complet";
        $mail->Body = "Nom: $nom_complet\nObjet: $objet\nDescription:\n$description";
        $mail->send();
        echo "<script type='text/javascript'>alert('Message envoyé avec succès');</script>";
    } catch (Exception $e) {
        echo "<script type='text/javascript'>alert('Le message n\'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}');</script>";
    }
    header("Location: ../front/page contact.php");
}
?>