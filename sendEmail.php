<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $subject = strip_tags(trim($_POST["subject"]));
    $message = trim($_POST["message"]);

    // This should be your email; emails must be handled by your server
    $recipient = "sipheanele@gmail.com";

    // Set the email headers.
    $headers = "From: $name <$email>";

    // Send the email.
    if (mail($recipient, $subject, $message, $headers)) {
        echo "Thank you, your message has been sent.";
    } else {
        echo "Oops, something went wrong.";
    }
} else {
    // Not a POST request, set a 403 (forbidden) response code.
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";
}
?>
