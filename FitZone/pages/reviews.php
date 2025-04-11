<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <title>Reviews - FitZone</title>
</head>
<body>
    <header>
        <h1>Reviews</h1>
    </header>
    <main>
        <h2>Share Your Experience</h2>
        <form action="submit_review.php" method="post">
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
    </main>
    <footer>
        <p>&copy; 2023 FitZone. All rights reserved.</p>
    </footer>
</body>
</html>
