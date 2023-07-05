<?php

include './_includes/config.php';
if (!$_SESSION['user_email']) {
    header('Location: login');
}

$config = [
  'page' => 'Pembayaran',
];

$success_message = '';
$error_message = '';

// Tambah Data Pembayaran
if (isset($_POST['tambah'])) {
    $status = $_POST['status'];
    $nominal = $_POST['nominal'];
    $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];

    // Validasi form
    if (empty($status) || empty($nominal) || empty($bukti_pembayaran)) {
        $error_message = 'Semua field harus diisi.';
    } else {
        // Upload file bukti pembayaran
        $bukti_pembayaran_target_dir = 'uploads/';
        $bukti_pembayaran_target_file = $bukti_pembayaran_target_dir.basename($bukti_pembayaran);
        $bukti_pembayaran_extension = pathinfo($bukti_pembayaran_target_file, PATHINFO_EXTENSION);

        if (!in_array($bukti_pembayaran_extension, ['jpg', 'jpeg', 'png'])) {
            $error_message = 'File bukti pembayaran harus berupa JPG, JPEG, atau PNG.';
        } elseif ($_FILES['bukti_pembayaran']['size'] > 5000000) {
            $error_message = 'Ukuran file bukti pembayaran tidak boleh lebih dari 5MB.';
        } elseif (move_uploaded_file($_FILES['bukti_pembayaran']['tmp_name'], $bukti_pembayaran_target_file)) {
            // Simpan data pembayaran ke database
            $data_pembayaran = [
                'status' => $status,
                'nominal' => $nominal,
                'bukti_pembayaran' => $bukti_pembayaran_target_file,
            ];

            if (tambahPembayaran($data_pembayaran)) {
                $success_message = 'Data pembayaran berhasil ditambahkan.';
            } else {
                $error_message = 'Gagal menambahkan data pembayaran.';
            }
        } else {
            $error_message = 'Terjadi kesalahan saat mengupload file bukti pembayaran.';
        }
    }
}

$data_pembayaran = getAllDataPembayaran();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB Santri</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    <link href="./assets/style.css" rel="stylesheet">
</head>

<body>
    <br><br><br>
    <form method="POST" enctype="multipart/form-data">
        <div>
            <label for="status">Status Pembayaran:</label>
            <select name="status" id="status">
                <option value="0">Belum Bayar</option>
                <option value="1">Sudah Bayar</option>
            </select>
        </div>
        <div>
            <label for="nominal">Nominal Pembayaran:</label>
            <input type="number" name="nominal" id="nominal">
        </div>
        <div>
            <label for="bukti_pembayaran">Bukti Pembayaran:</label>
            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran">
        </div>
        <div>
            <input type="submit" name="tambah" value="Tambah Pembayaran">
        </div>

        
    </form>

    <table>
  <tr>
    <th>Bukti Pembayaran</th>
    <th>Status</th>
    <th>Nominal</th>
    <th>Action</th>
  </tr>

  <?php foreach ($data_pembayaran as $data) { ?>
    <tr>
      <td><img src="<?php echo $data['bukti_pembayaran']; ?>" alt="Foto" width="100"></td>
      <td><?php echo $data['status']; ?></td>
      <td><?php echo $data['nominal']; ?></td>
      <td><a href="update_pembayaran.php?id<?php echo $data['id']; ?>">edit</a>
      <a href="delete_pembayaran.php?id=<?php echo $data['id']; ?>">delete</a>
</td>

    </tr>
    <?php } ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script>
        $(document).ready(function () {
            window.setTimeout(function () {
                $(".alert").fadeTo(1000, 0).slideUp(1000, function () {
                    $(this).remove();
                });
            }, 3000);
        });
    </script>
</body>

</html>
