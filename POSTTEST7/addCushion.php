<?php
    include "koneksi.php";
    session_start();
    if (!isset($_SESSION['login'])) {
        header('location:index.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
    <?php include('partials/head.php') ?>
<body>
    <?php include('partials/navbar.php') ?>
    <div class="page-wrapper">
        <main class="add-cushion-page">
            <div class="container">
                <form action="" method="post" enctype="multipart/form-data" class="add-cushion-form">
                    <h1 class="page-title">Add Cushion</h1>
                    <div class="form-group">
                        <label for="merk">Cushion Brand</label>
                        <input type="text" id="merk" name="merk" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Product Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" id="price" name="price" step="0.01" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" id="image" name="image" accept=".png,.jpg,.webp" required>
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary">Add</button>
                </form>
                <?php 
                if(isset($_POST['submit'])){
                    $ekstensi_diperbolehkan = array('png','jpg', 'webp');
                    $image = $_FILES['image']['name'];
                    $x = explode('.', $image);
                    $ekstensi = strtolower(end($x));
                    $ukuran = $_FILES['image']['size'];
                    $file_tmp = $_FILES['image']['tmp_name'];
                    
                    $merk = $_POST['merk'];
                    $name = $_POST['name'];
                    $price = $_POST['price'];

                    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                        if($ukuran < 1048600){     
                            $new_filename = date("Y-m-d_H-i-s") . "." . $ekstensi;
                            $upload_path = 'assets/' . $new_filename;
                            if(move_uploaded_file($file_tmp, $upload_path)){
                                $image = $new_filename;
                            }
                            $sql = "INSERT INTO cushion VALUES(NULL, '$image', '$merk', '$name', '$price')";

                            $result = mysqli_query($conn, $sql);
                            if($result){
                                echo "<div class='alert alert-success'>Cushion added successfully!</div>";
                                echo "<script>setTimeout(function(){ window.location.href = 'cushion.php'; }, 2000);</script>";
                            } else {
                                echo "<div class='alert alert-danger'>Failed to add cushion. Please try again.</div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>File size is too large. Maximum file size is 1MB.</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>Invalid file type. Only PNG, JPG, and WEBP files are allowed.</div>";
                    }
                }
                ?>
            </div>
        </main>
    </div>
    <?php include('partials/footer.php') ?>
</body>
</html>