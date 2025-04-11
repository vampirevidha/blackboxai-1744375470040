<?php
require_once '../db/config.php';

// Fetch all reviews from the database
try {
    $reviews = get_all_reviews($pdo);
} catch(PDOException $e) {
    $reviews = [];
    $_SESSION['error'] = "Failed to fetch reviews: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
    <title>Reviews - FitZone</title>
</head>
<body>
    <header>
        <h1>Reviews</h1>
    </header>
    <main>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="success-message"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <section class="existing-reviews">
            <h2>What Our Members Say</h2>
            <?php foreach ($reviews as $review): ?>
                <div class="review">
                    <h3><?php echo htmlspecialchars($review['name']); ?></h3>
                    <div class="rating">
                        <?php for ($i = 1; $i <= 5; $i++): ?>
                            <span class="star <?php echo $i <= $review['rating'] ? 'filled' : ''; ?>">★</span>
                        <?php endfor; ?>
                    </div>
                    <p><?php echo htmlspecialchars($review['comments']); ?></p>
                    <small>Posted on: <?php echo date('F j, Y', strtotime($review['created_at'])); ?></small>
                </div>
            <?php endforeach; ?>
        </section>

        <section class="submit-review">
            <h2>Share Your Experience</h2>
            <form action="../submit_review.php" method="post">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                
                <label for="rating">Rating:</label>
                <select id="rating" name="rating" required>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
                
                <label for="comments">Comments:</label>
                <textarea id="comments" name="comments" required></textarea>
                
                <button type="submit">Submit Review</button>
            </form>
        </section>
    </main>
    <footer>
        <p>&copy; 2023 FitZone. All rights reserved.</p>
    </footer>
</body>
</html>
