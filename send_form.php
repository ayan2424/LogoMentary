<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = htmlspecialchars(strip_tags(trim($_POST['name'])));
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = htmlspecialchars(strip_tags(trim($_POST['phone'])));
    $message = htmlspecialchars(strip_tags(trim($_POST['message'])));
    $newsletter = isset($_POST['newsletter']) ? 'Yes' : 'No';

    // Set email details
    $to = "sales@logoxoom.com"; // Your email address
    $subject = "New Contact Form Submission";
    $body = "You have received a new message from the contact form on your website:\n\n";
    $body .= "Name: $name\n";
    $body .= "Email: $email\n";
    $body .= "Phone: $phone\n";
    $body .= "Message: $message\n";
    $body .= "Newsletter Signup: $newsletter\n";

    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        echo "<p>Your form has been successfully submitted!</p>";
    } else {
        echo "<p>There was an error sending your message. Please try again later.</p>";
    }
} else {
    echo "<p>Invalid request</p>";
}
?>
