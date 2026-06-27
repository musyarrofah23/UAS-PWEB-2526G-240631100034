<?php
include 'function.php';
include 'navbar.php';

// 1. Hitung Total Pemasukan
$query_pemasukan = mysqli_query($koneksi, "SELECT SUM(jumlah) AS total FROM catatan WHERE jenis = 'Pemasukan'");
$data_pemasukan = mysqli_fetch_array($query_pemasukan);
$total_pemasukan = $data_pemasukan['total'] ?? 0; // Jika kosong, set ke 0

// 2. Hitung Total Pengeluaran
$query_pengeluaran = mysqli_query($koneksi, "SELECT SUM(jumlah) AS total FROM catatan WHERE jenis = 'Pengeluaran'");
$data_pengeluaran = mysqli_fetch_array($query_pengeluaran);
$total_pengeluaran = $data_pengeluaran['total'] ?? 0; // Jika kosong, set ke 0

// 3. Hitung Sisa Saldo
$sisa_saldo = $total_pemasukan - $total_pengeluaran;
?>

<div class="container mt-4">
    <div class="p-5 mb-4 bg-light rounded-3 shadow-sm">
        <div class="container-fluid py-2">
            <h1 class="display-5 fw-bold">Halo, Selamat Datang! 👋</h1>
            <p class="col-md-8 fs-4">Kelola keuangan pribadimu dengan lebih mudah, terstruktur, dan terpantau setiap hari menggunakan <strong>MoneyTrack</strong>.</p>
            <a href="tambah.php" class="btn btn-success btn-lg">+ Catat Transaksi Baru</a>
        </div>
    </div>

    <div class="row g-3 mb-4">
        <div class="col-md-4">
            <div class="card border-0 bg-success text-white shadow">
                <div class="card-body p-4">
                    <h6 class="card-title text-uppercase opacity-75">Total Pemasukan</h6>
                    <h3 class="card-text fw-bold"><?= rupiah($total_pemasukan); ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 bg-danger text-white shadow">
                <div class="card-body p-4">
                    <h6 class="card-title text-uppercase opacity-75">Total Pengeluaran</h6>
                    <h3 class="card-text fw-bold"><?= rupiah($total_pengeluaran); ?></h3>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 bg-primary text-white shadow">
                <div class="card-body p-4">
                    <h6 class="card-title text-uppercase opacity-75">Sisa Saldo</h6>
                    <h3 class="card-text fw-bold"><?= rupiah($sisa_saldo); ?></h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Navigasi Cepat -->
<div class="text-center mt-5 p-4 bg-light rounded shadow-sm">
    <p class="text-muted fw-bold mb-3">Ingin melihat atau mengelola semua riwayat transaksi?</p>
    <a href="daftar.php" class="btn btn-dark btn-lg px-5 shadow">
        <i class="bi bi-list-ul"></i> Buka Halaman Riwayat Catatan
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>