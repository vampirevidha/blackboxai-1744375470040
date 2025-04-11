<?php
// Set this to true since it's in the pages directory
$is_page = false;

// Include the header
require_once 'includes/header.php';
?>

<main style="padding: 2rem; text-align: center;">
    <h2 style="color: var(--medium-gold);">System Test Page</h2>
    
    <div style="margin: 2rem auto; max-width: 800px; background: rgba(75, 0, 130, 0.3); padding: 2rem; border-radius: 10px;">
        <h3 style="color: var(--light-gold);">Database Connection Status</h3>
        <?php if ($db_connected): ?>
            <p style="color: #00FF00;">✓ Database is connected successfully</p>
        <?php else: ?>
            <p style="color: #FF6B6B;">✗ Database is not connected</p>
            <p style="color: #FFA07A;">Note: The website will still function with sample data</p>
        <?php endif; ?>

        <h3 style="color: var(--light-gold); margin-top: 2rem;">Style Test</h3>
        <div style="display: flex; gap: 1rem; justify-content: center; margin: 1rem 0;">
            <button class="btn btn-primary">Primary Button</button>
            <button class="btn btn-secondary">Secondary Button</button>
        </div>

        <h3 style="color: var(--light-gold); margin-top: 2rem;">Sample Data Test</h3>
        <div style="text-align: left; margin-top: 1rem;">
            <h4 style="color: var(--medium-gold);">Sample Classes:</h4>
            <?php
            $classes = get_all_classes($pdo);
            foreach ($classes as $class): ?>
                <div style="margin: 1rem 0; padding: 1rem; background: rgba(75, 0, 130, 0.2); border-radius: 5px;">
                    <h5 style="color: var(--light-gold); margin: 0;"><?php echo htmlspecialchars($class['name']); ?></h5>
                    <p style="margin: 0.5rem 0;"><?php echo htmlspecialchars($class['description']); ?></p>
                </div>
            <?php endforeach; ?>

            <h4 style="color: var(--medium-gold); margin-top: 2rem;">Sample Trainers:</h4>
            <?php
            $trainers = get_all_trainers($pdo);
            foreach ($trainers as $trainer): ?>
                <div style="margin: 1rem 0; padding: 1rem; background: rgba(75, 0, 130, 0.2); border-radius: 5px;">
                    <h5 style="color: var(--light-gold); margin: 0;"><?php echo htmlspecialchars($trainer['name']); ?></h5>
                    <p style="margin: 0.5rem 0;"><?php echo htmlspecialchars($trainer['specialties']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div style="margin-top: 2rem; display: flex; gap: 1rem; justify-content: center;">
        <a href="index.php" class="btn btn-primary">Return to Homepage</a>
        <a href="download-instructions.php" class="btn btn-secondary" style="background: var(--medium-gold); color: var(--dark-purple);">
            <i class="fas fa-download"></i> Download & Setup Instructions
        </a>
    </div>
</main>

<?php
// Include the footer
require_once 'includes/footer.php';
?>
