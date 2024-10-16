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
                        <button class="btn btn-primary btn-block" name="submit" type="submit">Login</button>
                    </div>
                </form>
                <?php
                include "koneksi.php";
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $u = $_POST['username'];
                    $p = md5($_POST['password']);

                    $qCek = mysqli_query($conn, "SELECT * FROM user WHERE username='$u' AND password='$p'");

                    if (mysqli_num_rows($qCek) > 0) {
                        $d = mysqli_fetch_array($qCek);
                        session_start();
                        $_SESSION['login'] = 'OK';
                        $_SESSION['id'] = $d['id'];
                        $_SESSION['username'] = $d['username'];
                        $_SESSION['password'] = $d['password'];
                        header('Location:cushion.php');
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>
                            Username or password is incorrect. Please try again.
                            <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <?php include('partials/footer.php') ?>
</body>
</html>