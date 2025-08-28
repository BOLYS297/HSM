<?php
require 'vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Validation basique
    if (empty($nom) || empty($email) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
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
        $mail->setFrom('dd9159360@gmail.com', 'bolys'); // Utilise ton adresse Gmail ici
        $mail->addReplyTo($email, $nom); // L'expéditeur réel
        $mail->addAddress('dd9159360@gmail.com');
        $mail->Subject = "Nouveau message de bolys";
        $mail->Body = "Nom: $nom\nEmail: $email\nMessage: $message";
        $mail->send();
        echo "<script type='text/javascript'>alert('Message envoyé avec succès');</script>";
    } catch (Exception $e) {
        echo "<script type='text/javascript'>alert('Le message n\'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}');</script>";
    }
}
?>