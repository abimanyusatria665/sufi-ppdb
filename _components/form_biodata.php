<form method="POST">
  <h5 class="d-inline-block pb-2 mb-3 border-bottom pe-3">Data Pribadi</h5>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-nisn">NISN</label>
        <input name="nisn" type="text" class="form-control shadow-none" id="input-nisn" placeholder="140xxxx" value="<?= isset($data_pendaftaran['nisn']) ? $data_pendaftaran['nisn'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-nik">NIK</label>
        <input name="nik" type="text" class="form-control shadow-none" id="input-nik" placeholder="3275xxxx" value="<?= isset($data_pendaftaran['nik']) ? $data_pendaftaran['nik'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-nama-lengkap">Nama Lengkap</label>
        <input name="nama" type="text" class="form-control shadow-none" id="input-nama-lengkap" placeholder="Sufieli" value="<?= isset($data_pendaftaran['nama']) ? $data_pendaftaran['nama'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-gender">Jenis Kelamin</label>
        <select name="jenis_kelamin" class="form-select shadow-none" id="input-gender" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
          <option>Pilih jenis kelamin</option>
          <option value="pria" <?= isset($data_pendaftaran['jenis_kelamin']) && $data_pendaftaran['jenis_kelamin'] == "pria" ? "selected" : ""; ?>>Pria</option>
          <option value="wanita" <?= isset($data_pendaftaran['jenis_kelamin']) && $data_pendaftaran['jenis_kelamin'] == "wanita" ? "selected" : ""; ?>>Wanita</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-tempat-lahir">Tempat Lahir</label>
        <input name="tempat_lahir" type="text" class="form-control shadow-none" id="input-tempat-lahir" placeholder="Bogor" value="<?= isset($data_pendaftaran['tempat_lahir']) ? $data_pendaftaran['tempat_lahir'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-date-birth">Tanggal Lahir</label>
        <input name="tanggal_lahir" type="date" class="form-control shadow-none" id="input-date-birth" value="<?= isset($data_pendaftaran['tanggal_lahir']) ? $data_pendaftaran['tanggal_lahir'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-12">
      <div class="form-group mb-3">
        <label for="input-alamat-lengkap">Alamat Lengkap</label>
        <input name="alamat" type="text" class="form-control shadow-none" id="input-alamat-lengkap" placeholder="Jl. Banteng Kabupaten Bogor No 17A RT 11 / RW 26" value="<?= isset($data_pendaftaran['alamat']) ? $data_pendaftaran['alamat'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-provinsi">Provinsi</label>
        <select name="provinsi" class="form-select shadow-none" id="input-provinsi" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
          <option>Pilih Provinsi</option>
          <?php foreach ($provinsi as $value) : ?>
            <option value="<?= $value['id']; ?>" <?= isset($data_pendaftaran['provinsi']) && $data_pendaftaran['provinsi'] == $value['id'] ? "selected" : ""; ?>><?= $value['nama']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-kota-kabupaten">Kota / Kabupaten</label>
        <select name="kota_kabupaten" class="form-select shadow-none" id="input-kota-kabupaten" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
          <option>Pilih Kota / Kabupaten</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-kecamatan">Kecamatan</label>
        <select name="kecamatan" class="form-select shadow-none" id="input-kecamatan" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
          <option>Pilih Kecamatan</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-kelurahan">Kelurahan</label>
        <select name="kelurahan" class="form-select shadow-none" id="input-kelurahan" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
          <option>Pilih Kelurahan</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-agama">Agama</label>
        <select name="agama" class="form-select shadow-none" id="input-agama" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
          <option>Pilih Agama</option>
          <option value="islam" <?= isset($data_pendaftaran['agama']) && $data_pendaftaran['agama'] == "islam" ? "selected" : ""; ?>>Islam</option>
          <option value="kristen" <?= isset($data_pendaftaran['agama']) && $data_pendaftaran['agama'] == "kristen" ? "selected" : ""; ?>>Kristen</option>
          <option value="katolik" <?= isset($data_pendaftaran['agama']) && $data_pendaftaran['agama'] == "katolik" ? "selected" : ""; ?>>Katolik</option>
          <option value="hindu" <?= isset($data_pendaftaran['agama']) && $data_pendaftaran['agama'] == "hindu" ? "selected" : ""; ?>>Hindu</option>
          <option value="budha" <?= isset($data_pendaftaran['agama']) && $data_pendaftaran['agama'] == "budha" ? "selected" : ""; ?>>Budha</option>
        </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-no-telp">Nomor Telepon</label>
        <input name="nomor_telepon" type="text" class="form-control shadow-none" id="input-no-telp" placeholder="+62 8xx xxx xxx" value="<?= isset($data_pendaftaran['nomor_telepon']) ? $data_pendaftaran['nomor_telepon'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 1 ? "disabled" : "" ?>>
      </div>
    </div>
  </div>
  <hr />
  <div class="card-footer bg-white text-end border-0 pt-0 d-xl-flex d-block justify-content-between align-items-center px-0">
    <?php if ($posisi_pendaftaran_sekarang > 1) : ?>
      <div class="form-check custom-control custom-checkbox align-items-center text-start w-lg-100">
        <input name="persetujuan" type="checkbox" class="form-check-input custom-control-input" id="input-checkbox" checked disabled>
        <label for="input-checkbox" class="form-check-label opacity-100">Saya mengkonfirmasi bahwa data di atas adalah benar dan siap untuk disimpan.</label>
      </div>
    <?php else : ?>
      <div class="form-check custom-control custom-checkbox align-items-center text-start w-lg-100">
        <input name="persetujuan" type="checkbox" class="form-check-input custom-control-input" id="input-checkbox">
        <label for="input-checkbox" class="form-check-label">Saya mengkonfirmasi bahwa data di atas adalah benar dan siap untuk disimpan.</label>
      </div>
      <button type="submit" class="btn btn-success rounded-pill w-lg-100 md-mt-2" name="simpan_pendaftaran_pertama">Simpan dan Lanjut</button>
    <?php endif; ?>
  </div>
</form>