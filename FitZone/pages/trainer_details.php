<?php
require_once '../db/config.php';

// Get trainer ID from URL
$trainer_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Fetch trainer details from database
try {
    $stmt = $pdo->prepare("SELECT * FROM trainers WHERE id = ?");
    $stmt->execute([$trainer_id]);
    $trainer = $stmt->fetch();

    if (!$trainer) {
        $_SESSION['error'] = "Trainer not found";
        redirect('trainers.php');
    }

    // Fetch classes taught by this trainer
    $stmt = $pdo->prepare("SELECT * FROM classes WHERE trainer_id = ?");
    $stmt->execute([$trainer_id]);
    $classes = $stmt->fetchAll();
} catch(PDOException $e) {
    $_SESSION['error'] = "Failed to fetch trainer details: " . $e->getMessage();
    redirect('trainers.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
    <title>Trainer Details - FitZone</title>
</head>
<body>
    <header>
        <h1>Trainer Details</h1>
    </header>
    <main>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <section class="trainer-details">
            <h2><?php echo htmlspecialchars($trainer['name']); ?></h2>
            
            <div class="specialties">
                <h3>Specialties</h3>
                <p><?php echo nl2br(htmlspecialchars($trainer['specialties'])); ?></p>
            </div>

            <div class="achievements">
                <h3>Achievements</h3>
                <p><?php echo nl2br(htmlspecialchars($trainer['achievements'])); ?></p>
            </div>

            <?php if (!empty($classes)): ?>
                <div class="trainer-classes">
                    <h3>Classes</h3>
                    <ul>
                        <?php foreach ($classes as $class): ?>
                            <li>
                                <h4><?php echo htmlspecialchars($class['name']); ?></h4>
                                <p><?php echo htmlspecialchars($class['description']); ?></p>
                                <p>Time: <?php echo htmlspecialchars($class['start_time']); ?> - <?php echo htmlspecialchars($class['end_time']); ?></p>
                                <p>Days: <?php echo htmlspecialchars($class['days']); ?></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </section>

        <a href="trainers.php" class="btn back-btn">Back to Trainers</a>
    </main>
    <footer>
        <p>&copy; 2023 FitZone. All rights reserved.</p>
    </footer>
</body>
</html>
