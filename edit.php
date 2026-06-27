<?php
include 'function.php';
include 'navbar.php';

// 1. Ambil ID dari URL (GET)
$id = $_GET['id'];

// 2. Ambil data lama berdasarkan ID tersebut
$query_data = mysqli_query($koneksi, "SELECT * FROM catatan WHERE id = '$id'");
$data = mysqli_fetch_array($query_data);

// 3. Ambil semua kategori untuk pilihan di dropdown (select option)
$query_kategori = mysqli_query($koneksi, "SELECT * FROM kategori");

// 4. Proses jika tombol simpan ditekan (POST)
if (isset($_POST['simpan'])) {
    $tanggal     = $_POST['tanggal'];
    $kategori_id = $_POST['kategori_id'];
    $keterangan  = $_POST['keterangan'];
    $jenis       = $_POST['jenis'];
    $jumlah      = $_POST['jumlah'];

    // Query Update Data
    $update = mysqli_query($koneksi, "UPDATE catatan SET 
        tanggal = '$tanggal',
        kategori_id = '$kategori_id',
        keterangan = '$keterangan',
        jenis = '$jenis',
        jumlah = '$jumlah'
        WHERE id = '$id'
    ");

    if ($update) {
        echo "<script>
                alert('Data berhasil diubah!');
                window.location='daftar.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal mengubah data!');
              </script>";
    }
}
?>

<div class="container mt-4">
    <h2 class="mb-4">Edit Catatan Keuangan</h2>

    <div class="card shadow p-4" style="max-width: 600px;">
        <form action="" method="POST">
            
            <div class="mb-3">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal']; ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-select" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php while($kat = mysqli_fetch_array($query_kategori)) { ?>
                        <option value="<?= $kat['id']; ?>" <?= ($kat['id'] == $data['kategori_id']) ? 'selected' : ''; ?>>
                            <?= $kat['nama_kategori']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" rows="3" required><?= $data['keterangan']; ?></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis" value="Pemasukan" <?= ($data['jenis'] == 'Pemasukan') ? 'checked' : ''; ?> required>
                    <label class="form-check-label">Pemasukan</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis" value="Pengeluaran" <?= ($data['jenis'] == 'Pengeluaran') ? 'checked' : ''; ?> required>
                    <label class="form-check-label">Pengeluaran</label>
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Jumlah (Rp)</label>
                <input type="number" name="jumlah" class="form-control" value="<?= $data['jumlah']; ?>" required>
            </div>

            <button type="submit" name="simpan" class="btn btn-primary">Simpan Perubahan</button>
            <a href="daftar.php" class="btn btn-secondary">Batal</a>

        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>