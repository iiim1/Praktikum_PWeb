<?php
    require "koneksi.php";
    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT image FROM cushion WHERE id = $id");
    $row = mysqli_fetch_assoc($query);

    if ($row && isset($row['image'])) {
        $photoPath = 'assets/' . $row['image'];

        if (file_exists($photoPath)) {
            unlink($photoPath);
        }
    }

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