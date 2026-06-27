<?php
include 'function.php';

// 1. Ambil ID dari URL (GET)
$id = $_GET['id'];

// 2. Jalankan query DELETE
$hapus = mysqli_query($koneksi, "DELETE FROM catatan WHERE id = '$id'");

// 3. Redirect kembali ke halaman daftar.php dengan notifikasi
if ($hapus) {
    echo "<script>
            alert('Data berhasil dihapus!');
            window.location='daftar.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus data!');
            window.location='daftar.php';
          </script>";
}
?>