<?php
$page = 'contact';
$page_title = 'Contact Us - Tasty Treasures';
require 'includes/config.php';
require 'includes/header.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);
    
    // Process form (send email or save to database)
    $success = true; // Change to actual success check
}
?>

<main class="contact-us">
    <h1>Contact Us</h1>
    <p>We'd love to hear from you! Fill out the form below to get in touch.</p>
    
    <?php if (isset($success)): ?>
        <div class="alert success">Thank you for your message!</div>
    <?php endif; ?>
    
    <form class="contact-form" method="POST">
        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit">Send Message</button>
    </form>
</main>

<?php
require 'includes/footer.php';
?>