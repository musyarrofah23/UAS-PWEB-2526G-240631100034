<?php

include 'koneksi.php';

// Format rupiah
function rupiah($angka)
{
    return "Rp " . number_format($angka, 0, ',', '.');
}

// Total pemasukan
function totalPemasukan()
{
    global $koneksi;

    $query = mysqli_query($koneksi, "SELECT SUM(jumlah) AS total FROM catatan WHERE jenis='Pemasukan'");
    $data = mysqli_fetch_assoc($query);

    return $data['total'] ?? 0;
}

// Total pengeluaran
function totalPengeluaran()
{
    global $koneksi;

    $query = mysqli_query($koneksi, "SELECT SUM(jumlah) AS total FROM catatan WHERE jenis='Pengeluaran'");
    $data = mysqli_fetch_assoc($query);

    return $data['total'] ?? 0;
}

// Saldo
function hitungSaldo()
{
    return totalPemasukan() - totalPengeluaran();
}

?>