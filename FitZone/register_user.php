<?php
require_once 'db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_input($_POST['name']);
    $email = sanitize_input($_POST['email']);
    $password = $_POST['password'];

    try {
        // Check if user already exists
        $existing_user = get_user_by_email($pdo, $email);
        if ($existing_user) {
            $_SESSION['error'] = "Email already registered";
            redirect('join.php');
        }

        // Hash password and insert new user
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->execute([$name, $email, $hashed_password]);

        $_SESSION['success'] = "Registration successful! Please login.";
        redirect('login.php');
    } catch(PDOException $e) {
        $_SESSION['error'] = "Registration failed: " . $e->getMessage();
        redirect('join.php');
    }
} else {
    redirect('join.php');
}
?>
