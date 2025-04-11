<?php
require_once 'db/config.php';

// Check if user is logged in
if (!is_logged_in()) {
    $_SESSION['error'] = "You must be logged in to create blog posts";
    redirect('pages/blog.php');
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = sanitize_input($_POST['title']);
    $content = sanitize_input($_POST['content']);
    $author = $_SESSION['user_name']; // Get author name from session

    try {
        // Insert blog post into database
        $stmt = $pdo->prepare("INSERT INTO blog_posts (title, content, author) VALUES (?, ?, ?)");
        $stmt->execute([$title, $content, $author]);

        $_SESSION['success'] = "Blog post published successfully!";
        redirect('pages/blog.php');
    } catch(PDOException $e) {
        $_SESSION['error'] = "Failed to publish blog post: " . $e->getMessage();
        redirect('pages/blog.php');
    }
} else {
    redirect('pages/blog.php');
}
?>
