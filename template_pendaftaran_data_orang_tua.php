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
              <div class="card-title h3 pb-2 mb-3 border-bottom"><strong>Pendaftaran (2/3)</strong></div>
              <form>
                <h5 class="d-inline-block pb-2 mb-3 border-bottom pe-3">Data Orang Tua (Ayah)</h5>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-nik-ayah">NIK Ayah</label>
                      <input type="text" class="form-control shadow-none" id="input-nik-ayah" placeholder="32711xxx">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-nama-lengkap-ayah">Nama Lengkap Ayah</label>
                      <input type="text" class="form-control shadow-none" id="input-nama-lengkap-ayah" placeholder="Elantoh">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-pendidikan-ayah">Pendidikan Ayah</label>
                      <select class="form-select shadow-none" id="input-pendidikan-ayah">
                        <option>Pilih Pendidikan Ayah</option>
                        <option value="sd">SD</option>
                        <option value="smp">SMP</option>
                        <option value="sma/smk/sederajat">SMA/SMK/Sederajat</option>
                        <option value="s1/sederajat">S1/Sedejarat</option>
                        <option value="s2">S2</option>
                        <option value="s3">S3</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-pekerjaan-ayah">Pekerjaan Ayah</label>
                      <select class="form-select shadow-none" id="input-pekerjaan-ayah">
                        <option>Pilih Pekerjaan Ayah</option>
                        <option value="tidak-bekerja">Tidak Bekerja</option>
                        <option value="pns">PNS</option>
                        <option value="wiraswasta">Wiraswasta</option>
                        <option value="wirausaha">Wirausaha</option>
                        <option value="pekerja-harian-lepas">Pekerja Harian Lepas</option>
                        <option value="tni/polri/polisi">TNI/POLRI/Polisi</option>
                        <option value="buruh">Buruh</option>
                        <option value="pensiun">Pensiun</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-penghasilan-ayah">Penghasilan Ayah Per Bulan</label>
                      <select class="form-select shadow-none" id="input-penghasilan-ayah">
                        <option>Pilih Penghasilan Ayah</option>
                        <option value="<500000">
                          < Rp500.000 </option>
                        <option value="500001-1500000">Rp500.001-Rp1.500.000</option>
                        <option value="1500001-3500000">Rp1.500.001-Rp3.500.000</option>
                        <option value="3500001-5000000">Rp3.500.001-Rp5.000.000</option>
                        <option value="5000001-10000000">Rp5.000.001-Rp10.000.000</option>
                        <option value="10000001-20000000">Rp10.000.001-Rp20.000.000</option>
                        <option value=">20000000">> Rp20.000.000</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-no-telp-ayah">Nomor Telepon Ayah</label>
                      <input type="text" class="form-control shadow-none" id="input-no-telp-ayah" placeholder="+62 xxx">
                    </div>
                  </div>
                </div>
                <h5 class="d-inline-block mt-2 pb-2 mb-3 border-bottom pe-3">Data Orang Tua (Ibu)</h5>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-nik-ibu">NIK Ibu</label>
                      <input type="text" class="form-control shadow-none" id="input-nik-ibu" placeholder="32711xxx">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-nama-lengkap-ibu">Nama Lengkap Ibu</label>
                      <input type="text" class="form-control shadow-none" id="input-nama-lengkap-ibu" placeholder="Masiko">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-pendidikan-ibu">Pendidikan Ibu</label>
                      <select class="form-select shadow-none" id="input-pendidikan-ibu">
                        <option>Pilih Pendidikan Ibu</option>
                        <option value="sd">SD</option>
                        <option value="smp">SMP</option>
                        <option value="sma/smk/sederajat">SMA/SMK/Sederajat</option>
                        <option value="s1/sederajat">S1/Sedejarat</option>
                        <option value="s2">S2</option>
                        <option value="s3">S3</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-pekerjaan-ibu">Pekerjaan Ibu</label>
                      <select class="form-select shadow-none" id="input-pekerjaan-ibu">
                        <option>Pilih Pekerjaan Ibu</option>
                        <option value="ibu-rumah-tangga">Ibu Rumah Tangga</option>
                        <option value="pns">PNS</option>
                        <option value="wiraswasta">Wiraswasta</option>
                        <option value="wirausaha">Wirausaha</option>
                        <option value="pekerja-harian-lepas">Pekerja Harian Lepas</option>
                        <option value="tni/polri/polisi">TNI/POLRI/Polisi</option>
                        <option value="buruh">Buruh</option>
                        <option value="pensiun">Pensiun</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-penghasilan-ibu">Penghasilan Ibu Per Bulan</label>
                      <select class="form-select shadow-none" id="input-penghasilan-ibu">
                        <option>Pilih Penghasilan Ibu</option>
                        <option value="<500000">
                          < Rp500.000 </option>
                        <option value="500001-1500000">Rp500.001-Rp1.500.000</option>
                        <option value="1500001-3500000">Rp1.500.001-Rp3.500.000</option>
                        <option value="3500001-5000000">Rp3.500.001-Rp5.000.000</option>
                        <option value="5000001-10000000">Rp5.000.001-Rp10.000.000</option>
                        <option value="10000001-20000000">Rp10.000.001-Rp20.000.000</option>
                        <option value=">20000000">> Rp20.000.000</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-no-telp-ibu">Nomor Telepon Ibu</label>
                      <input type="text" class="form-control shadow-none" id="input-no-telp-ibu" placeholder="+62 xxx">
                    </div>
                  </div>
                </div>
                <h5 class="d-inline-block mt-2 pb-2 mb-3 border-bottom pe-3">Data Wali</h5>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-nik-wali">NIK Wali</label>
                      <input type="text" class="form-control shadow-none" id="input-nik-wali" placeholder="32711xxx">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-nama-lengkap-wali">Nama Lengkap Wali</label>
                      <input type="text" class="form-control shadow-none" id="input-nama-lengkap-wali" placeholder="Masiyah">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-pekerjaan-wali">Pekerjaan Wali</label>
                      <select class="form-select shadow-none" id="input-pekerjaan-wali">
                        <option>Pilih Pekerjaan Wali</option>
                        <option value="tidak-bekerja">Tidak Bekerja</option>
                        <option value="pns">PNS</option>
                        <option value="wiraswasta">Wiraswasta</option>
                        <option value="wirausaha">Wirausaha</option>
                        <option value="pekerja-harian-lepas">Pekerja Harian Lepas</option>
                        <option value="tni/polri/polisi">TNI/POLRI/Polisi</option>
                        <option value="buruh">Buruh</option>
                        <option value="pensiun">Pensiun</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group mb-3">
                      <label for="input-no-telp-wali">Nomor Telepon Wali</label>
                      <input type="text" class="form-control shadow-none" id="input-no-telp-wali" placeholder="+62 xxx">
                    </div>
                  </div>
                </div>
                <hr />
                <div class="card-footer bg-white text-end border-0 pt-0">
                  <!-- <button type="submit" class="btn btn-success rounded-pill">Simpan dan Lanjut</button> -->
                  <a href="pendaftaran" class="btn btn-secondary rounded-pill px-3">Kembali</a>
                  <a href="pendaftaran_3" class="btn btn-success rounded-pill px-3">Simpan dan Lanjut</a>
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