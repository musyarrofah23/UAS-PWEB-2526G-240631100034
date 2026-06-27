<?php

include 'function.php';
include 'navbar.php';

$query = mysqli_query($koneksi,"
    SELECT 
    catatan.*,
    kategori.nama_kategori

    FROM catatan

    JOIN kategori 
    ON catatan.kategori_id = kategori.id

    ORDER BY catatan.id DESC

");

?>


<h2 class="mb-4">
    Daftar Catatan Keuangan
</h2>


<div class="card shadow p-4">


<a href="tambah.php" class="btn btn-success mb-3">
    + Tambah Catatan
</a>

<!-- Tombol Kembali ke Home (Baru) -->
<a href="index.php" class="btn btn-secondary mb-3 ms-2">
    ← Kembali ke Dashboard
</a>

<table class="table table-bordered table-striped">


<thead class="table-success">

<tr>

<th>No</th>
<th>Tanggal</th>
<th>Kategori</th>
<th>Keterangan</th>
<th>Jenis</th>
<th>Jumlah</th>
<th>Aksi</th>

</tr>

</thead>



<tbody>


<?php


$no = 1;


while($data = mysqli_fetch_array($query)){


?>


<tr>


<td>
<?= $no++; ?>
</td>


<td>
<?= $data['tanggal']; ?>
</td>


<td>
<?= $data['nama_kategori']; ?>
</td>


<td>
<?= $data['keterangan']; ?>
</td>


<td>


<?php

if($data['jenis']=="Pemasukan"){

?>

<span class="badge bg-success">
Pemasukan
</span>


<?php

}else{

?>


<span class="badge bg-danger">
Pengeluaran
</span>


<?php

}

?>


</td>



<td>

<?= rupiah($data['jumlah']); ?>

</td>


<td>


<a href="edit.php?id=<?= $data['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>



<a href="hapus.php?id=<?= $data['id']; ?>"
class="btn btn-danger btn-sm"
onclick="return confirm('Yakin hapus data?')">

Hapus

</a>


</td>



</tr>



<?php

}

?>



</tbody>


</table>


</div>


</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>