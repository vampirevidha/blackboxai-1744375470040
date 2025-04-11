<?php
require_once '../db/config.php';

// Fetch all blog posts from the database
try {
    $blog_posts = get_all_blog_posts($pdo);
} catch(PDOException $e) {
    $blog_posts = [];
    $_SESSION['error'] = "Failed to fetch blog posts: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="../assets/js/script.js" defer></script>
    <title>Blog - FitZone</title>
</head>
<body>
    <header>
        <h1>FitZone Blog</h1>
    </header>
    <main>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>

        <section class="blog-posts">
            <h2>Latest Posts</h2>
            <?php if (empty($blog_posts)): ?>
                <p>No blog posts available at the moment.</p>
            <?php else: ?>
                <?php foreach ($blog_posts as $post): ?>
                    <article class="blog-post">
                        <h3><?php echo htmlspecialchars($post['title']); ?></h3>
                        <div class="post-meta">
                            <span class="author">By <?php echo htmlspecialchars($post['author']); ?></span>
                            <span class="date"><?php echo date('F j, Y', strtotime($post['created_at'])); ?></span>
                        </div>
                        <div class="post-content">
                            <?php echo nl2br(htmlspecialchars($post['content'])); ?>
                        </div>
                    </article>
                <?php endforeach; ?>
            <?php endif; ?>
        </section>

        <?php if (is_logged_in()): ?>
            <section class="create-post">
                <h2>Create New Post</h2>
                <form action="../submit_blog_post.php" method="post">
                    <label for="title">Title:</label>
                    <input type="text" id="title" name="title" required>
                    
                    <label for="content">Content:</label>
                    <textarea id="content" name="content" required></textarea>
                    
                    <button type="submit">Publish Post</button>
                </form>
            </section>
        <?php endif; ?>
    </main>
    <footer>
        <p>&copy; 2023 FitZone. All rights reserved.</p>
    </footer>
</body>
</html>
