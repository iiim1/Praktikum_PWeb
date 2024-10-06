<?php
    require "koneksi.php";
    $id = $_GET['id'];
    $result = mysqli_query($conn, "DELETE FROM cushion WHERE id = $id");

    if ($result) {
        echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'cushion.php';
        </script>";
    } else {
        echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'cushion.php';
        </script>";
    }
?>