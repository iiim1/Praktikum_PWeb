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
        <main class="cushion-management">
            <div class="container">
                <h1 class="page-title">Cushion Management</h1>
                <div class="action-bar">
                    <a href="addCushion.php" class="btn">Add Cushion</a>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Image</th>
                                <th>Brand</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $data = mysqli_query($conn, "SELECT * FROM cushion");
                            $no = 0;
                            while($d = mysqli_fetch_array($data)){
                                $no++;
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><img src="assets/<?= $d['image']; ?>" alt="<?= $d['name']; ?>" class="product-image-table"></td>
                                <td><?= $d["merk"]; ?></td>
                                <td><?= $d["name"]; ?></td>
                                <td>Rp <?= number_format($d["price"]); ?></td>
                                <td>
                                    <a href="editCushion.php?id=<?=$d['id'];?>" class="btn btn-sm btn-secondary">Edit</a>
                                    <a href="deleteCushion.php?id=<?=$d['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </div>
    <?php include('partials/footer.php') ?>
</body>
</html>