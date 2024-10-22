<!DOCTYPE html>
<html lang="en">
<?php include('partials/head.php') ?>
<body>
    <?php include('partials/navbar.php') ?>
    
    <div class="login-page">
        <div class="container">
            <div class="login-form-container">
                <form class="login-form" method="POST">
                    <h2 class="login-heading">Register Your Account</h2>
                    <div class="login-wrap">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" id="username" class="form-control" name="username" placeholder="Enter your username" autofocus required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="Enter your password" required>
                        </div>
                        <button class="btn" name="submit" type="submit">Register</button>
                    </div>
                </form>
                <?php
                include "koneksi.php";
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $u = $_POST['username'];
                    $r = "user";
                    $p = password_hash($_POST["password"], PASSWORD_DEFAULT);

                    $qCek = mysqli_query($conn, "SELECT * FROM user WHERE username='$u'");

                    if (mysqli_num_rows($qCek) > 0) {
                        echo "
                            <script>
                            alert('Username sudah digunakan! Silakan gunakan username lain.');
                            document.location.href = 'registrasi.php';
                            </script>
                            ";
                    } else {
                        $query = "INSERT INTO user (username, password, role) VALUES ('$u','$p','$r')";
                        if (mysqli_query($conn, $query)) {
                            echo "
                                <script>
                                alert('Registrasi berhasil!');
                                document.location.href = 'login.php';
                                </script> ";
                            } else {
                            echo "
                                <script>
                                alert('Registrasi gagal!');
                                document.location.href = 'registrasi.php';
                                </script>";
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