<?php
require_once 'db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $message = sanitize_input($_POST['message']);

    try {
        // Insert contact message into database
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, message) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $message]);

        $_SESSION['success'] = "Message sent successfully! We'll get back to you soon.";
        redirect('pages/contact.php');
    } catch(PDOException $e) {
        $_SESSION['error'] = "Failed to send message: " . $e->getMessage();
        redirect('pages/contact.php');
    }
} else {
    redirect('pages/contact.php');
}
?>
