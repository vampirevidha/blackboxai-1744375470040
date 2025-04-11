<?php
// Handle contact form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    // Process the data (e.g., save to database or send email)
    // Redirect or display a success message
    header("Location: contact.php?success=true");
    exit();
}
?>
