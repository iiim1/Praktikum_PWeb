<?php
include "koneksi.php";
$search = $_GET["search"];
$data = mysqli_query($conn, "SELECT * FROM cushion WHERE name LIKE '%$search%' OR merk LIKE '%$search%'");
$no = 0;
while ($d = mysqli_fetch_array($data)) {
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