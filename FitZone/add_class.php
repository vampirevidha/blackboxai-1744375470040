<?php
require_once 'db/config.php';

// Check if user is logged in and is admin
if (!is_logged_in() || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
    $_SESSION['error'] = "Unauthorized access";
    redirect('pages/classes.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_input($_POST['name']);
    $description = sanitize_input($_POST['description']);
    $start_time = sanitize_input($_POST['start_time']);
    $end_time = sanitize_input($_POST['end_time']);
    $days = sanitize_input($_POST['days']);
    $trainer_id = !empty($_POST['trainer_id']) ? (int)$_POST['trainer_id'] : null;

    try {
        // Insert class into database
        $stmt = $pdo->prepare("INSERT INTO classes (name, description, start_time, end_time, days, trainer_id) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $description, $start_time, $end_time, $days, $trainer_id]);

        $_SESSION['success'] = "Class added successfully!";
        redirect('pages/classes.php');
    } catch(PDOException $e) {
        $_SESSION['error'] = "Failed to add class: " . $e->getMessage();
        redirect('pages/classes.php');
    }
} else {
    redirect('pages/classes.php');
}
?>
