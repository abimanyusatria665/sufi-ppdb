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

// Tambah Data Pendaftar
if (isset($_POST['tambah'])) {
    $tanggal = $_POST['tanggal'];
    $foto = $_FILES['foto']['name'];
    $asal_sekolah = $_POST['asal_sekolah'];
    $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
    $nama_ibu = $_POST['nama_ibu'];
    $user_id = 1;
    $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
    $nama_pendaftar = $_POST['nama_pendaftar'];
    $status = $_POST['status'];
    $ijazah = $_FILES['ijazah']['name'];
    $kartu_keluarga = $_FILES['kartu_keluarga']['name'];
    $akte_kelahiran = $_FILES['akte_kelahiran']['name'];
    $ktp_wali = $_FILES['ktp_wali']['name'];

    // Validasi form
    if (empty($tanggal) || empty($foto) || empty($asal_sekolah) || empty($pekerjaan_ayah) || empty($nama_ibu) || empty($pekerjaan_ibu) || empty($nama_pendaftar) || empty($status) || empty($ijazah) || empty($kartu_keluarga) || empty($akte_kelahiran) || empty($ktp_wali)) {
        $error_message = 'Semua field harus diisi.';
    } else {
        // Upload file foto
        $foto_target_dir = 'uploads/';
        $foto_target_file = $foto_target_dir.basename($foto);
        $foto_extension = pathinfo($foto_target_file, PATHINFO_EXTENSION);

        if (!in_array($foto_extension, ['jpg', 'jpeg', 'png'])) {
            $error_message = 'File foto harus berupa JPG, JPEG, atau PNG.';
        } elseif ($_FILES['foto']['size'] > 5000000) {
            $error_message = 'Ukuran file foto tidak boleh lebih dari 5MB.';
        } elseif (move_uploaded_file($_FILES['foto']['tmp_name'], $foto_target_file)) {
            // Upload file ijazah
            $ijazah_target_dir = 'uploads/';
            $ijazah_target_file = $ijazah_target_dir.basename($ijazah);
            $ijazah_extension = pathinfo($ijazah_target_file, PATHINFO_EXTENSION);

            if (!in_array($ijazah_extension, ['pdf'])) {
                $error_message = 'File ijazah harus berupa PDF.';
            } elseif ($_FILES['ijazah']['size'] > 5000000) {
                $error_message = 'Ukuran file ijazah tidak boleh lebih dari 5MB.';
            } elseif (move_uploaded_file($_FILES['ijazah']['tmp_name'], $ijazah_target_file)) {
                // Upload file kartu keluarga
                $kartu_keluarga_target_dir = 'uploads/';
                $kartu_keluarga_target_file = $kartu_keluarga_target_dir.basename($kartu_keluarga);
                $kartu_keluarga_extension = pathinfo($kartu_keluarga_target_file, PATHINFO_EXTENSION);

                if (!in_array($kartu_keluarga_extension, ['jpg', 'jpeg', 'png'])) {
                    $error_message = 'File kartu keluarga harus berupa JPG, JPEG, atau PNG.';
                } elseif ($_FILES['kartu_keluarga']['size'] > 5000000) {
                    $error_message = 'Ukuran file kartu keluarga tidak boleh lebih dari 5MB.';
                } elseif (move_uploaded_file($_FILES['kartu_keluarga']['tmp_name'], $kartu_keluarga_target_file)) {
                    // Upload file akte kelahiran
                    $akte_kelahiran_target_dir = 'uploads/';
                    $akte_kelahiran_target_file = $akte_kelahiran_target_dir.basename($akte_kelahiran);
                    $akte_kelahiran_extension = pathinfo($akte_kelahiran_target_file, PATHINFO_EXTENSION);

                    if (!in_array($akte_kelahiran_extension, ['jpg', 'jpeg', 'png'])) {
                        $error_message = 'File akte kelahiran harus berupa JPG, JPEG, atau PNG.';
                    } elseif ($_FILES['akte_kelahiran']['size'] > 5000000) {
                        $error_message = 'Ukuran file akte kelahiran tidak boleh lebih dari 5MB.';
                    } elseif (move_uploaded_file($_FILES['akte_kelahiran']['tmp_name'], $akte_kelahiran_target_file)) {
                        // Upload file KTP wali
                        $ktp_wali_target_dir = 'uploads/';
                        $ktp_wali_target_file = $ktp_wali_target_dir.basename($ktp_wali);
                        $ktp_wali_extension = pathinfo($ktp_wali_target_file, PATHINFO_EXTENSION);

                        if (!in_array($ktp_wali_extension, ['jpg', 'jpeg', 'png'])) {
                            $error_message = 'File KTP wali harus berupa JPG, JPEG, atau PNG.';
                        } elseif ($_FILES['ktp_wali']['size'] > 5000000) {
                            $error_message = 'Ukuran file KTP wali tidak boleh lebih dari 5MB.';
                        } elseif (move_uploaded_file($_FILES['ktp_wali']['tmp_name'], $ktp_wali_target_file)) {
                            // Simpan data pendaftar ke database
                            $data_pendaftar = [
                              'tanggal' => $tanggal,
                              'foto' => $foto_target_file,
                              'asal_sekolah' => $asal_sekolah,
                              'pekerjaan_ayah' => $pekerjaan_ayah,
                              'nama_ibu' => $nama_ibu,
                              'pekerjaan_ibu' => $pekerjaan_ibu,
                              'nama_pendaftar' => $nama_pendaftar,
                              'status' => $status,
                              'ijazah' => $ijazah_target_file,
                              'kartu_keluarga' => $kartu_keluarga_target_file,
                              'akte_kelahiran' => $akte_kelahiran_target_file,
                              'ktp_wali' => $ktp_wali_target_file,
                              'user_id' => $user_id,
                            ];

                            if (createDataPendaftar($data_pendaftar)) {
                                $success_message = 'Data pendaftar berhasil ditambahkan.';
                            } else {
                                $error_message = 'Gagal menambahkan data pendaftar.';
                            }
                        } else {
                            $error_message = 'Terjadi kesalahan saat mengupload file KTP wali.';
                        }
                    } else {
                        $error_message = 'Terjadi kesalahan saat mengupload file akte kelahiran.';
                    }
                } else {
                    $error_message = 'Terjadi kesalahan saat mengupload file kartu keluarga.';
                }
            } else {
                $error_message = 'Terjadi kesalahan saat mengupload file ijazah.';
            }
        } else {
            $error_message = 'Terjadi kesalahan saat mengupload file foto.';
        }
    }
}

