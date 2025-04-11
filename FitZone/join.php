<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/script.js" defer></script>
    <title>Join Us - FitZone</title>
</head>
<body>
    <header>
        <h1>Join FitZone</h1>
    </header>
    <main>
        <form action="register_user.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Join</button>
        </form>
    </main>
    <footer>
        <p>&copy; 2023 FitZone. All rights reserved.</p>
    </footer>
</body>
</html>
