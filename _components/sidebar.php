<div class="col-lg-3 col-sm-12 col-md-4 mt-3">
  <div class="card border-0 shadow rounded-5 p-2 border border-top">
    <div class="card-body">
      <img src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png" class="rounded-5 img-thumbnail mb-3" style="max-height: 114px">
      <h5 class="card-title"><?= $akun_detail['name']; ?></h5>
      <h6 class="card-subtitle mb-2 text-muted">Pelamar — Belum Mendaftar</h6>

      <div class="card-body px-0 border-top pt-3 mt-3">
        <div class="d-grid gap-2">
          <a href="dasbor" class="btn <?= $config['page'] === 'Dasbor' ? "btn-success active" : "btn-light" ?> text-start w-100 rounded-2" style="line-height: initial;">
            <i class="bi <?= $config['page'] === 'Dasbor' ? "bi-house-fill" : "bi-house" ?> me-2"></i>
            Dasbor
          </a>
          <a href="pendaftaran" class="btn <?= $config['page'] === 'Pendaftaran' ? "btn-success active" : "btn-light" ?> text-start w-100 rounded-2" style="line-height: initial;">
            <i class="bi <?= $config['page'] === 'Pendaftaran' ? "bi-file-earmark-arrow-down-fill" : "bi-file-earmark-arrow-down" ?> me-2"></i>
            Pendaftaran
          </a>
          <a href="psikotes" class="btn <?= $config['page'] === 'Psikotes' ? "btn-success active" : "btn-light" ?> text-start w-100 rounded-2" style="line-height: initial;">
            <div class="d-flex justify-content-start">
              <i class="bi <?= $config['page'] === 'Psikotes' ? "bi-patch-question-fill" : "bi-patch-question" ?> me-2"></i>
              <span class="ms-1 flex-grow-1">Psikotes</span>
              <!-- <label class="badge text-bg-secondary">
                <span class="align-text-bottom">
                  Belum
                </span>
              </label> -->
            </div>
          </a>
          <a href="pembayaran" class="btn <?= $config['page'] === 'Pembayaran' ? "btn-success active" : "btn-light" ?> text-start w-100 rounded-2" style="line-height: initial;">
            <i class="bi <?= $config['page'] === 'Pengaturan' ? "bi-gear-fill" : "bi-gear" ?> me-2"></i>
            Pembayaran
          </a>
          <a href="pengaturan" class="btn <?= $config['page'] === 'Pengaturan' ? "btn-success active" : "btn-light" ?> text-start w-100 rounded-2" style="line-height: initial;">
            <i class="bi <?= $config['page'] === 'Pengaturan' ? "bi-gear-fill" : "bi-gear" ?> me-2"></i>
            Pengaturan
          </a>
          <hr class="my-2" />
          <a class="btn btn-danger rounded-pill" href="logout">
            Keluar
          </a>
        </div>
      </div>
    </div>
  </div>
</div>