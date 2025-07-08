<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM warga WHERE id=$id");
$data = mysqli_fetch_assoc($result);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama_lengkap'];
    $kk = $_POST['nomor_kk'];
    $nik = $_POST['nik'];
    $alamat = $_POST['alamat'];
    $status = $_POST['status'];

    $update = "UPDATE warga SET nama_lengkap='$nama', nomor_kk='$kk', nik='$nik', alamat='$alamat', status='$status' WHERE id=$id";
    mysqli_query($koneksi, $update);
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Warga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Edit Data Warga</h2>
    <form method="POST">
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="nama_lengkap" value="<?= $data['nama_lengkap'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>No KK</label>
            <input type="text" name="nomor_kk" value="<?= $data['nomor_kk'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>NIK</label>
            <input type="text" name="nik" value="<?= $data['nik'] ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Alamat</label>
            <textarea name="alamat" class="form-control" required><?= $data['alamat'] ?></textarea>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="Kepala Keluarga" <?= $data['status'] == 'Kepala Keluarga' ? 'selected' : '' ?>>Kepala Keluarga</option>
                <option value="Anggota Keluarga" <?= $data['status'] == 'Anggota Keluarga' ? 'selected' : '' ?>>Anggota Keluarga</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
</body>
</html>
