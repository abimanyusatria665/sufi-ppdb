<?php

include "./_includes/config.php";
if (!$_SESSION['user_email']) header("Location: login");

$config = [
  'page' => 'Pendaftaran'
];

$data_pendaftaran = ambil_pendaftaran();
$provinsi = ambil_provinsi();

$pendaftaran_pertama = "";
$pendaftaran_kedua = "";
$pendaftaran_ketiga = "";

$posisi_pendaftaran_sekarang = isset($data_pendaftaran['posisi']) ? $data_pendaftaran['posisi'] : 1;
$posisi_pendaftaran_get = isset($_GET['posisi']) ? $_GET['posisi'] : $posisi_pendaftaran_sekarang;

$error = [];

if (isset($_POST['simpan_pendaftaran_pertama'])) {
  // Validate NISN
  if (empty($_POST["nisn"])) {
    $errors[] = "NISN is required.";
  } else {
    $nisn = $_POST["nisn"];
  }

  // Validate NIK
  if (empty($_POST["nik"])) {
    $errors[] = "NIK is required.";
  } else {
    $nik = $_POST["nik"];
  }

  // Validate Nama Lengkap
  if (empty($_POST["nama"])) {
    $errors[] = "Nama Lengkap is required.";
  } else {
    $nama = $_POST["nama"];
  }

  // Validate Jenis Kelamin
  if ($_POST["jenis_kelamin"] == "Pilih jenis kelamin") {
    $errors[] = "Jenis Kelamin is required.";
  } else {
    $jenis_kelamin = $_POST["jenis_kelamin"];
  }

  // Validate Tempat Lahir
  if (empty($_POST["tempat_lahir"])) {
    $errors[] = "Tempat Lahir is required.";
  } else {
    $tempat_lahir = $_POST["tempat_lahir"];
  }

  // Validate Tanggal Lahir
  if (empty($_POST["tanggal_lahir"])) {
    $errors[] = "Tanggal Lahir is required.";
  } else {
    $tanggal_lahir = $_POST["tanggal_lahir"];
  }

  // Validate Alamat Lengkap
  if (empty($_POST["alamat"])) {
    $errors[] = "Alamat Lengkap is required.";
  } else {
    $alamat = $_POST["alamat"];
  }

  // Validate Provinsi
  if ($_POST["provinsi"] == "Pilih Provinsi") {
    $errors[] = "Provinsi is required.";
  } else {
    $provinsi = $_POST["provinsi"];
  }

  // Validate Kota / Kabupaten
  if ($_POST["kota_kabupaten"] == "Pilih Kota / Kabupaten") {
    $errors[] = "Kota / Kabupaten is required.";
  } else {
    $kota_kabupaten = $_POST["kota_kabupaten"];
  }

  // Validate Kecamatan
  if ($_POST["kecamatan"] == "Pilih Kecamatan") {
    $errors[] = "Kecamatan is required.";
  } else {
    $kecamatan = $_POST["kecamatan"];
  }

  // Validate Kelurahan
  if ($_POST["kelurahan"] == "Pilih Kelurahan") {
    $errors[] = "Kelurahan is required.";
  } else {
    $kelurahan = $_POST["kelurahan"];
  }

  // Validate Agama
  if ($_POST["agama"] == "Pilih Agama") {
    $errors[] = "Agama is required.";
  } else {
    $agama = $_POST["agama"];
  }

  if (empty($_POST["nomor_telepon"])) {
    $errors[] = "Nomor Telepon is required.";
  } else {
    $nomor_telepon = $_POST["nomor_telepon"];
  }

  if (empty($_POST["persetujuan"])) {
    $errors[] = "Persetujuan";
  }

  if (empty($errors)) {
    $pendaftaran_pertama = simpan_pendaftaran_pertama($_POST);
    $data_pendaftaran = ambil_pendaftaran();
  } else {
    $pendaftaran_pertama = "SIMPAN_PENDAFTARAN_PERTAMA_KOSONG";
  }
}

