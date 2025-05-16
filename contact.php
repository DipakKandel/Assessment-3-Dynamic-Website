<?php
$page = 'contact';
$page_title = 'Contact Us - Tasty Treasures';
require 'includes/config.php';
require 'includes/header.php';

// Initialize variables
$name = $email = $message = '';
$success = false;
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate and sanitize inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    
    // Validation
    if (empty($name)) {
        $errors['name'] = 'Name is required';
    } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
        $errors['name'] = 'Only letters and white space allowed';
    }
    
    if (empty($email)) {
        $errors['email'] = 'Email is required';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email format';
    }
    
    if (empty($message)) {
        $errors['message'] = 'Message is required';
    }
    
    // If no errors, proceed with database insertion
    if (empty($errors)) {
        $name = $conn->real_escape_string($name);
        $email = $conn->real_escape_string($email);
        $message = $conn->real_escape_string($message);
        
        $sql = "INSERT INTO contact_submissions (name, email, message, submitted_at) 
                VALUES ('$name', '$email', '$message', NOW())";
        
        if ($conn->query($sql)) {
            $success = true;
            // Clear form fields
            $name = $email = $message = '';
        } else {
            $errors['database'] = 'Error submitting your message. Please try again later.';
        }
    }
}
?>

<main class="contact-us">
    <h1>Contact Us</h1>
    <p>We'd love to hear from you! Fill out the form below to get in touch.</p>
    
    <?php if ($success): ?>
        <div class="alert success">Thank you for your message! We'll get back to you soon.</div>
    <?php elseif (!empty($errors)): ?>
        <div class="alert error">
            <?php foreach ($errors as $error): ?>
                <p><?= htmlspecialchars($error) ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    
    <form class="contact-form" method="POST">
        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" value="<?= htmlspecialchars($name) ?>" required>
            <?php if (isset($errors['name'])): ?>
                <span class="error-message"><?= htmlspecialchars($errors['name']) ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($email) ?>" required>
            <?php if (isset($errors['email'])): ?>
                <span class="error-message"><?= htmlspecialchars($errors['email']) ?></span>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="message">Your Message</label>
            <textarea id="message" name="message" rows="5" required><?= htmlspecialchars($message) ?></textarea>
            <?php if (isset($errors['message'])): ?>
                <span class="error-message"><?= htmlspecialchars($errors['message']) ?></span>
            <?php endif; ?>
        </div>
        <button type="submit">Send Message</button>
    </form>
</main>

<?php
require 'includes/footer.php';
?>