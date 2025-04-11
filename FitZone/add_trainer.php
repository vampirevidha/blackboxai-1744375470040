<?php
require_once 'db/config.php';

// Check if user is logged in and is admin
if (!is_logged_in() || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    $_SESSION['error'] = "Unauthorized access";
    redirect('pages/trainers.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_input($_POST['name']);
    $specialties = sanitize_input($_POST['specialties']);
    $achievements = sanitize_input($_POST['achievements']);

    try {
        // Insert trainer into database
        $stmt = $pdo->prepare("INSERT INTO trainers (name, specialties, achievements) VALUES (?, ?, ?)");
        $stmt->execute([$name, $specialties, $achievements]);

        $_SESSION['success'] = "Trainer added successfully!";
        redirect('pages/trainers.php');
    } catch(PDOException $e) {
        $_SESSION['error'] = "Failed to add trainer: " . $e->getMessage();
        redirect('pages/trainers.php');
    }
} else {
    redirect('pages/trainers.php');
}
?>