if (isset($_POST['simpan_pendaftaran_kedua'])) {
  if (empty($_POST["nik_ayah"])) {
    $errors[] = "NIK Ayah is required.";
  } else {
    $nik_ayah = $_POST["nik_ayah"];
  }

  if (empty($_POST["nama_ayah"])) {
    $errors[] = "Nama Ayah is required.";
  } else {
    $nama_ayah = $_POST["nama_ayah"];
  }

  if (empty($_POST["pendidikan_ayah"])) {
    $errors[] = "Pendidikan Ayah is required.";
  } else {
    $pendidikan_ayah = $_POST["pendidikan_ayah"];
  }

  if (empty($_POST["pekerjaan_ayah"])) {
    $errors[] = "Pekerjaan Ayah is required.";
  } else {
    $pekerjaan_ayah = $_POST["pekerjaan_ayah"];
  }

  if (empty($_POST["penghasilan_ayah"])) {
    $errors[] = "Penghasilan Ayah is required.";
  } else {
    $penghasilan_ayah = $_POST["penghasilan_ayah"];
  }

  if (empty($_POST["nomor_ayah"])) {
    $errors[] = "Nomor Ayah is required.";
  } else {
    $nomor_ayah = $_POST["nomor_ayah"];
  }

  if (empty($_POST["nik_ibu"])) {
    $errors[] = "NIK Ibu is required.";
  } else {
    $nik_ibu = $_POST["nik_ibu"];
  }

  if (empty($_POST["nama_ibu"])) {
    $errors[] = "Nama Ibu is required.";
  } else {
    $nama_ibu = $_POST["nama_ibu"];
  }

  if (empty($_POST["pendidikan_ibu"])) {
    $errors[] = "Pendidikan Ibu is required.";
  } else {
    $pendidikan_ibu = $_POST["pendidikan_ibu"];
  }

  if (empty($_POST["pekerjaan_ibu"])) {
    $errors[] = "Pekerjaan Ibu is required.";
  } else {
    $pekerjaan_ibu = $_POST["pekerjaan_ibu"];
  }

  if (empty($_POST["penghasilan_ibu"])) {
    $errors[] = "Penghasilan Ibu is required.";
  } else {
    $penghasilan_ibu = $_POST["penghasilan_ibu"];
  }

  if (empty($_POST["nomor_ibu"])) {
    $errors[] = "Nomor Ibu is required.";
  } else {
    $nomor_ibu = $_POST["nomor_ibu"];
  }

  if (empty($_POST["nik_wali"])) {
    $errors[] = "NIK Wali is required.";
  } else {
    $nik_wali = $_POST["nik_wali"];
  }

  if (empty($_POST["nama_wali"])) {
    $errors[] = "Nama Wali is required.";
  } else {
    $nama_wali = $_POST["nama_wali"];
  }

  if (empty($_POST["pekerjaan_wali"])) {
    $errors[] = "Pekerjaan Wali is required.";
  } else {
    $pekerjaan_wali = $_POST["pekerjaan_wali"];
  }

  if (empty($_POST["nomor_wali"])) {
    $errors[] = "Nomor Wali is required.";
  } else {
    $nomor_wali = $_POST["nomor_wali"];
  }

  if (empty($_POST["persetujuan"])) {
    $errors[] = "Persetujuan";
  }

  if (empty($errors)) {
    $pendaftaran_kedua = simpan_pendaftaran_kedua($_POST);
    $data_pendaftaran = ambil_pendaftaran();
  } else {
    $pendaftaran_kedua = "SIMPAN_PENDAFTARAN_KEDUA_KOSONG";
  }
}

