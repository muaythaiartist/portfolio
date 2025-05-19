<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    exit('Method not allowed');
}

$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
$message = trim($_POST['message']);

if (!$email || !$message) {
    http_response_code(400);
    exit('Neispravan unos.');
}

$to = 'jovicpetarteam@gmail.com';  // PROMENI na svoj email
$subject = "Nova poruka sa sajta";
$body = "Email: $email\nPoruka:\n$message";

$headers = "From: jovicpetarteam@gmail.com\r\n";
$headers .= "Reply-To: $email\r\n";

if (mail($to, $subject, $body, $headers)) {
    http_response_code(3);
    echo 'Uspešno poslato.';
} else {
    http_response_code(500);
    echo 'Greška pri slanju mejla.';
}
?>

