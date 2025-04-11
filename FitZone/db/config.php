<?php
session_start();

// Database configuration
$host = 'localhost';
$dbname = 'fitzone_db';
$username = 'root';
$password = '';

// Initialize database connection variable
$pdo = null;
$db_connected = false;

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db_connected = true;
} catch(PDOException $e) {
    // Log the error but don't display it
    error_log("Database Connection Error: " . $e->getMessage());
    $db_connected = false;
}

// Helper functions that work with or without database
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function redirect($location) {
    header("Location: $location");
    exit();
}

// Database functions with fallback data
function get_user_by_email($pdo, $email) {
    global $db_connected;
    if (!$db_connected) return false;
    
    try {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    } catch(PDOException $e) {
        error_log("Database Query Error: " . $e->getMessage());
        return false;
    }
}

function get_all_classes($pdo) {
    global $db_connected;
    if (!$db_connected) {
        // Return sample data if database is not connected
        return [
            ['id' => 1, 'name' => 'Strength Training', 'description' => 'Build muscle and strength', 'start_time' => '09:00:00', 'end_time' => '10:00:00', 'days' => 'Monday, Wednesday, Friday', 'trainer_name' => 'John Doe'],
            ['id' => 2, 'name' => 'Cardio Warriors', 'description' => 'High-intensity cardio workout', 'start_time' => '11:00:00', 'end_time' => '12:00:00', 'days' => 'Tuesday, Thursday', 'trainer_name' => 'Jane Smith']
        ];
    }
    
    try {
        $stmt = $pdo->query("SELECT * FROM classes");
        return $stmt->fetchAll();
    } catch(PDOException $e) {
        error_log("Database Query Error: " . $e->getMessage());
        return [];
    }
}

function get_all_trainers($pdo) {
    global $db_connected;
    if (!$db_connected) {
        // Return sample data if database is not connected
        return [
            ['id' => 1, 'name' => 'John Doe', 'specialties' => 'Strength Training', 'achievements' => 'Certified Personal Trainer'],
            ['id' => 2, 'name' => 'Jane Smith', 'specialties' => 'Cardio, HIIT', 'achievements' => 'Fitness Champion 2022']
        ];
    }
    
    try {
        $stmt = $pdo->query("SELECT * FROM trainers");
        return $stmt->fetchAll();
    } catch(PDOException $e) {
        error_log("Database Query Error: " . $e->getMessage());
        return [];
    }
}

function get_all_blog_posts($pdo) {
    global $db_connected;
    if (!$db_connected) {
        // Return sample data if database is not connected
        return [
            ['id' => 1, 'title' => 'Getting Started with Strength Training', 'content' => 'Sample blog content...', 'author' => 'Admin', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 2, 'title' => 'Benefits of Regular Exercise', 'content' => 'Sample blog content...', 'author' => 'Admin', 'created_at' => date('Y-m-d H:i:s')]
        ];
    }
    
    try {
        $stmt = $pdo->query("SELECT * FROM blog_posts ORDER BY created_at DESC");
        return $stmt->fetchAll();
    } catch(PDOException $e) {
        error_log("Database Query Error: " . $e->getMessage());
        return [];
    }
}

function get_all_reviews($pdo) {
    global $db_connected;
    if (!$db_connected) {
        // Return sample data if database is not connected
        return [
            ['id' => 1, 'name' => 'John D.', 'rating' => 5, 'comments' => 'Great gym!', 'created_at' => date('Y-m-d H:i:s')],
            ['id' => 2, 'name' => 'Sarah M.', 'rating' => 4, 'comments' => 'Excellent trainers', 'created_at' => date('Y-m-d H:i:s')]
        ];
    }
    
    try {
        $stmt = $pdo->query("SELECT * FROM reviews ORDER BY created_at DESC");
        return $stmt->fetchAll();
    } catch(PDOException $e) {
        error_log("Database Query Error: " . $e->getMessage());
        return [];
    }
}
?>