if (isset($_POST['simpan_pendaftaran_ketiga'])) {
  if (empty($_POST["input_npsn"])) {
    $errors[] = "NPSN is required.";
  } else {
    $input_npsn = $_POST["input_npsn"];
  }

  if (empty($_POST["input_sekolah_asal"])) {
    $errors[] = "NPSN is required.";
  } else {
    $input_sekolah_asal = $_POST["input_sekolah_asal"];
  }

  if (empty($_POST["persetujuan"])) {
    $errors[] = "Persetujuan";
  }

  if (empty($errors)) {
    $pendaftaran_ketiga = simpan_pendaftaran_ketiga($_POST);
    $data_pendaftaran = ambil_pendaftaran();
  } else {
    $pendaftaran_ketiga = "SIMPAN_PENDAFTARAN_KETIGA_KOSONG";
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
        <div class="col-lg-9 col-sm-12 col-md-8">
          <div class="card border-0 shadow rounded-5 p-2 border border-top mt-3">
            <div class="card-body">
              <?php if (isset($_GET['posisi']) && is_numeric($_GET['posisi'])) : ?>
                <div class="card-title h3 pb-2 border-bottom"><strong>Pendaftaran (<?= isset($_GET['posisi']) ? $_GET['posisi'] : 1; ?>/3)</strong></div>
              <?php elseif (isset($data_pendaftaran['posisi'])) : ?>
                <div class="card-title h3 pb-2 border-bottom"><strong>Pendaftaran (<?= ($data_pendaftaran['posisi'] > 3) ? 3 : $data_pendaftaran['posisi'] ?>/3)</strong></div>
              <?php else : ?>
                <div class="card-title h3 pb-2 border-bottom"><strong>Pendaftaran (1/3)</strong></div>
              <?php endif; ?>
              <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 d-flex align-items-center mt-3">
                  <?php if (
                    isset($data_pendaftaran['posisi']) && $data_pendaftaran['posisi'] == 2 ||
                    isset($data_pendaftaran['posisi']) && $data_pendaftaran['posisi'] == 3 ||
                    isset($data_pendaftaran['posisi']) && $data_pendaftaran['posisi'] == 4
                  ) : ?>
                    <a class="btn btn-success rounded-5 px-3 my-0" href="pendaftaran?posisi=1">1</a>
                  <?php else : ?>
                    <p class="btn pe-none btn-secondary rounded-5 px-3 my-0">1</p>
                  <?php endif; ?>
                  <div class="d-inline lh-sm">
                    <p class="ms-3 pe-none user-select-none h5 my-0">Biodata</p>
                    <?php if (isset($data_pendaftaran['posisi']) && $data_pendaftaran['posisi'] >= 1) : ?>
                      <p class="ms-3 pe-none user-select-none my-0">Data sudah dilengkapi.</p>
                    <?php else : ?>
                      <p class="ms-3 pe-none user-select-none my-0">Data belum dilengkapi.</p>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 d-flex align-items-center mt-3">
                  <?php if (
                    isset($data_pendaftaran['posisi']) && $data_pendaftaran['posisi'] == 3 ||
                    isset($data_pendaftaran['posisi']) && $data_pendaftaran['posisi'] == 4
                  ) : ?>
                    <a class="btn btn-success rounded-5 px-3 my-0" href="pendaftaran?posisi=2">2</a>
                  <?php else : ?>
                    <a class="btn btn-secondary rounded-5 px-3 my-0" href="pendaftaran?posisi=2">2</a>
                  <?php endif; ?>
                  <div class="d-inline lh-sm">
                    <p class="ms-3 pe-none user-select-none h5 my-0">Data Orang Tua</p>
                    <?php if (isset($data_pendaftaran['posisi']) && $data_pendaftaran['posisi'] >= 2) : ?>
                      <p class="ms-3 pe-none user-select-none my-0">Data sudah dilengkapi.</p>
                    <?php else : ?>
                      <p class="ms-3 pe-none user-select-none my-0">Data belum dilengkapi.</p>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-12 col-sm-12 d-flex align-items-center mt-3">
                  <?php if (isset($data_pendaftaran['posisi']) && $data_pendaftaran['posisi'] > 3) : ?>
                    <a class="btn btn-success rounded-5 px-3 my-0" href="pendaftaran?posisi=3">3</a>
                  <?php else : ?>
                    <a class="btn btn-secondary rounded-5 px-3 my-0" href="pendaftaran?posisi=3">3</a>
                  <?php endif; ?>
                  <div class="d-inline lh-sm">
                    <p class="ms-3 pe-none user-select-none h5 my-0">Berkas</p>
                    <?php if (isset($data_pendaftaran['posisi']) && $data_pendaftaran['posisi'] == 4) : ?>
                      <p class="ms-3 pe-none user-select-none my-0">Data sudah dilengkapi.</p>
                    <?php else : ?>
                      <p class="ms-3 pe-none user-select-none my-0">Data belum dilengkapi.</p>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card border-0 shadow rounded-5 p-2 border border-top mt-4">
            <div class="card-body">
              <?php if ($pendaftaran_pertama) : ?>
                <?php if ($pendaftaran_pertama === "SIMPAN_PENDAFTARAN_PERTAMA_BERHASIL") : ?>
                  <div class="alert alert-success">
                    Menyimpan Pendaftaran Data Pribadi Berhasil!
                  </div>
                <?php elseif ($pendaftaran_pertama === "SIMPAN_PENDAFTARAN_PERTAMA_KOSONG") : ?>
                  <div class="alert alert-danger">
                    Menyimpan Pendaftaran Data Pribadi Gagal! Ada form yang masih kosong.
                  </div>
                <?php elseif ($pendaftaran_pertama === "SIMPAN_PENDAFTARAN_PERTAMA_GAGAL") : ?>
                  <div class="alert alert-danger">
                    Menyimpan Pendaftaran Data Pribadi Gagal! Sepertinya ada kesalahan.
                  </div>
                <?php endif; ?>
              <?php endif; ?>
              <?php if ($pendaftaran_kedua) : ?>
                <?php if ($pendaftaran_kedua === "SIMPAN_PENDAFTARAN_KEDUA_BERHASIL") : ?>
                  <div class="alert alert-success">
                    Menyimpan Pendaftaran Data Orang Tua Berhasil!
                  </div>
                <?php elseif ($pendaftaran_kedua === "SIMPAN_PENDAFTARAN_KEDUA_KOSONG") : ?>
                  <div class="alert alert-danger">
                    Menyimpan Pendaftaran Data Orang Tua Gagal! Ada form yang masih kosong.
                  </div>
                <?php elseif ($pendaftaran_kedua === "SIMPAN_PENDAFTARAN_KEDUA_GAGAL") : ?>
                  <div class="alert alert-danger">
                    Menyimpan Pendaftaran Data Orang Tua Gagal! Sepertinya ada kesalahan.
                  </div>
                <?php endif; ?>
              <?php endif; ?>
              <?php if ($pendaftaran_ketiga) : ?>
                <?php if ($pendaftaran_ketiga === "SIMPAN_PENDAFTARAN_KETIGA_BERHASIL") : ?>
                  <div class="alert alert-success">
                    Menyimpan Pendaftaran Data Berkas Berhasil!
                  </div>
                <?php elseif ($pendaftaran_ketiga === "SIMPAN_PENDAFTARAN_KETIGA_KOSONG") : ?>
                  <div class="alert alert-danger">
                    Menyimpan Pendaftaran Data Berkas Gagal! Ada form yang masih kosong.
                  </div>
                <?php elseif ($pendaftaran_ketiga === "SIMPAN_PENDAFTARAN_KETIGA_GAGAL") : ?>
                  <div class="alert alert-danger">
                    Menyimpan Pendaftaran Data Berkas Gagal! Sepertinya ada kesalahan.
                  </div>
                <?php endif; ?>
              <?php endif; ?>
              <?php if ($posisi_pendaftaran_get == 1 || $posisi_pendaftaran_sekarang == 1) : ?>
                <?php include('_components/form_biodata.php'); ?>
              <?php elseif ($posisi_pendaftaran_get == 2 || $posisi_pendaftaran_sekarang == 2) : ?>
                <?php include('_components/form_orang_tua.php'); ?>
              <?php elseif ($posisi_pendaftaran_get == 3 || $posisi_pendaftaran_sekarang == 3) : ?>
                <?php include('_components/form_berkas.php'); ?>
              <?php else : ?>
                <h5 class="d-inline-block pb-2 mb-3 border-bottom pe-3">Pendaftaran Kamu sudah terkirim. Kamu bisa melihat linimasa pendaftaran kamu di atas ini.</h5>
                <?php if ($data_pendaftaran['konfirmasi'] == 0) : ?>
                  <p>Status Pendaftaran: <span class="badge text-bg-secondary px-2">Menunggu</span>.</p>
                <?php elseif ($data_pendaftaran['konfirmasi'] == 2) : ?>
                  <p>Status Pendaftaran: <span class="badge text-bg-success px-2">Diterima</span>. Silahkan Mengambil Memulai Psikotes.</p>
                <?php elseif ($data_pendaftaran['konfirmasi'] == 2) : ?>
                  <p>Status Pendaftaran: <span class="badge text-bg-danger px-2">Ditolak</span>.</p>
                <?php endif; ?>
              <?php endif; ?>
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