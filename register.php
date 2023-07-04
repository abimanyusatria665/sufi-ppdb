<?php

include "./_includes/config.php";
if ($is_login) return header("Location: " . BASE_URL);

$register = "";

if ($_POST) {
  $email = isset($_POST['email']) ? $_POST['email'] : "";
  $nama = isset($_POST['nama']) ? $_POST['nama'] : "";
  $password = isset($_POST['password']) ? $_POST['password'] : "";
  $konfirmasi_password = isset($_POST['konfirmasi_password']) ? $_POST['konfirmasi_password'] : "";

  if ($password !== $konfirmasi_password) $register = "REGISTER_GAGAL_PASSWORD_TIDAK_SAMA";
  else if ($email && $nama && $password && $konfirmasi_password) $register = register(['email' => $email, 'name' => $nama, 'password' => $password]);
  else $register = "REGISTER_FAILED";
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PPDB Santri - Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <link href="./assets/style.css" rel="stylesheet">
</head>

<body>
  <div class="container" style="margin-top: 10%">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-md-7">
        <div class="card border-0 shadow rounded-5 p-2 border border-top">
          <div class="card-body">
            <a href="index">
              <img class="d-block mx-auto mb-3 p-2" src="./assets/logo.png" alt="" height="64">
            </a>
            <h1 class="h2 text-center mb-4 border-bottom pb-2">Daftar Akun Peserta PPDB</h1>
            <form action="" method="post">
              <?php if ($register) : ?>
                <?php if ($register === "REGISTER_SUCCESS") : ?>
                  <div class="alert alert-success">
                    Register berhasil! Silahkan login.
                  </div>
                <?php elseif ($register === "EMAIL_ALREADY_EXISTS") : ?>
                  <div class="alert alert-danger">
                    Register gagal! Email telah terdaftar.
                  </div>
                <?php elseif ($register === "REGISTER_FAILED") : ?>
                  <div class="alert alert-danger">
                    Register gagal! Ada form yang masih kosong.
                  </div>
                <?php elseif ($register === "REGISTER_GAGAL_PASSWORD_TIDAK_SAMA") : ?>
                  <div class="alert alert-danger">
                    Register gagal! Password dan Konfirmasi Password tidak sama.
                  </div>
                <?php endif; ?>
              <?php endif; ?>
              <div class="form-group mt-2">
                <label for="input-email" class="mb-1">Alamat Email</label>
                <input type="email" class="form-control shadow-none" id="input-email" name="email" required>
              </div>
              <div class="form-group mt-2">
                <label for="input-nama" class="mb-1">Nama Lengkap</label>
                <input type="text" class="form-control shadow-none" id="input-nama" name="nama" required>
              </div>
              <div class="form-group mt-2">
                <label for="input-password" class="mb-1">Password</label>
                <input type="password" class="form-control shadow-none" id="input-password" name="password" required>
              </div>
              <div class="form-group mt-2">
                <label for="input-konfirmasi-password" class="mb-1">Konfirmasi Password</label>
                <input type="password" class="form-control shadow-none" id="input-konfirmasi-password" name="konfirmasi_password" required>
              </div>
              <button type="submit" class="btn btn-success btn-block rounded-pill mt-3 w-100">Register</button>
              <hr>
              <a class="btn btn-secondary btn-block rounded-pill w-100" href="login">
                Login Akun PPDB
              </a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>