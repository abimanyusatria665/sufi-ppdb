<?php
include './_includes/config.php';
if (!$_SESSION['user_email']) {
    header('Location: login');
}

$config = [
  'page' => 'Data Pendaftar',
];

$success_message = '';
$error_message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validasi input
    $status = $_POST['status'];
    $nominal = $_POST['nominal'];

    $errors = [];

    // Validasi status
    if (!in_array($status, [0, 1])) {
        $errors[] = 'Status pembayaran tidak valid.';
    }

    // Validasi nominal
    if (!is_numeric($nominal) || $nominal <= 0) {
        $errors[] = 'Nominal pembayaran harus angka dan lebih dari 0.';
    }

    // Cek apakah ada file yang diunggah
    if (!empty($_FILES['bukti_pembayaran']['name'])) {
        $file_name = $_FILES['bukti_pembayaran']['name'];
        $file_tmp = $_FILES['bukti_pembayaran']['tmp_name'];
        $file_size = $_FILES['bukti_pembayaran']['size'];
        $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        // Validasi ekstensi file
        $allowed_ext = ['pdf', 'jpg', 'jpeg'];
        if (!in_array($file_ext, $allowed_ext)) {
            $errors[] = 'Ekstensi file tidak diizinkan. Hanya diperbolehkan file PDF, JPG, dan JPEG.';
        }

            // Validasi ukuran file (maksimum 1 MB)
        $max_file_size = 1024 * 1024; // 1 MB
        if ($file_size > $max_file_size) {
            $errors[] = 'Ukuran file terlalu besar. Maksimum ukuran file adalah 1 MB.';
        }
    } else {
        $errors[] = 'File bukti pembayaran harus diunggah.';
    }

    // Jika tidak ada error, lakukan proses tambah data
    if (empty($errors)) {
        // Generate nama file baru untuk menghindari duplikasi
        $bukti_pembayaran = uniqid().'.'.$file_ext;

        // Pindahkan file ke folder tujuan
        $destination = 'uploads/'.$bukti_pembayaran;
        move_uploaded_file($file_tmp, $destination);

        // Tambah data pembayaran ke database
        if (tambahPembayaran($status, $nominal)) {
            // Redirect ke halaman sukses
            header('Location: sukses.php');
            exit;
        } else {
            $errors[] = 'Gagal menambahkan data pembayaran.';
        }
    }
}
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
        <input type="submit" value="Tambah Pembayaran">
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script>
    $(document).ready(function() {
      // if (window.history.replaceState) window.history.replaceState(null, null, window.location.href);

      window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
          $(this).remove();
        });
      }, 3000);

      const inputProvinsi = document.querySelector('#input-provinsi');
      const inputKotaKabupaten = document.querySelector('#input-kota-kabupaten');
      const inputKecamatan = document.querySelector('#input-kecamatan');
      const inputKelurahan = document.querySelector('#input-kelurahan');

      if (inputProvinsi)
        inputProvinsi.addEventListener('change', function() {
          const selectedProvinsiId = this.value;

          // Create the Ajax request
          const xhr = new XMLHttpRequest();
          xhr.open('GET', 'wilayah.php?jenis=kota&provinsi_id=' + selectedProvinsiId, true);
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              const responseData = xhr.responseText;
              inputKotaKabupaten.setHTML(responseData);
            }
          };
          xhr.send();
        });

      if (inputKotaKabupaten)
        inputKotaKabupaten.addEventListener('change', function() {
          const selectedKotaKabupatenId = this.value;

          // Create the Ajax request
          const xhr = new XMLHttpRequest();
          xhr.open('GET', 'wilayah.php?jenis=kecamatan&kota_kabupaten_id=' + selectedKotaKabupatenId, true);
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              const responseData = xhr.responseText;
              inputKecamatan.setHTML(responseData);
            }
          };
          xhr.send();
        });

      if (inputKecamatan)
        inputKecamatan.addEventListener('change', function() {
          const selectedKecamatanId = this.value;

          // Create the Ajax request
          const xhr = new XMLHttpRequest();
          xhr.open('GET', 'wilayah.php?jenis=kelurahan&kecamatan_id=' + selectedKecamatanId, true);
          xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
              const responseData = xhr.responseText;
              inputKelurahan.setHTML(responseData);
            }
          };
          xhr.send();
        });
    });
  </script>
</body>

</html>