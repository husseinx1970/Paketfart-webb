<?php
// Inkludera PHPMailer
require 'PHPMailer/PHPMailerAutoload.php'; // Ange rätt sökväg om du har placerat PHPMailer i en annan mapp

// Skapa instans av PHPMailer
$mail = new PHPMailer;

// Konfigurera SMTP
$mail->isSMTP();
$mail->Host = 'mail.paketfarten.se'; // SMTP-servern för paketfarten.se (detta kan variera, kolla med din e-postleverantör)
$mail->SMTPAuth = true;
$mail->Username = 'info@paketfarten.se'; // Din e-postadress
$mail->Password = 'ditt-losenord'; // E-postens lösenord eller app-lösenord
$mail->SMTPSecure = 'tls'; // 'ssl' eller 'tls', beroende på serverinställningar
$mail->Port = 587; // Använd rätt port (587 för TLS, 465 för SSL)

// Konfigurera e-postinställningar
$mail->setFrom('info@paketfarten.se', 'Paketfart'); // Avsändaradress och namn
$mail->addAddress('mottagare@exempel.com', 'Mottagare'); // Mottagarens e-postadress
$mail->Subject = 'Test e-post från Paketfart';
$mail->Body    = 'Det här är ett testmeddelande från Paketfart-formuläret.';

// Skicka e-post
if($mail->send()) {
    echo 'Meddelandet har skickats!';
} else {
    echo 'Fel: ' . $mail->ErrorInfo;
}
?>