<?php

include "./_includes/config.php";
if ($is_login) return header("Location: " . BASE_URL);

$login = "";

if ($_POST) {
  $email = isset($_POST['email']) ? $_POST['email'] : "";
  $password = isset($_POST['password']) ? $_POST['password'] : "";

  if ($email && $password) $login = login(['email' => $email, 'password' => $password]);
  else $login = "LOGIN_FAILED_FIELD";
  if ($login === "LOGIN_SUCCESS") header("Location: " . BASE_URL);
}

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PPDB Santri - Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
  <link href="./assets/style.css" rel="stylesheet">
</head>

<body>
  <div class="container" style="margin-top: 10%;">
    <div class="row justify-content-center">
      <div class="col-sm-12 col-md-8">
        <div class="card border-0 shadow rounded-5 p-2 border border-top">
          <div class="card-body">
            <a href="index">
              <img class="d-block mx-auto mb-3 p-2" src="./assets/logo.png" alt="" height="64">
            </a>
            <h1 class="h2 text-center mb-4 border-bottom pb-2">Login Akun Peserta PPDB</h1>
            <form action="" method="post">
              <?php if ($login) : ?>
                <?php if ($login === "EMAIL_ALREADY_EXISTS") : ?>
                  <div class="alert alert-danger">
                    Login gagal! Email telah terdaftar.
                  </div>
                <?php elseif ($login === "LOGIN_FAILED_FIELD") : ?>
                  <div class="alert alert-danger">
                    Login gagal! Ada form yang masih kosong.
                  </div>
                <?php elseif ($login === "LOGIN_FAILED") : ?>
                  <div class="alert alert-danger">
                    Login gagal! Kombinasi email dan password tidak valid.
                  </div>
                <?php endif; ?>
              <?php endif; ?>
              <div class="form-group">
                <label for="input-email" class="mb-1">Alamat Email</label>
                <input type="email" class="form-control shadow-none" id="input-email" name="email" required>
                <small class="form-text text-muted fst-italic">
                  Kita tidak pernah membagikan alamat email kamu ke orang lain.
                </small>
              </div>
              <div class="form-group mt-2">
                <label for="input-password" class="mb-1">Password</label>
                <input type="password" class="form-control shadow-none" id="input-password" name="password" required>
              </div>
              <button type="submit" class="btn btn-success btn-block rounded-pill mt-3 w-100">Masuk</button>
              <hr>
              <a class="btn btn-secondary btn-block rounded-pill w-100" href="register">
                Registrasi Akun PPDB
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