<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanera och hämta data från formuläret
    $namn = htmlspecialchars($_POST['namn']);
    $telefon = htmlspecialchars($_POST['telefon']);
    $email = htmlspecialchars($_POST['email']);
    $beskrivning = htmlspecialchars($_POST['beskrivning']);

    // E-postinställningar
    $to = "info@paketfart.se"; // Din mottagaradress
    $subject = "Ny bokning från $namn";
    $message = "
    Namn: $namn\n
    Telefon: $telefon\n
    E-post: $email\n
    Beskrivning: $beskrivning
    ";
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Skicka e-post
    if (mail($to, $subject, $message, $headers)) {
        echo "Ditt meddelande har skickats!";
    } else {
        echo "Tyvärr, något gick fel. Försök igen.";
    }
}
?>
