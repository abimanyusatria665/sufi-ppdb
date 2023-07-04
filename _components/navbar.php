<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container py-2">
    <a class="navbar-brand" href="index">
      <strong>
        Daarul Mughni Al-Maaliki
      </strong>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-main" aria-controls="navbar-main" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-main">
      <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link <?= $config['page'] === 'Beranda' ? "active" : "" ?>" href="index">Beranda</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pengumuman">Pengumuman</a>
        </li>
      </ul>
      <?php if ($is_login) : ?>
        <div class="d-flex gap-2">
          <a class="btn btn-success rounded-pill px-3 btn-navbar" href="pengaturan">
            <i class="bi bi-person-fill me-2"></i>Akun
          </a>
          <a class="btn btn-danger rounded-pill px-4 btn-navbar" href="logout">
            Keluar
          </a>
        </div>
      <?php else : ?>
        <div class="d-flex gap-2">
          <a class="btn btn-success rounded-pill" href="login">Masuk</a>
          <a class="btn btn-secondary rounded-pill" href="register">Registrasi</a>
        </div>
      <?php endif; ?>
    </div>
  </div>
</nav>