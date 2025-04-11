<?php
$is_page = true;
require_once '../includes/header.php';

// Get sample classes if database is not connected
$classes = get_all_classes($pdo);
?>

<main>
    <section class="classes-section">
        <div class="container">
            <h2 class="section-title">Our Classes</h2>
            
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
            <?php endif; ?>

            <div class="classes-grid">
                <?php foreach ($classes as $class): ?>
                    <div class="class-card">
                        <div class="card-inner">
                            <h3><?php echo htmlspecialchars($class['name']); ?></h3>
                            <p class="class-description"><?php echo htmlspecialchars($class['description']); ?></p>
                            <div class="class-details">
                                <p><i class="fas fa-clock"></i> <?php echo htmlspecialchars($class['start_time']); ?> - <?php echo htmlspecialchars($class['end_time']); ?></p>
                                <p><i class="fas fa-calendar"></i> <?php echo htmlspecialchars($class['days']); ?></p>
                                <p><i class="fas fa-user"></i> Trainer: <?php echo htmlspecialchars($class['trainer_name']); ?></p>
                            </div>
                            <a href="class_details.php?id=<?php echo $class['id']; ?>" class="btn btn-primary">Learn More</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</main>

<style>
.classes-section {
    padding: 4rem 2rem;
}

.classes-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-top: 2rem;
}

.class-card {
    background: linear-gradient(145deg, 
        rgba(45, 27, 78, 0.9), 
        rgba(75, 0, 130, 0.9));
    border-radius: 15px;
    border: 1px solid var(--medium-gold);
    overflow: hidden;
    transition: transform 0.3s ease;
}

.class-card:hover {
    transform: translateY(-5px);
}

.card-inner {
    padding: 2rem;
}

.class-card h3 {
    color: var(--medium-gold);
    margin: 0 0 1rem 0;
    font-size: 1.5rem;
}

.class-description {
    color: var(--light-gold);
    margin-bottom: 1.5rem;
}

.class-details {
    margin: 1.5rem 0;
}

.class-details p {
    margin: 0.5rem 0;
    color: var(--light-gold);
}

.class-details i {
    color: var(--medium-gold);
    margin-right: 0.5rem;
    width: 20px;
    text-align: center;
}

.btn {
    display: inline-block;
    padding: 0.8rem 1.5rem;
    background: linear-gradient(145deg, var(--medium-gold), var(--dark-gold));
    color: var(--dark-purple);
    text-decoration: none;
    border-radius: 25px;
    font-weight: bold;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
}

@media (max-width: 768px) {
    .classes-section {
        padding: 2rem 1rem;
    }
    
    .classes-grid {
        grid-template-columns: 1fr;
    }
}
</style>

<?php require_once '../includes/footer.php'; ?>
