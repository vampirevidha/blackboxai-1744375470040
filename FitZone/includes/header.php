<?php
require_once dirname(__DIR__) . '/db/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitZone - Where Warriors Are Made</title>
    
    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>💪</text></svg>">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Cinzel:wght@400;700&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo isset($is_page) ? '../assets/css/style.css' : 'assets/css/style.css'; ?>">
    
    <!-- Custom Styles for Header -->
    <style>
        :root {
            --dark-purple: #2D1B4E;
            --medium-purple: #4B0082;
            --light-purple: #673AB7;
            --dark-gold: #B8860B;
            --medium-gold: #FFD700;
            --light-gold: #FFE55C;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: 'Cinzel', serif;
            background: linear-gradient(135deg, #000000 0%, var(--dark-purple) 100%);
            color: white;
            min-height: 100vh;
        }

        .main-header {
            background: linear-gradient(to right, rgba(43, 27, 78, 0.9), rgba(75, 0, 130, 0.9));
            padding: 1rem;
            border-bottom: 2px solid var(--medium-gold);
            box-shadow: 0 2px 15px rgba(255, 215, 0, 0.2);
        }

        .main-nav {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 1rem;
        }

        .nav-brand h1 {
            color: var(--medium-gold);
            margin: 0;
            font-size: 2.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            color: var(--light-gold);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            transition: all 0.3s ease;
            text-transform: uppercase;
            font-size: 0.9rem;
            letter-spacing: 1px;
        }

        .nav-links a:hover {
            background: linear-gradient(145deg, var(--medium-gold), var(--dark-gold));
            color: var(--dark-purple);
            transform: translateY(-2px);
        }

        .nav-links .cta-button {
            background: linear-gradient(145deg, var(--medium-gold), var(--dark-gold));
            color: var(--dark-purple);
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            font-weight: bold;
        }

        .nav-links .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }

        .success-message, .error-message {
            padding: 1rem;
            margin: 1rem;
            border-radius: 4px;
            text-align: center;
        }

        .success-message {
            background-color: rgba(0, 255, 0, 0.2);
            color: #00FF00;
        }

        .error-message {
            background-color: rgba(255, 0, 0, 0.2);
            color: #FF0000;
        }

        @media (max-width: 768px) {
            .main-nav {
                flex-direction: column;
                text-align: center;
            }

            .nav-links {
                flex-direction: column;
                margin-top: 1rem;
            }

            .nav-links a {
                display: block;
                padding: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <header class="main-header">
        <nav class="main-nav">
            <div class="nav-brand">
                <h1><i class="fas fa-dumbbell"></i> FitZone</h1>
            </div>
            <ul class="nav-links">
                <li><a href="<?php echo isset($is_page) ? '../index.php' : 'index.php'; ?>">Home</a></li>
                <li><a href="<?php echo isset($is_page) ? 'about.php' : 'pages/about.php'; ?>">About</a></li>
                <li><a href="<?php echo isset($is_page) ? 'classes.php' : 'pages/classes.php'; ?>">Classes</a></li>
                <li><a href="<?php echo isset($is_page) ? 'trainers.php' : 'pages/trainers.php'; ?>">Trainers</a></li>
                <li><a href="<?php echo isset($is_page) ? 'blog.php' : 'pages/blog.php'; ?>">Blog</a></li>
                <li><a href="<?php echo isset($is_page) ? 'contact.php' : 'pages/contact.php'; ?>">Contact</a></li>
                <?php if (is_logged_in()): ?>
                    <li><a href="<?php echo isset($is_page) ? '../logout.php' : 'logout.php'; ?>">Logout</a></li>
                <?php else: ?>
                    <li><a href="<?php echo isset($is_page) ? '../login.php' : 'login.php'; ?>">Login</a></li>
                    <li><a href="<?php echo isset($is_page) ? '../join.php' : 'join.php'; ?>" class="cta-button">Join Now</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="success-message"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
    </header>
