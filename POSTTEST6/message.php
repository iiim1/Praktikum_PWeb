<?php
    include "koneksi.php";
    session_start();
    if (!isset($_SESSION['login'])) {
        header('location:index.php');
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
                <h1 class="page-title">Message Management</h1>
                <!-- <div class="action-bar">
                    <a href="tambahCushion.php" class="btn">Add Cushion</a>
                </div> -->
                <div class="table-responsive">
                    <?php 
                        $data = mysqli_query($conn, "select * from tb_contact");?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no=0;
                            while($d = mysqli_fetch_array($data)){
                                $no++;
                            ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $d["name"]; ?></td>
                                <td><?= $d["email"]; ?></td>
                                <td><?= $d["message"]; ?></td>
                                <td><a href=editMessage.php?id=<?=$d['id'];?> name="edit" class="btn btn-sm btn-secondary">Edit</a>
                                <a href=deleteMessage.php?id=<?=$d['id'];?> name="delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>
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