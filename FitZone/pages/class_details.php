<?php
require_once '../db/config.php';

// Get class ID from URL
$class_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch class details from database
try {
    $stmt = $pdo->prepare("
        SELECT c.*, t.name as trainer_name, t.specialties as trainer_specialties 
        FROM classes c 
        LEFT JOIN trainers t ON c.trainer_id = t.id 
        WHERE c.id = ?
    ");
    $stmt->execute([$class_id]);
    $class = $stmt->fetch();

    if (!$class) {
        $_SESSION['error'] = "Class not found";
        redirect('classes.php');
    }
} catch(PDOException $e) {
    $_SESSION['error'] = "Failed to fetch class details: " . $e->getMessage();
    redirect('classes.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
    <title>Class Details - FitZone</title>
</head>
<body>
    <header>
        <h1>Class Details</h1>
    </header>
    <main>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <section class="class-details">
            <h2><?php echo htmlspecialchars($class['name']); ?></h2>
            
            <div class="description">
                <h3>Description</h3>
                <p><?php echo nl2br(htmlspecialchars($class['description'])); ?></p>
            </div>

            <div class="schedule">
                <h3>Schedule</h3>
                <p><strong>Days:</strong> <?php echo htmlspecialchars($class['days']); ?></p>
                <p><strong>Time:</strong> <?php echo htmlspecialchars($class['start_time']); ?> - <?php echo htmlspecialchars($class['end_time']); ?></p>
            </div>

            <?php if ($class['trainer_name']): ?>
                <div class="trainer-info">
                    <h3>Instructor</h3>
                    <p><strong>Name:</strong> <?php echo htmlspecialchars($class['trainer_name']); ?></p>
                    <p><strong>Specialties:</strong> <?php echo htmlspecialchars($class['trainer_specialties']); ?></p>
                    <a href="trainer_details.php?id=<?php echo $class['trainer_id']; ?>" class="btn">View Trainer Profile</a>
                </div>
            <?php endif; ?>

            <?php if (is_logged_in()): ?>
                <div class="enrollment">
                    <h3>Join This Class</h3>
                    <form action="../enroll_class.php" method="post">
                        <input type="hidden" name="class_id" value="<?php echo $class_id; ?>">
                        <button type="submit" class="btn">Enroll Now</button>
                    </form>
                </div>
            <?php else: ?>
                <p class="login-prompt">Please <a href="../login.php">login</a> to enroll in this class.</p>
            <?php endif; ?>
        </section>

        <a href="classes.php" class="btn back-btn">Back to Classes</a>
    </main>
    <footer>
        <p>&copy; 2023 FitZone. All rights reserved.</p>
    </footer>
</body>
</html>
