<footer class="main-footer">
    <div class="footer-content">
        <div class="footer-grid">
            <div class="footer-section">
                <h3>FitZone Legacy</h3>
                <p>"Where warriors are forged, legends are born."</p>
                <div class="social-links">
                    <a href="#" class="social-link"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <div class="footer-section">
                <h4>Quick Links</h4>
                <ul>
                    <li><a href="about.php">About Us</a></li>
                    <li><a href="classes.php">Classes</a></li>
                    <li><a href="trainers.php">Trainers</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Training Programs</h4>
                <ul>
                    <li><a href="classes.php">Strength Training</a></li>
                    <li><a href="classes.php">Combat Arts</a></li>
                    <li><a href="classes.php">Cardio Warriors</a></li>
                    <li><a href="classes.php">Elite Performance</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Contact Info</h4>
                <ul class="contact-info">
                    <li><i class="fas fa-map-marker-alt"></i> 123 Warrior Street, Fitness City</li>
                    <li><i class="fas fa-phone"></i> +1 234 567 8900</li>
                    <li><i class="fas fa-envelope"></i> info@fitzone.com</li>
                    <li><i class="fas fa-clock"></i> Mon-Sat: 5:00 AM - 11:00 PM</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-logo">
                <h2><i class="fas fa-dumbbell"></i> FitZone</h2>
            </div>
            <p class="copyright">&copy; <?php echo date('Y'); ?> FitZone. All rights reserved.</p>
            <p class="footer-quote">"The body achieves what the mind believes."</p>
        </div>
    </div>
</footer>

<style>
.main-footer {
    background: linear-gradient(to right, 
        var(--dark-purple) 0%, 
        var(--medium-purple) 50%, 
        var(--dark-purple) 100%);
    color: var(--light-gold);
    padding: 4rem 2rem 2rem;
    margin-top: 4rem;
    border-top: 2px solid var(--medium-gold);
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 2rem;
    max-width: 1200px;
    margin: 0 auto;
}

.footer-section h3, .footer-section h4 {
    color: var(--medium-gold);
    margin-bottom: 1.5rem;
    font-size: 1.5rem;
    text-transform: uppercase;
    letter-spacing: 2px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
}

.footer-section ul li {
    margin-bottom: 0.8rem;
}

.footer-section ul li a {
    color: var(--light-gold);
    text-decoration: none;
    transition: color 0.3s ease;
}

.footer-section ul li a:hover {
    color: var(--medium-gold);
    text-shadow: 0 0 8px rgba(255, 215, 0, 0.5);
}

.social-links {
    display: flex;
    gap: 1rem;
    margin-top: 1.5rem;
}

.social-link {
    color: var(--medium-gold);
    font-size: 1.5rem;
    transition: all 0.3s ease;
}

.social-link:hover {
    color: var(--light-gold);
    transform: translateY(-3px);
}

.contact-info li {
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.contact-info i {
    color: var(--medium-gold);
}

.footer-bottom {
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid rgba(255, 215, 0, 0.2);
    text-align: center;
}

.footer-logo h2 {
    color: var(--medium-gold);
    font-size: 2rem;
    margin: 0 0 1rem 0;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
}

.footer-logo i {
    margin-right: 0.5rem;
}

.copyright {
    color: var(--light-gold);
    font-size: 0.9rem;
    margin-bottom: 0.5rem;
}

.footer-quote {
    color: var(--medium-gold);
    font-style: italic;
    font-size: 1.1rem;
}

@media (max-width: 768px) {
    .footer-grid {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .social-links {
        justify-content: center;
    }

    .contact-info li {
        justify-content: center;
    }
}
</style>

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>
</html>
