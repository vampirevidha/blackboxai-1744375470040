<?php
require_once 'db/config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitize_input($_POST['name']);
    $rating = (int)$_POST['rating'];
    $comments = sanitize_input($_POST['comments']);

    // Validate rating
    if ($rating < 1 || $rating > 5) {
        $_SESSION['error'] = "Invalid rating value";
        redirect('pages/reviews.php');
    }

    try {
        // Insert review into database
        $stmt = $pdo->prepare("INSERT INTO reviews (name, rating, comments) VALUES (?, ?, ?)");
        $stmt->execute([$name, $rating, $comments]);

        $_SESSION['success'] = "Thank you for your review!";
        redirect('pages/reviews.php');
    } catch(PDOException $e) {
        $_SESSION['error'] = "Failed to submit review: " . $e->getMessage();
        redirect('pages/reviews.php');
    }
} else {
    redirect('pages/reviews.php');
}
?>
