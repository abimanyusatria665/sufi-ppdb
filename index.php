<?php include "./_includes/config.php";

$config = [
  'page' => 'Beranda'
];
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
  <main class="bg-light text-dark">
    <div class="px-4 py-5 text-center">
      <img class="d-block mx-auto mb-4 p-2" src="./assets/logo.png" alt="" height="76">
      <h1 class="display-5 fw-bold text-body-emphasis">
        PENDAFTARAN SANTRI BARU (PSB) ONLINE
      </h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores consectetur culpa quas porro nesciunt est eum sint odit nulla, distinctio expedita dicta veritatis, fuga sit at illo laboriosam. Reprehenderit, modi cupiditate.
        </p>
        <?php if ($is_login) : ?>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="pendaftaran" class="btn btn-success px-4">Lihat Pendaftaran Kamu</a>
          </div>
        <?php else : ?>
          <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a href="register" class="btn btn-secondary px-4">Registrasi</a>
          </div>
        <?php endif; ?>
        <hr />
      </div>
      <p class="lead">Pondok Pesantren Daarul Mughni Al-Maaliki</p>
    </div>
  </main>
  <section class="bg-white text-dark">
    <div class="container px-4 py-5">
      <h2 class="h1 text-center pb-0"><strong>PANDUAN PENDAFTARAN</strong></h2>
      <p class="border-bottom pb-2 text-center lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident, omnis!</p>
      <div class="row g-4 py-5 row-cols-1 row-cols-lg-2">
        <div class="col">
          <div class="d-inline-flex align-items-center justify-content-center text-bg-success bg-gradient fs-2 mb-3 rounded-4">
            <i class="bi bi-person-fill px-2"></i>
          </div>
          <h3 class="fs-2 text-body-emphasis">Pendaftaran Akun</h3>
          <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        </div>
        <div class="col">
          <div class="d-inline-flex align-items-center justify-content-center text-bg-success bg-gradient fs-2 mb-3 rounded-4">
            <i class="bi bi-file-post px-2"></i>
          </div>
          <h3 class="fs-2 text-body-emphasis">Pengisian Berkas</h3>
          <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        </div>
        <div class="col">
          <div class="d-inline-flex align-items-center justify-content-center text-bg-success bg-gradient fs-2 mb-3 rounded-4">
            <i class="bi bi-patch-question-fill px-2"></i>
          </div>
          <h3 class="fs-2 text-body-emphasis">Psikotes</h3>
          <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        </div>
        <div class="col">
          <div class="d-inline-flex align-items-center justify-content-center text-bg-success bg-gradient fs-2 mb-3 rounded-4">
            <i class="bi bi-award-fill px-2"></i>
          </div>
          <h3 class="fs-2 text-body-emphasis">Pengumuman</h3>
          <p>Paragraph of text beneath the heading to explain the heading. We'll add onto it with another sentence and probably just keep going until we run out of words.</p>
        </div>
      </div>
    </div>
  </section>
  <footer class="bg-light text-center text-lg-start py-3">
    <div class="text-center">
      <p class="text-dark text-decoration-none">© 2023 - Pondok Pesantren Daarul Mughni Al-Maaliki ❤</p>
    </div>
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>