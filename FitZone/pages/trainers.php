<?php
require_once '../db/config.php';

// Fetch all trainers from the database
try {
    $trainers = get_all_trainers($pdo);
} catch(PDOException $e) {
    $trainers = [];
    $_SESSION['error'] = "Failed to fetch trainers: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
    <title>Trainers - FitZone</title>
</head>
<body>
    <header>
        <h1>Our Trainers</h1>
    </header>
    <main>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <section class="trainers-list">
            <h2>Meet Our Expert Trainers</h2>
            <?php if (empty($trainers)): ?>
                <p>No trainers available at the moment.</p>
            <?php else: ?>
                <div class="trainers-grid">
                    <?php foreach ($trainers as $trainer): ?>
                        <div class="trainer-card">
                            <h3><?php echo htmlspecialchars($trainer['name']); ?></h3>
                            <div class="specialties">
                                <h4>Specialties:</h4>
                                <p><?php echo htmlspecialchars($trainer['specialties']); ?></p>
                            </div>
                            <div class="achievements">
                                <h4>Achievements:</h4>
                                <p><?php echo htmlspecialchars($trainer['achievements']); ?></p>
                            </div>
                            <a href="trainer_details.php?id=<?php echo $trainer['id']; ?>" class="btn">View Details</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </section>

        <?php if (is_logged_in() && isset($_SESSION['is_admin']) && $_SESSION['is_admin']): ?>
            <section class="add-trainer">
                <h2>Add New Trainer</h2>
                <form action="../add_trainer.php" method="post">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" required>
                    
                    <label for="specialties">Specialties:</label>
                    <textarea id="specialties" name="specialties" required></textarea>
                    
                    <label for="achievements">Achievements:</label>
                    <textarea id="achievements" name="achievements" required></textarea>
                    
                    <button type="submit">Add Trainer</button>
                </form>
            </section>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2023 FitZone. All rights reserved.</p>
    </footer>
</body>
</html>
