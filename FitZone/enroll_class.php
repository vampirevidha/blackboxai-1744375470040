<?php
require_once 'db/config.php';

// Check if user is logged in
if (!is_logged_in()) {
    $_SESSION['error'] = "Please login to enroll in classes";
    redirect('login.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $class_id = (int)$_POST['class_id'];
    $user_id = $_SESSION['user_id'];

    try {
        // Check if the class exists
        $stmt = $pdo->prepare("SELECT * FROM classes WHERE id = ?");
        $stmt->execute([$class_id]);
        $class = $stmt->fetch();

        if (!$class) {
            $_SESSION['error'] = "Class not found";
            redirect('pages/classes.php');
        }

        // Check if user is already enrolled
        $stmt = $pdo->prepare("SELECT * FROM enrollments WHERE user_id = ? AND class_id = ?");
        $stmt->execute([$user_id, $class_id]);
        if ($stmt->fetch()) {
            $_SESSION['error'] = "You are already enrolled in this class";
            redirect("pages/class_details.php?id=$class_id");
        }

        // Create enrollments table if it doesn't exist
        $pdo->exec("CREATE TABLE IF NOT EXISTS enrollments (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            class_id INT NOT NULL,
            enrollment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            UNIQUE KEY unique_enrollment (user_id, class_id),
            FOREIGN KEY (user_id) REFERENCES users(id),
            FOREIGN KEY (class_id) REFERENCES classes(id)
        )");

        // Enroll user in the class
        $stmt = $pdo->prepare("INSERT INTO enrollments (user_id, class_id) VALUES (?, ?)");
        $stmt->execute([$user_id, $class_id]);

        $_SESSION['success'] = "Successfully enrolled in " . $class['name'];
        redirect("pages/class_details.php?id=$class_id");
    } catch(PDOException $e) {
        $_SESSION['error'] = "Failed to enroll in class: " . $e->getMessage();
        redirect("pages/class_details.php?id=$class_id");
    }
} else {
    redirect('pages/classes.php');
}
?>
