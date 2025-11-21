<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name    = htmlspecialchars(trim($_POST['name']));
    $email   = htmlspecialchars(trim($_POST['email']));
    $phone   = htmlspecialchars(trim($_POST['phone']));
    $subject = htmlspecialchars(trim($_POST['subject']));
    $message = htmlspecialchars(trim($_POST['message']));

    $to = "sajitshrestha345@gmail.com";
    $subject_line = "New Contact Form Submission: " . $subject;

    $body = "You have received a new message from your website contact form.\n\n"
          . "Name: $name\n"
          . "Email: $email\n"
          . "Phone: $phone\n"
          . "Subject: $subject\n\n"
          . "Message:\n$message\n";

    $headers = "From: Greystone Wealth Capital <no-reply@greystonewealth.com.au>\r\n";
    $headers .= "Reply-To: $email\r\n";

    if (mail($to, $subject_line, $body, $headers)) {
        echo "<script>alert('Thank you! Your message has been sent successfully.');window.location.href='contact.html';</script>";
    } else {
        echo "<script>alert('Error sending message. Please try again later.');history.back();</script>";
    }
} else {
    header("Location: contact.html");
    exit;
}
?>
