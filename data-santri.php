<?php

include "./_includes/config.php";

if(isset($_SESSION['user_email'])){
  $role = $_SESSION['role'];
}
$config = [
  'page' => 'Dasbor'
];

  if (isset($_POST['verifikasi'])) {
      $id_pembayaran = $_POST['verifikasi'];

      // Lanjutkan dengan logika pembaruan (update) data
      $query = "UPDATE pembayaran SET status = true WHERE id = $id_pembayaran";

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
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">    
  <link href="./assets/style.css" rel="stylesheet">
</head>

<body>
  <?php include('_components/navbar.php'); ?>
  <main class="bg-white my-3">
    <div class="container">
      <div class="row text-dark">
        <?php include('_components/sidebar.php'); ?>
        <?php if($role == 'user'){ ?>
        <div class="col-lg-9 col-sm-12 col-md-8">
          <div class="card border-0 shadow rounded-5 p-2 border border-top">
            <div class="card-body">
              <div class="card-title h3 pb-2 mb-3 border-bottom"><strong>Dasbor</strong></div>
              <p>Selamat datang di Sistem Informasi Pendaftaran Siswa Baru (PSB) Online.</p>
              <p class="mb-0">Panduan Pendaftaran:</p>
              <ol class="px-3">
                <li>Pada bagian menu, klik '<strong>Pendaftaran</strong>'.</li>
                <li>Isi seluruh formulir yang ditampilkan kemudian periksa kembali, pastikan tidak ada data yang salah.</li>
                <li>Klik '<strong>Daftar</strong>', kemudian klik '<strong>Konfirmasi</strong>'. Setelah di-konfirmasi, data tidak dapat diubah kembali.</li>
                <li>Jika sudah, bukti pendaftaran akan tampil dan dapat diunduh menjadi PDF</li>
              </ol>
            </div>
          </div>
        </div>
        <?php }else{ ?>
            <div class="col-lg-9 col-sm-12 col-md-8">
              <h1 class="text-center title">Admin Dashboard</h1>
              <a href="data-pembayaran.php" class="btn btn-success">Data Pembayaran</a>
              <a href="data-santri.php" class="btn btn-success">Data Santri</a>
            <table class="table table-striped  mt-3 ">
            <tr>
                <th>Bukti Pembayaran</th>
                <th>Status</th>
                <th>Nominal</th>
                <th>Action</th>
            </tr>
                <?php foreach ($data_pembayaran as $data) { ?>
                    <tr>
                        <td><img src="<?php echo $data['bukti_pembayaran']; ?>" alt="Foto" width="100"></td>
                        <td>
                          <?php if($data['status'] == true){ echo "sudah di bayar";}?>
                        </td>
                        <td><?php echo $data['nominal']; ?></td>
                        <td>
                          <form action="" method="post">
                            <button class="btn btn-success" name="verifikasi" value="<?php echo $data['id']; ?>">Verifikasi</button>
                          </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
          </div>  
        <?php } ?>  
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>