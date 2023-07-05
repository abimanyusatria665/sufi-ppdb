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
    $nominal = $_POST['nominal'];
    $bukti_pembayaran = $_FILES['bukti_pembayaran']['name'];

    // Validasi form
    if (empty($nominal) || empty($bukti_pembayaran)) {
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
                'status' => false,
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">    
    <link href="./assets/style.css" rel="stylesheet">
</head>

<body><?php include('_components/navbar.php'); ?>
        <div class="container">
            <div class="d-flex">
        <?php include('_components/sidebar.php'); ?>
            <div class="col-9">
                <h1 class="title text-center">Pembayaran</h1>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="card mt-5 col-8 offset-2">
                            <div class="col-10 offset-1 my-3">
                                        <div class="input d-flex">
                                            <label for="nominal" class="col-4">Nominal Pembayaran:</label>
                                            <input type="number" name="nominal" id="nominal" class="form-control ms-3">
                                        </div>
                                        <div class="input d-flex">
                                            <label for="bukti_pembayaran" class="col-4">Bukti Pembayaran:</label>
                                            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" class="form-control ms-3" >
                                        </div>
                                        <div>
                                            <input type="submit" name="tambah" value="Tambah Pembayaran" class="btn btn-success col-12">
                                        </div>
                                </div>
                            </div>
                    </form>
            </div>
        </div>
    
            

    </div>
    
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