// Ambil Data Pendaftar
$data_pendaftar = getAllDataPendaftar();

?>

<!DOCTYPE html>
<html>

<head>
  <title>Data Pendaftar</title>
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
  <h1>Data Pendaftar</h1>

  <form method="POST" enctype="multipart/form-data">
    <label for="tanggal">Tanggal:</label>
    <input type="date" id="tanggal" name="tanggal" required><br><br>

    <label for="foto">Foto:</label>
    <input type="file" id="foto" name="foto" required><br><br>

    <label for="asal_sekolah">Asal Sekolah:</label>
    <input type="text" id="asal_sekolah" name="asal_sekolah" required><br><br>

    <label for="pekerjaan_ayah">Pekerjaan Ayah:</label>
    <input type="text" id="pekerjaan_ayah" name="pekerjaan_ayah" required><br><br>

    <label for="nama_ibu">Nama Ibu:</label>
    <input type="text" id="nama_ibu" name="nama_ibu" required><br><br>

    <label for="pekerjaan_ibu">Pekerjaan Ibu:</label>
    <input type="text" id="pekerjaan_ibu" name="pekerjaan_ibu" required><br><br>

    <label for="nama_pendaftar">Nama Pendaftar:</label>
    <input type="text" id="nama_pendaftar" name="nama_pendaftar" required><br><br>

    <label for="status">Status:</label>
    <select id="status" name="status" required>
      <option value="Diterima">Diterima</option>
      <option value="Tidak Diterima">Tidak Diterima</option>
    </select><br><br>

    <label for="ijazah">Ijazah:</label>
    <input type="file" id="ijazah" name="ijazah" required><br><br>

    <label for="kartu_keluarga">Kartu Keluarga:</label>
    <input type="file" id="kartu_keluarga" name="kartu_keluarga" required><br><br>

    <label for="akte_kelahiran">Akte Kelahiran:</label>
    <input type="file" id="akte_kelahiran" name="akte_kelahiran" required><br><br>

    <label for="ktp_wali">KTP Wali:</label>
    <input type="file" id="ktp_wali" name="ktp_wali" required><br><br>

    <input type="submit" name="tambah" value="Tambah">
  </form>

  <?php if ($error_message) { ?>
    <p class="error"><?php echo $error_message; ?></p>
  <?php } ?>

  <?php if ($success_message) { ?>
    <p class="success"><?php echo $success_message; ?></p>
  <?php } ?>
  <h2>Data Pendaftar:</h2>

<table>
  <tr>
    <th>Tanggal</th>
    <th>Foto</th>
    <th>Asal Sekolah</th>
    <th>Pekerjaan Ayah</th>
    <th>Nama Ibu</th>
    <th>Pekerjaan Ibu</th>
    <th>Nama Pendaftar</th>
    <th>Status</th>
    <th>Ijazah</th>
    <th>Kartu Keluarga</th>
    <th>Akte Kelahiran</th>
    <th>KTP Wali</th>
    <th>action</th>
  </tr>

  <?php foreach ($data_pendaftar as $data) { ?>
    <tr>
      <td><?php echo $data['tanggal']; ?></td>
      <td><img src="<?php echo $data['foto']; ?>" alt="Foto" width="100"></td>
      <td><?php echo $data['asal_sekolah']; ?></td>
      <td><?php echo $data['pekerjaan_ayah']; ?></td>
      <td><?php echo $data['nama_ibu']; ?></td>
      <td><?php echo $data['pekerjaan_ibu']; ?></td>
      <td><?php echo $data['nama_pendaftar']; ?></td>
      <td><?php echo $data['status']; ?></td>
      <td><a href="<?php echo $data['ijazah']; ?>">Ijazah</a></td>
      <td><img src="<?php echo $data['kartu_keluarga']; ?>" alt="Kartu Keluarga" width="100"></td>
      <td><img src="<?php echo $data['akte_kelahiran']; ?>" alt="Akte Kelahiran" width="100"></td>
      <td><img src="<?php echo $data['ktp_wali']; ?>" alt="KTP Wali" width="100"></td>
      <td><a href="update_pendaftarans.php?id=<?php echo $data['id']; ?>">edit</a></td>
    </tr>
  <?php } ?>
</table>
 
</body>

</html>
