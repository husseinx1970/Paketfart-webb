<?php
// Inkludera PHPMailer-klasserna via namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Inkludera PHPMailer-filerna
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Skapa ett PHPMailer-objekt
$mail = new PHPMailer(true);  // Skapar ett PHPMailer-objekt med Exception-stöd

try {
    // Serverinställningar
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';  // Använd din SMTP-server
    $mail->SMTPAuth = true;
    $mail->Username = 'info@paketfarten.se';  // Din e-postadress
    $mail->Password = 'rmoa naxc hlkf lhbk';  // Ditt lösenord eller appspecifikt lösenord
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Mottagare och avsändare
    $mail->setFrom('din.email@gmail.com', 'Paketfart');  // Avsändare
    $mail->addAddress('info@paketfarten.se', 'Mottagare');  // Mottagare

    // Innehåll
    $mail->isHTML(true);  // Skicka som HTML
    $mail->Subject = 'Ny bokning från ' . $_POST['namn'];
    $mail->Body    = 'Namn: ' . $_POST['namn'] . '<br>Telefon: ' . $_POST['telefon'] . '<br>E-post: ' . $_POST['email'] . '<br><br>Beskrivning:<br>' . $_POST['beskrivning'];

    // Skicka e-post
    $mail->send();
    echo 'Bokningen skickades!';
} catch (Exception $e) {
    echo "Något gick fel: {$mail->ErrorInfo}";
}
?>
