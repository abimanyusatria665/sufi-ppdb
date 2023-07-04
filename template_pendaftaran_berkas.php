<?php

include "./_includes/config.php";

$config = [
  'page' => 'Pendaftaran'
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
  <main class="bg-white my-3 h-100">
    <div class="container">
      <div class="row text-dark">
        <?php include('_components/sidebar.php'); ?>
        <div class="col-lg-9 col-sm-12 col-md-8 mt-3">
          <div class="card border-0 shadow rounded-5 p-2 border border-top">
            <div class="card-body">
              <div class="card-title h3 pb-2 mb-3 border-bottom"><strong>Pendaftaran (3/3)</strong></div>
              <form>
                <h5 class="d-inline-block pb-2 mb-3 border-bottom pe-3">Data Sekolah Asal & Berkas</h5>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-npsn">NPSN Sekolah Asal</label>
                      <input type="text" class="form-control shadow-none" id="input-npsn" placeholder="NPSN">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-nama-sekolah">Nama Sekolah Asal</label>
                      <input type="text" class="form-control shadow-none" id="input-nama-sekolah" placeholder="XXX Jonggol Timur 04">
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="input-pas-foto" class="form-label">Pas Foto 4x6 (JPG/PNG), Max: 2MB</label>
                    <input class="form-control" type="file" id="input-pas-foto">
                  </div>
                  <div class="mb-3">
                    <label for="input-ijazah-depan" class="form-label">Ijazah Bagian Depan (JPG/PNG), Max: 2MB</label>
                    <input class="form-control" type="file" id="input-ijazah-depan">
                  </div>
                  <div class="mb-3">
                    <label for="input-ijazah-belakang" class="form-label">Ijazah Bagian Belakang (JPG/PNG), Max: 2MB</label>
                    <input class="form-control" type="file" id="input-ijazah-belakang">
                  </div>
                </div>
                <hr />
                <div class="card-footer bg-white text-end border-0 pt-0">
                  <!-- <button type="submit" class="btn btn-success rounded-pill">Simpan dan Lanjut</button> -->
                  <a href="pendaftaran_2" class="btn btn-secondary rounded-pill px-3">Kembali</a>
                  <a href="pendaftaran_selesai" class="btn btn-success rounded-pill px-3">Simpan dan Konfirmasi</a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>