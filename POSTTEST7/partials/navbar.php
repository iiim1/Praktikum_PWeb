<?php
    // session_start();

?>
<header>
    <nav class="navbar">
        <div class="navbar-container">
            <div class="burger">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 'admin') { ?>
                <ul class="nav-links">
                    <li><a href="cushion.php">Cushion</a></li>
                    <li><a href="message.php">Message</a></li>
                </ul>
            <?php } else {?>
                <ul class="nav-links">
                    <li><a href="index.php#home">Home</a></li>
                    <li><a href="index.php#products">Products</a></li>
                    <li><a href="index.php#contact">Contact</a></li>
                    <li><a href="biodata.php">About Me</a></li>
                </ul>
            <?php } ?>
            <div class="navbar-right">
                <button id="lighttheme" aria-label="Toggle light theme">
                    <img id="light" src="assets/sun.png" alt="Light theme toggle" id="theme-icon">
                </button>
                <?php
                    if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) { ?>
                        <a href="login.php" class="btn-login">Login</a>
                <?php } else {?>
                    <a href="logout.php" class="btn-logout">Logout</a>
                <?php }?>
            </div>
        </div>
    </nav>
</header>    