<?php
    include "koneksi.php";
    session_start();
    if (!isset($_SESSION['login'])) {
        header('location:index.php');
    }

    @$query = mysqli_query($conn, "SELECT* FROM cushion WHERE id='$_GET[id]'");
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
                <form action="" method="post" enctype="multipart/form-data" class="add-cushion-form">
                    <h1 class="page-title">Edit Cushion</h1>
                    <input type="text" hidden name="id"  id="id" value="<?= $data['id']?>" >

                    <div class="form-group">
                        <label for="merk">Cushion Merk</label>
                        <input type="text" id="merk" name="merk" value="<?= $data['merk']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Name Of Product</label>
                        <input type="text" id="name" name="name" value="<?= $data['name']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" value="<?= $data['price']?>" required>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image">
                    </div>
                    <input type="submit" name="submit" class="btn" value="Edit">
                    <?php
                    if(isset($_POST['submit'])){
                        $id = $_POST['id'];
                        $merk = $_POST['merk'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];

                        $result = mysqli_query($conn, "SELECT image FROM cushion WHERE id = $id");
                        $row = mysqli_fetch_assoc($result);
                        $current_image = $row['image'];

                        if($_FILES['image']['error'] === 4) { 
                            $image = $current_image;
                        } else {
                            $ekstensi_diperbolehkan = array('png','jpg', 'webp');
                            $image = $_FILES['image']['name'];
                            $x = explode('.', $image);
                            $ekstensi = strtolower(end($x));
                            $ukuran = $_FILES['image']['size'];
                            $file_tmp = $_FILES['image']['tmp_name'];

                            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
                                if($ukuran < 1044070){
                                    $new_filename = date("Y-m-d_H-i-s") . "." . $ekstensi;
                                    $upload_path = 'assets/' . $new_filename;
                                    if(move_uploaded_file($file_tmp, $upload_path)){
                                        $image = $new_filename;
                                    }
                                    if($current_image && $current_image !== $new_filename && file_exists('assets/'.$current_image)) {
                                        unlink('assets/'.$current_image);
                                    }
                                } else {
                                    echo 'UKURAN FILE TERLALU BESAR';
                                    exit;
                                }
                            } else {
                                echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
                                exit;
                            }
                        }

                        $sql = "UPDATE cushion SET image='$image', merk='$merk', name='$name', price='$price' WHERE id='$id'";
                        $result = mysqli_query($conn, $sql);

                        if($result){
                            echo "<script>alert('Data berhasil diubah!'); document.location.href='cushion.php';</script>";
                        } else {
                            echo "<script>alert('Gagal mengubah data!'); document.location.href='cushion.php';</script>";
                        }
                    }
                    ?>
                </form>
            </div>
        </main>
    </div>
    <?php include('partials/footer.php') ?>
</body>
</html>