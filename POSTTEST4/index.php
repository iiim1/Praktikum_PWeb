<?php
    $showSuccess = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $showSuccess = true;
    };
?>
 
<!DOCTYPE html>
<html lang="en">
    <?php include('partials/head.php') ?>
<body>
    <?php include('partials/navbar.php') ?>
    <main>
        <section id="home" class="hero">
            <div class="hero-content">
                <img src="assets/logo.png" class="logo" alt="Cushion Compass Logo">
                <h1>Discover Your Perfect Cushion</h1>
                <p>Effortless beauty, flawless coverage</p>
            </div>
        </section>

        <section class="cushion-collection" id="products">
            <h2>Cushion Collection</h2>
            <div class="product-grid">
                <div class="product-card" id="card">
                    <img src="assets/skintific.png" class="product-image">
                    <h3>SKINTIFIC</h3>
                    <h5>Cover All Perfect Cushion</h5>
                    <p>Rp 209.790</p>
                </div>
                <div class="product-card" id="card">
                    <img src="assets/g2g.webp" class="product-image">
                    <h3>GLAD2GLOW</h3>
                    <h5>Perfect Cover Cushion</h5>
                    <p>Rp 97.000</p>
                </div>
                <div class="product-card" id="card">
                    <img src="assets/originote.png" class="product-image">
                    <h3>THE ORIGINOTE</h3>
                    <h5>High Cover Serum Cushion</h5>
                    <p>Rp 99.000</p>
                </div>
                <div class="product-card" id="card">
                    <img src="assets/bnb.webp" class="product-image">
                    <h3>BARENBLISS</h3>
                    <h5>True Beauty Inside Cushion</h5>
                    <p>Rp 136.800</p>
                </div>
                <div class="product-card" id="card">
                    <img src="assets/you.jpg" class="product-image">
                    <h3>YOU BEAUTY</h3>
                    <h5>NoutriWear+Flawless Cushion Foundation</h5>
                    <p>Rp 140.400</p>
                </div>
                <div class="product-card" id="card">
                    <img src="assets/mop.png" class="product-image">
                    <h3>MOTHER OF PEARL</h3>
                    <h5>Microblur Translucent Cushion</h5>
                    <p>Rp 235.000</p>
                </div>
            </div>
        </section>

        <section id="contact" class="contact-section">
            <h2>Contact Us</h2>
            <div class="contact-container">
                <div class="contact-info">
                    <h3>Get in Touch</h3>
                    <p>We'd love to hear from you! Whether you have a question about our products, need help with an
                        order, or just want to say hello, we're here for you.</p>
                    <ul>
                        <li><img src="assets/emailDark.png" class="icon" alt="Email" id="email"> info@cushioncompass.com</li>
                        <li><img src="assets/phoneDark.png" class="icon" alt="Phone" id="phone"> 0877-6655-4433</li>
                        <li><img src="assets/markerDark.png" class="icon" alt="Address" id="marker"> 123 Beauty Lane, Makeup City, MC 12345</li>
                    </ul>
                </div>
                <form action="" method="POST" class="contact-form" id="contactForm">
                    <h3>Send Us a Message</h3>
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
                        <textarea id="message" name="message" required></textarea>
                    </div>
                    <button type="submit" class="btn" id="sendMessage">Send Message</button>
                </form>
            </div>
        </section>
    </main>

    <div id="pop" class="pop" <?php if ($showSuccess) echo 'style="display:block;"'; ?>>
        <div class="pop-content">
            <h3>Your Message Successfully Sent</h3>
            <p>Name: <?=$name; ?></p>
            <p>Email: <?=$email; ?></p>
            <p>Message: <?=$message; ?></p>
            <span class="close">&times;</span>
        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>
</html>