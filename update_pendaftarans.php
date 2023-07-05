<?php
// Start the session (place this at the beginning of your PHP file)
session_start();

include './_includes/config.php';

if (!isset($_SESSION['user_email']) || empty($_SESSION['user_email'])) {
    header('Location: login');
    exit;
}

$config = [
    'page' => 'Update Data Pendaftar',
];

$success_message = '';
$error_message = '';

// Initialize $data_pendaftar to an empty array if not set
$data_pendaftar = [];

if (isset($_GET['id'])) {
    $pendaftar_id = $_GET['id'];

    // Ambil data pendaftar berdasarkan ID dari database
    $data_pendaftar = readDataPendaftar($pendaftar_id);

    if (!$data_pendaftar) {
        header('Location: data_pendaftar.php');
        exit;
    }
}

// Update Data Pendaftar
if (isset($_POST['update'])) {
    // Ambil data dari form
    $tanggal = $_POST['tanggal'];
    $foto = $_FILES['foto']['name'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $nama_pendaftar = $_POST['nama_pendaftar'];
    $status = $_POST['status'];
    $user_id = 1; // Set the user ID as needed

    // Ambil data file yang diunggah
    $ijazah = $_FILES['ijazah']['name'];
    $kartu_keluarga = $_FILES['kartu_keluarga']['name'];
    $akte_kelahiran = $_FILES['akte_kelahiran']['name'];
    $ktp_wali = $_FILES['ktp_wali']['name'];

    // Validasi form
    if (empty($tanggal) || empty($asal_sekolah) || empty($pekerjaan_ayah) || empty($nama_ibu) || empty($pekerjaan_ibu) || empty($nama_pendaftar) || empty($status)) {
        $error_message = 'Semua field harus diisi.';
    } else {
        // Update data pendaftar di database
        $data_pendaftar['tanggal'] = $tanggal;
        $data_pendaftar['asal_sekolah'] = $asal_sekolah;
        $data_pendaftar['pekerjaan_ayah'] = $pekerjaan_ayah;
        $data_pendaftar['nama_ibu'] = $nama_ibu;
        $data_pendaftar['pekerjaan_ibu'] = $pekerjaan_ibu;
        $data_pendaftar['nama_pendaftar'] = $nama_pendaftar;
        $data_pendaftar['status'] = $status;
        $data_pendaftar['user_id'] = $user_id;
        $data_pendaftar['ijazah'] = $ijazah;
        $data_pendaftar['kartu_keluarga'] = $kartu_keluarga;
        $data_pendaftar['akte_kelahiran'] = $akte_kelahiran;
        $data_pendaftar['ktp_wali'] = $ktp_wali;

        // Simpan perubahan ke database
        $result = updateDataPendaftar($data_pendaftar);

        if ($result) {
            $success_message = 'Data pendaftar berhasil diperbarui.';
        } else {
            $error_message = 'Terjadi kesalahan saat memperbarui data pendaftar.';
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Update Data Pendaftar</title>
    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }
    </style>
</head>

<body>
    <h1>Update Data Pendaftar</h1>

    <?php if ($error_message) { ?>
        <p class="error"><?php echo $error_message; ?></p>
    <?php } ?>

    <?php if ($success_message) { ?>
        <p class="success"><?php echo $success_message; ?></p>
    <?php } ?>

    <form method="POST">
        <label for="tanggal">Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal" value="<?php echo $data_pendaftar['tanggal']; ?>" required><br><br>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" required><br><br>

        <label for="asal_sekolah">Asal Sekolah:</label>
        <input type="text" id="asal_sekolah" name="asal_sekolah" value="<?php echo $data_pendaftar['asal_sekolah']; ?>" required><br><br>

        <label for="pekerjaan_ayah">Pekerjaan Ayah:</label>
        <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" value="<?php echo $data_pendaftar['pekerjaan_ayah']; ?>" required><br><br>

        <label for="nama_ibu">Nama Ibu:</label>
        <input type="text" id="nama_ibu" name="nama_ibu" value="<?php echo $data_pendaftar['nama_ibu']; ?>" required><br><br>

        <label for="pekerjaan_ibu">Pekerjaan Ibu:</label>
        <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" value="<?php echo $data_pendaftar['pekerjaan_ibu']; ?>" required><br><br>

        <label for="nama_pendaftar">Nama Pendaftar:</label>
        <input type="text" id="nama_pendaftar" name="nama_pendaftar" value="<?php echo $data_pendaftar['nama_pendaftar']; ?>" required><br><br>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="Diterima" <?php if ($data_pendaftar['status'] == 'Diterima') {
                echo 'selected';
            } ?>>Diterima</option>
            <option value="Ditolak" <?php if ($data_pendaftar['status'] == 'Ditolak') {
                echo 'selected';
            } ?>>Ditolak</option>
            <option value="Menunggu" <?php if ($data_pendaftar['status'] == 'Menunggu') {
                echo 'selected';
            } ?>>Menunggu</option>
        </select><br><br>

        <label for="ijazah">Ijazah:</label>
        <input type="file" id="ijazah" name="ijazah" required><br><br>

        <label for="kartu_keluarga">Kartu Keluarga:</label>
        <input type="file" id="kartu_keluarga" name="kartu_keluarga" required><br><br>

        <label for="akte_kelahiran">Akte Kelahiran:</label>
        <input type="file" id="akte_kelahiran" name="akte_kelahiran" required><br><br>

        <label for="ktp_wali">Ktp Wali:</label>
        <input type="file" id="ktp_wali" name="ktp_wali" required><br><br>

        <input type="submit" name="update" value="Update">
    </form>
</body>

</html>