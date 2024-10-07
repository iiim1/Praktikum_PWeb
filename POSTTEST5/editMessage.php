<?php
    include "koneksi.php";
    session_start();
    if (!isset($_SESSION['login'])) {
        header('location:index.php');
    }

    @$query = mysqli_query($conn, "SELECT* FROM tb_contact WHERE id='$_GET[id]'");
    @$data = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('partials/head.php') ?>
<body>
    <?php include('partials/navbar.php') ?>
    <div class="page-wrapper">
        <main class="add-cushion-page">
            <div class="container">
                <form action="" method="POST" class="add-cushion-form">
                    <h1 class="page-title">Edit Message</h1>

                    <input type="text" hidden name="id"  id="id" value="<?= $data['id']?>" >
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" id="name" name="name" value="<?= $data['name']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" id="email" name="email" value="<?= $data['email']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="message">Your Message</label>
                        <textarea id="message" name="message" required><?= $data['name']?></textarea>
                    </div>
                    <input type="submit" name="submit" class="btn" value="Edit">
                </form>
                    <?php
                    if(isset($_POST['submit'])){
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $email = $_POST['email'];
                        $message = $_POST['message'];
                        $sql = "UPDATE tb_contact SET name='$name',  email='$email', message='$message' WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);
                        if ($result) {
                            echo "<script>document.location.href='message.php'</script>";
                        }
                    }?>
                </form>
            </div>
        </main>
    </div>
    <?php include('partials/footer.php') ?>
</body>
</html>