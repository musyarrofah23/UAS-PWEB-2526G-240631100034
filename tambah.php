<?php
include 'function.php';

if (isset($_POST['simpan'])) {

    $tanggal = $_POST['tanggal'];
    $kategori = $_POST['kategori'];
    $keterangan = $_POST['keterangan'];
    $jenis = $_POST['jenis'];
    $jumlah = $_POST['jumlah'];

    $query = mysqli_query($koneksi, "INSERT INTO catatan
    (tanggal, kategori_id, keterangan, jenis, jumlah)
    VALUES
    ('$tanggal','$kategori','$keterangan','$jenis','$jumlah')");

    if ($query) {
        echo "<script>
                alert('Data berhasil disimpan');
                window.location='daftar.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal disimpan');
              </script>";
    }
}

include 'navbar.php';
?>

<h2 class="mb-4">Tambah Catatan Keuangan</h2>

<div class="card shadow p-4">

<form method="POST">

<div class="mb-3">

<label class="form-label">
Tanggal
</label>

<input type="date"
name="tanggal"
class="form-control"
required>

</div>

<div class="mb-3">

<label class="form-label">
Kategori
</label>

<select name="kategori"
class="form-select"
required>

<option value="">-- Pilih Kategori --</option>

<?php

$data = mysqli_query($koneksi,"SELECT * FROM kategori");

while($kategori=mysqli_fetch_array($data))
{

?>

<option value="<?= $kategori['id']; ?>">

<?= $kategori['nama_kategori']; ?>

</option>

<?php
}
?>

</select>

</div>

<div class="mb-3">

<label class="form-label">
Keterangan
</label>

<input
type="text"
name="keterangan"
class="form-control"
placeholder="Masukkan keterangan"
required>

</div>

<div class="mb-3">

<label class="form-label">
Jenis
</label>

<select
name="jenis"
class="form-select"
required>

<option value="">-- Pilih Jenis --</option>

<option value="Pemasukan">
Pemasukan
</option>

<option value="Pengeluaran">
Pengeluaran
</option>

</select>

</div>

<div class="mb-3">

<label class="form-label">
Jumlah
</label>

<input
type="number"
name="jumlah"
class="form-control"
placeholder="Masukkan jumlah uang"
required>

</div>

<button
type="submit"
name="simpan"
class="btn btn-success">

Simpan

</button>

<a href="index.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>