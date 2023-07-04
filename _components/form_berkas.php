<form method="POST" enctype="multipart/form-data">
  <h5 class="d-inline-block pb-2 mb-3 border-bottom pe-3">Data Sekolah Asal & Berkas</h5>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-npsn">NPSN Sekolah Asal</label>
        <input name="input_npsn" type="text" class="form-control shadow-none" id="input-npsn" value="<?= isset($data_pendaftaran['npsn']) ? $data_pendaftaran['npsn'] : ""; ?>" placeholder="NPSN" <?= $posisi_pendaftaran_sekarang > 3 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-nama-sekolah">Nama Sekolah Asal</label>
        <input name="input_sekolah_asal" type="text" class="form-control shadow-none" id="input-nama-sekolah" value="<?= isset($data_pendaftaran['asal_sekolah']) ? $data_pendaftaran['asal_sekolah'] : ""; ?>" placeholder="XXX Jonggol Timur 04" <?= $posisi_pendaftaran_sekarang > 3 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="mb-3">
      <?php if ($posisi_pendaftaran_sekarang > 3) : ?>
        <a class="d-block btn btn-light border-dark" href="assets/pendaftaran/<?= $data_pendaftaran['file_pas_foto']; ?>">Lihat Pas Foto</a>
      <?php else : ?>
        <label for="input-pas-foto" class="form-label">Pas Foto 4x6 (JPG/PNG), Max: 2MB</label>
        <input name="input_file_pas_foto" class="form-control" type="file" id="input-pas-foto">
      <?php endif; ?>
    </div>
    <div class="mb-3">
      <?php if ($posisi_pendaftaran_sekarang > 3) : ?>
        <a class="d-block btn btn-light border-dark" href="assets/pendaftaran/<?= $data_pendaftaran['file_pas_ijazah_depan']; ?>">Lihat Ijazah Depan</a>
      <?php else : ?>
        <label for="input-ijazah-depan" class="form-label">Ijazah Bagian Depan (JPG/PNG), Max: 2MB</label>
        <input name="input_file_ijazah_depan" class="form-control" type="file" id="input-ijazah-depan" <?= $posisi_pendaftaran_sekarang > 3 ? "disabled" : "" ?>>
      <?php endif; ?>
    </div>
    <div class="mb-3">
      <?php if ($posisi_pendaftaran_sekarang > 3) : ?>
        <a class="d-block btn btn-light border-dark" href="assets/pendaftaran/<?= $data_pendaftaran['file_pas_ijazah_belakang']; ?>">Lihat Ijazah Belakang</a>
      <?php else : ?>
        <label for="input-ijazah-belakang" class="form-label">Ijazah Bagian Belakang (JPG/PNG), Max: 2MB</label>
        <input name="input_file_ijazah_belakang" class="form-control" type="file" id="input-ijazah-belakang" <?= $posisi_pendaftaran_sekarang > 3 ? "disabled" : "" ?>>
      <?php endif; ?>
    </div>
  </div>
  <hr />
  <div class="card-footer bg-white text-end border-0 pt-0 d-xl-flex d-block justify-content-between align-items-center px-0">
    <?php if (isset($data_pendaftaran['posisi']) && $data_pendaftaran['posisi'] > 3) : ?>
      <div class="form-check custom-control custom-checkbox align-items-center text-start w-lg-100">
        <input name="persetujuan" type="checkbox" class="form-check-input custom-control-input" id="input-checkbox" checked disabled>
        <label for="input-checkbox" class="form-check-label opacity-100">Saya mengkonfirmasi bahwa data di atas adalah benar dan siap untuk disimpan.</label>
      </div>
    <?php else : ?>
      <div class="form-check custom-control custom-checkbox align-items-center text-start w-lg-100">
        <input name="persetujuan" type="checkbox" class="form-check-input custom-control-input" id="input-checkbox">
        <label for="input-checkbox" class="form-check-label">Saya mengkonfirmasi bahwa data di atas adalah benar dan siap untuk disimpan.</label>
      </div>
      <button type="submit" class="btn btn-success rounded-pill w-lg-100 md-mt-2" name="simpan_pendaftaran_ketiga">Simpan dan Lanjut</button>
    <?php endif; ?>
  </div>
</form>