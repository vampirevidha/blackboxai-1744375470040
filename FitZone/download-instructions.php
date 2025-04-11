<?php
$is_page = false;
require_once 'includes/header.php';
?>

<main style="padding: 2rem;">
    <div class="container" style="max-width: 800px; margin: 0 auto;">
        <h2 style="color: var(--medium-gold); text-align: center; margin-bottom: 2rem;">Download FitZone Project</h2>
        
        <div style="background: rgba(75, 0, 130, 0.3); padding: 2rem; border-radius: 10px; border: 1px solid var(--medium-gold);">
            <!-- Download Button -->
            <div style="text-align: center; margin-bottom: 2rem;">
                <a href="get-files.php" class="btn btn-primary" style="background: var(--medium-gold); color: var(--dark-purple); font-size: 1.2rem; padding: 1rem 2rem; display: inline-flex; align-items: center; gap: 0.5rem;">
                    <i class="fas fa-download"></i> Download Project Files
                </a>
                <p style="color: var(--light-gold); margin-top: 1rem;">Click the button above to download the complete project files (ZIP)</p>
                <?php if (isset($_GET['error'])): ?>
                    <p style="color: #FF6B6B; margin-top: 1rem;">Error: Download file not found. Please try again later.</p>
                <?php endif; ?>
            </div>

            <!-- Installation Instructions -->
            <div style="margin-top: 2rem;">
                <h3 style="color: var(--medium-gold); margin-bottom: 1rem;">Installation Instructions</h3>
                <ol style="color: var(--light-gold); line-height: 1.6;">
                    <li>Download and install WAMP Server from <a href="https://www.wampserver.com/en/" style="color: var(--medium-gold);">wampserver.com</a></li>
                    <li>Extract the downloaded ZIP file</li>
                    <li>Copy the 'FitZone' folder to C:\wamp64\www\</li>
                    <li>Open phpMyAdmin (http://localhost/phpmyadmin)</li>
                    <li>Import the database using the fitzone.sql file from the db folder</li>
                    <li>Access your website at http://localhost/FitZone</li>
                </ol>
            </div>

            <!-- Login Credentials -->
            <div style="margin-top: 2rem;">
                <h3 style="color: var(--medium-gold); margin-bottom: 1rem;">Login Credentials</h3>
                <div style="color: var(--light-gold); background: rgba(75, 0, 130, 0.2); padding: 1rem; border-radius: 5px;">
                    <p style="margin-bottom: 1rem;">
                        <strong>Admin User:</strong><br>
                        Email: admin@fitzone.com<br>
                        Password: password
                    </p>
                    <p>
                        <strong>Regular User:</strong><br>
                        Email: john@example.com<br>
                        Password: password
                    </p>
                </div>
            </div>

            <!-- Files Included -->
            <div style="margin-top: 2rem;">
                <h3 style="color: var(--medium-gold); margin-bottom: 1rem;">Files Included</h3>
                <ul style="color: var(--light-gold); line-height: 1.6;">
                    <li>Complete website source code</li>
                    <li>Database SQL file (fitzone.sql)</li>
                    <li>Setup instructions</li>
                    <li>Sample data for testing</li>
                </ul>
            </div>
        </div>

        <!-- Navigation Buttons -->
        <div style="text-align: center; margin-top: 2rem;">
            <a href="test.php" class="btn btn-secondary" style="margin-right: 1rem;">Back to Test Page</a>
            <a href="index.php" class="btn btn-secondary">Return to Homepage</a>
        </div>
    </div>
</main>

<?php require_once 'includes/footer.php'; ?>
