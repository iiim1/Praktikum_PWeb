<?php
    require "koneksi.php";
    session_start();

    $showSuccess = false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
            // Menulis query SQL
            $sql = "INSERT INTO tb_contact VALUES (null, '$name', '$email', '$message')";

            // Mengeksekusi query SQL pada database
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showSuccess = true;
            }
        
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
            <?php
            $data = mysqli_query($conn, "SELECT * FROM cushion");
            while($d = mysqli_fetch_array($data)){?>
                <div class="product-card" id="card">
                    <img src="assets/<?= $d['image']; ?>" alt="<?= $d['name']; ?>" class="product-image">
                    <h3><?= $d["merk"]; ?></h3>
                    <h5><?= $d["name"]; ?></h5>
                    <p>Rp <?= number_format($d["price"]); ?></p>
                </div>
            <?php } ?>
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