<?php require_once 'includes/header.php'; ?>

<main>
    <section class="hero animated-gradient">
        <div class="hero-content">
            <h1>FORGE YOUR LEGACY</h1>
            <p class="hero-subtitle">Where Warriors Are Made</p>
            <div class="hero-cta">
                <a href="join.php" class="btn btn-primary">Start Your Journey</a>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <h2 class="section-title">EMBRACE THE WARRIOR SPIRIT</h2>
            
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="card-inner">
                        <h3>Strength Training</h3>
                        <p>"The iron never lies." - Ancient bodybuilding proverb</p>
                        <div class="card-overlay"></div>
                    </div>
                </div>

                <div class="feature-card">
                    <div class="card-inner">
                        <h3>Combat Arts</h3>
                        <p>"The way of the warrior is found in death." - Miyamoto Musashi</p>
                        <div class="card-overlay"></div>
                    </div>
                </div>

                <div class="feature-card">
                    <div class="card-inner">
                        <h3>Mental Fortitude</h3>
                        <p>"In the midst of chaos, there is also opportunity." - Sun Tzu</p>
                        <div class="card-overlay"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="motivation">
        <div class="container">
            <h2 class="section-title">LEGENDS WHO INSPIRE</h2>
            
            <div class="quote-carousel">
                <div class="quote-card">
                    <blockquote>
                        "Success is not final, failure is not fatal: it is the courage to continue that counts."
                    </blockquote>
                    <cite>- Winston Churchill</cite>
                </div>
                
                <div class="quote-card">
                    <blockquote>
                        "The pain you feel today will be the strength you feel tomorrow."
                    </blockquote>
                    <cite>- Ancient Warrior Wisdom</cite>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <h2>BEGIN YOUR TRANSFORMATION</h2>
            <p>Join the ranks of warriors, athletes, and champions.</p>
            <div class="cta-buttons">
                <a href="join.php" class="btn btn-primary">Join Now</a>
                <a href="classes.php" class="btn btn-secondary">Explore Classes</a>
            </div>
        </div>
    </section>
</main>

<style>
/* Hero Section Styles */
.hero {
    min-height: 80vh;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7));
    overflow: hidden;
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, 
        var(--dark-purple) 0%, 
        var(--medium-purple) 50%, 
        var(--dark-gold) 100%);
    opacity: 0.8;
    z-index: -1;
}

.hero-content {
    max-width: 800px;
    padding: 2rem;
}

.hero h1 {
    font-size: 4.5rem;
    margin-bottom: 1rem;
    color: var(--medium-gold);
    text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
    letter-spacing: 4px;
}

.hero-subtitle {
    font-size: 1.5rem;
    color: var(--light-gold);
    margin-bottom: 2rem;
    text-transform: uppercase;
    letter-spacing: 2px;
}

/* Feature Grid */
.feature-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    padding: 2rem;
}

.feature-card {
    height: 300px;
    position: relative;
    overflow: hidden;
    border-radius: 15px;
    border: 1px solid var(--medium-gold);
}

.card-inner {
    height: 100%;
    padding: 2rem;
    background: linear-gradient(145deg, 
        rgba(45, 27, 78, 0.9), 
        rgba(75, 0, 130, 0.9));
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    text-align: center;
    transition: transform 0.3s ease;
}

.feature-card:hover .card-inner {
    transform: scale(1.05);
}

/* Quote Carousel */
.quote-carousel {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 2rem;
    padding: 2rem;
}

.quote-card {
    background: linear-gradient(145deg, 
        rgba(45, 27, 78, 0.9), 
        rgba(75, 0, 130, 0.9));
    padding: 2rem;
    border-radius: 15px;
    border: 1px solid var(--medium-gold);
    max-width: 400px;
}

blockquote {
    color: var(--light-gold);
    font-style: italic;
    font-size: 1.2rem;
    margin-bottom: 1rem;
}

cite {
    color: var(--medium-gold);
    font-size: 1rem;
}

/* CTA Section */
.cta-section {
    text-align: center;
    padding: 4rem 2rem;
    background: linear-gradient(45deg, 
        var(--dark-purple) 0%, 
        var(--medium-purple) 50%, 
        var(--dark-purple) 100%);
}

.cta-buttons {
    display: flex;
    gap: 1rem;
    justify-content: center;
    margin-top: 2rem;
}

/* Responsive Design */
@media (max-width: 768px) {
    .hero h1 {
        font-size: 3rem;
    }
    
    .hero-subtitle {
        font-size: 1.2rem;
    }
    
    .feature-grid {
        grid-template-columns: 1fr;
    }
    
    .cta-buttons {
        flex-direction: column;
        align-items: center;
    }
}
</style>

<?php require_once 'includes/footer.php'; ?>
