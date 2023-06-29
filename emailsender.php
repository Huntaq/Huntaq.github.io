<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Wprowadź odpowiednie zmiany, aby dostosować skrypt do Twojego serwera SMTP
    $to = "hvntaq@gmail.com";
    $subject = "Nowa wiadomość ze strony kontaktowej";
    $body = "Od: $name\nEmail: $email\nWiadomość:\n$message";

    if (mail($to, $subject, $body)) {
        // Udało się wysłać email
        echo json_encode(array("status" => "success"));
    } else {
        // Wystąpił błąd podczas wysyłania emaila
        echo json_encode(array("status" => "error"));
    }
} else {
    // Metoda żądania nie jest POST, więc odrzuć żądanie
    http_response_code(405);
}
?>
