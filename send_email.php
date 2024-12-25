<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Få data från formuläret
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $description = $_POST['description'];

    // E-postinställningar
    $to = "ditt.email@exempel.com"; // Ändra till din egen e-postadress
    $subject = "Ny kundförfrågan från $name";
    $message = "Namn: $name\nTelefonnummer: $phone\nE-post: $email\nBeskrivning:\n$description";
    $headers = "From: $email";

    // Skicka e-post
    if (mail($to, $subject, $message, $headers)) {
        echo "Tack för din förfrågan, $name. Vi kommer att kontakta dig snart.";
    } else {
        echo "Något gick fel. Försök igen senare.";
    }
}
?>
