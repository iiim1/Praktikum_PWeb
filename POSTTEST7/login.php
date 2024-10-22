<!DOCTYPE html>
<html lang="en">
<?php include('partials/head.php') ?>
<body>
    <?php include('partials/navbar.php') ?>
    
    <div class="login-page">
        <div class="container">
            <div class="login-form-container">
                <form class="login-form" method="POST">
                    <h2 class="login-heading">Login</h2>
                    <div class="login-wrap">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-control" name="username" placeholder="Enter your username" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" required>
                        </div>
                        <button class="btn" name="submit" type="submit">Login</button>
                    </div>
                </form>
                <?php
                include "koneksi.php";
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $u = $_POST['username'];
                    $p = $_POST['password'];

                    $qCek = "SELECT * FROM user WHERE username='$u'";
                    $result = mysqli_query($conn, $qCek);
                    if (mysqli_num_rows($result) === 1) {
                        $user = mysqli_fetch_assoc($result);

                        if (password_verify($p, $user['password'])) {
                            session_start();
                            $_SESSION['login'] = true; 
                            if ($user['role'] === 'admin') {
                                $_SESSION['role'] = 'admin';
                                echo "
                                <script>
                                    alert('Login berhasil! Selamat datang Admin.');
                                    setTimeout(function() {
                                        document.location.href = 'cushion.php';
                                    }, 1000);
                                </script>
                                ";
                            } else {
                                $_SESSION['role'] = 'user';
                                echo "
                                <script>
                                    alert('Login berhasil! Selamat datang.');
                                    setTimeout(function() {
                                        document.location.href = 'index.php#products';
                                    }, 1000); 
                                document.location.href = 'index.php#products';
                                </script>
                                ";
                            }
                        } else {
                            echo "<div class='alert alert-danger' role='alert'>
                                Username or password is incorrect. Please try again.
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>";
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>
</html>