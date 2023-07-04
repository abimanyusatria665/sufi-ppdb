<?php

include "./_includes/config.php";
if (!$_SESSION['user_email']) header("Location: login");

$config = [
  'page' => 'Pengaturan'
];

$ubah_profil = '';
$ubah_password = '';

if (isset($_POST['ubah_profil'])) {
  $email = $_SESSION['user_email'];
  $nama = $_POST['nama'];

  if (!$email || !$nama) $ubah_profil = "UBAH_PROFIL_KOSONG";
  else {
    $ubah_profil = ubah_profil(['email' => $email, 'nama' => $nama]);
    $akun_detail = akun_detail($email);
  }
}

if (isset($_POST['ubah_password'])) {
  $password_baru = $_POST['password_baru'];
  $konfirmasi_password_baru = $_POST['konfirmasi_password_baru'];
  $password_lama = $_POST['password_lama'];

  if (!$password_baru || !$konfirmasi_password_baru || !$password_lama) $ubah_password = 'UBAH_PASSWORD_KOSONG';
  else if ($password_baru !== $konfirmasi_password_baru) $ubah_password = 'UBAH_PASSWORD_TIDAK_SAMA';
  else {
    $ubah_password = ubah_password(['password_baru' => $password_baru, 'password_lama' => $password_lama]);
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
  <?php include('_components/navbar.php'); ?>
  <main class="bg-white my-3 h-100">
    <div class="container">
      <div class="row text-dark">
        <?php include('_components/sidebar.php'); ?>
        <div class="col-lg-9 col-sm-12 col-md-8 mt-3">
          <div class="card border-0 shadow rounded-5 p-2 border border-top">
            <div class="card-body">
              <div class="card-title h3 pb-2 mb-3 border-bottom"><strong>Pengaturan Profil</strong></div>
              <?php if ($ubah_profil) : ?>
                <?php if ($ubah_profil === "UBAH_PROFIL_BERHASIL") : ?>
                  <div class="alert alert-success">
                    Ubah Profil Berhasil!
                  </div>
                <?php elseif ($ubah_profil === "UBAH_PROFIL_KOSONG") : ?>
                  <div class="alert alert-danger">
                    Ubah Profil Gagal! Ada form yang masih kosong.
                  </div>
                <?php elseif ($ubah_profil === "UBAH_PROFIL_GAGAL") : ?>
                  <div class="alert alert-danger">
                    Ubah Profil Gagal! Sepertinya ada kesalahan.
                  </div>
                <?php endif; ?>
              <?php endif; ?>
              <form method="POST">
                <div class="row">
                  <div class="col-md-6 mb-3">
                    <label for="input-email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="input-email" value="<?= $akun_detail['email']; ?>" disabled="">
                  </div>
                  <div class="col-md-6 mb-3">
                    <label for="input-name" class="form-label">Nama Lengkap</label>
                    <input name="nama" type="text" class="form-control" id="input-name" value="<?= $akun_detail['name']; ?>">
                  </div>
                </div>
                <hr />
                <div class="card-footer bg-white text-end border-0 pt-0 mb-2">
                  <button type="submit" class="btn btn-success rounded-pill px-3" name="ubah_profil">Simpan Profil</button>
                </div>
              </form>
            </div>
          </div>
          <div class="card border-0 shadow rounded-5 p-2 border border-top mt-4">
            <div class="card-body">
              <div class="card-title h3 pb-2 mb-3 border-bottom"><strong>Pengaturan Password</strong></div>
              <div class="row">
                <div class="col-12">
                  <?php if ($ubah_password) : ?>
                    <?php if ($ubah_password === "UBAH_PASSWORD_BERHASIL") : ?>
                      <div class="alert alert-success">
                        Ubah Password Berhasil!
                      </div>
                    <?php elseif ($ubah_password === "UBAH_PASSWORD_KOSONG") : ?>
                      <div class="alert alert-danger">
                        Ubah Password Gagal! Ada form yang masih kosong.
                      </div>
                    <?php elseif ($ubah_password === "UBAH_PASSWORD_TIDAK_SAMA") : ?>
                      <div class="alert alert-danger">
                        Ubah Password Gagal! Password Baru dan Konfirmasi Password Baru tidak sama.
                      </div>
                    <?php elseif ($ubah_password === "UBAH_PASSWORD_GAGAL") : ?>
                      <div class="alert alert-danger">
                        Ubah Password Gagal! Sepertinya ada kesalahan.
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
                  <form method="POST">
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="input-password-baru" class="form-label">Password Baru</label>
                        <input name="password_baru" type="password" class="form-control" id="input-password-baru">
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="input-konfirmasi-password-baru" class="form-label">Konfirmasi Password Baru</label>
                        <input name="konfirmasi_password_baru" type="password" class="form-control" id="input-konfirmasi-password-baru">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="input-password-lama" class="form-label">Password Lama</label>
                        <input name="password_lama" type="password" class="form-control" id="input-password-lama">
                      </div>
                    </div>
                    <hr />
                    <div class="card-footer bg-white text-end border-0 pt-0 px-0">
                      <button type="submit" class="btn btn-success rounded-pill px-3" name="ubah_password">Ganti Password</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script>
    $(document).ready(function() {
      if (window.history.replaceState) window.history.replaceState(null, null, window.location.href);

      window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
          $(this).remove();
        });
      }, 3000);
    });
  </script>
</body>

</html>