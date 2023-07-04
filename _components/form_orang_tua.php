<form method="POST">
  <h5 class="d-inline-block pb-2 mb-3 border-bottom pe-3">Data Orang Tua (Ayah)</h5>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-nik-ayah">NIK Ayah</label>
        <input name="nik_ayah" type="text" class="form-control shadow-none" id="input-nik-ayah" placeholder="32711xxx" value="<?= isset($data_pendaftaran['nik_ayah']) ? $data_pendaftaran['nik_ayah'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-nama-lengkap-ayah">Nama Lengkap Ayah</label>
        <input name="nama_ayah" type="text" class="form-control shadow-none" id="input-nama-lengkap-ayah" placeholder="Elantoh" value="<?= isset($data_pendaftaran['nama_ayah']) ? $data_pendaftaran['nama_ayah'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-pendidikan-ayah">Pendidikan Ayah</label>
        <select name="pendidikan_ayah" class="form-select shadow-none" id="input-pendidikan-ayah" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
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
        <select name="pekerjaan_ayah" class="form-select shadow-none" id="input-pekerjaan-ayah" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
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
        <select name="penghasilan_ayah" class="form-select shadow-none" id="input-penghasilan-ayah" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
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
        <input name="nomor_ayah" type="text" class="form-control shadow-none" id="input-no-telp-ayah" placeholder="+62 xxx" value="<?= isset($data_pendaftaran['nomor_telepon_ayah']) ? $data_pendaftaran['nomor_telepon_ayah'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
      </div>
    </div>
  </div>
  <h5 class="d-inline-block mt-2 pb-2 mb-3 border-bottom pe-3">Data Orang Tua (Ibu)</h5>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-nik-ibu">NIK Ibu</label>
        <input name="nik_ibu" type="text" class="form-control shadow-none" id="input-nik-ibu" placeholder="32711xxx" value="<?= isset($data_pendaftaran['nik_ibu']) ? $data_pendaftaran['nik_ibu'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-nama-lengkap-ibu">Nama Lengkap Ibu</label>
        <input name="nama_ibu" type="text" class="form-control shadow-none" id="input-nama-lengkap-ibu" placeholder="Masiko" value="<?= isset($data_pendaftaran['nama_ibu']) ? $data_pendaftaran['nama_ibu'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-pendidikan-ibu">Pendidikan Ibu</label>
        <select name="pendidikan_ibu" class="form-select shadow-none" id="input-pendidikan-ibu" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
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
        <select name="pekerjaan_ibu" class="form-select shadow-none" id="input-pekerjaan-ibu" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
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
        <select name="penghasilan_ibu" class="form-select shadow-none" id="input-penghasilan-ibu" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
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
        <input name="nomor_ibu" type="text" class="form-control shadow-none" id="input-no-telp-ibu" placeholder="+62 xxx" value="<?= isset($data_pendaftaran['nomor_telepon_ibu']) ? $data_pendaftaran['nomor_telepon_ibu'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
      </div>
    </div>
  </div>
  <h5 class="d-inline-block mt-2 pb-2 mb-3 border-bottom pe-3">Data Wali</h5>
  <div class="row">
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-nik-wali">NIK Wali</label>
        <input name="nik_wali" type="text" class="form-control shadow-none" id="input-nik-wali" placeholder="32711xxx" value="<?= isset($data_pendaftaran['nik_wali']) ? $data_pendaftaran['nik_wali'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-nama-lengkap-wali">Nama Lengkap Wali</label>
        <input name="nama_wali" type="text" class="form-control shadow-none" id="input-nama-lengkap-wali" placeholder="Masiyah" value="<?= isset($data_pendaftaran['nama_wali']) ? $data_pendaftaran['nama_wali'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
      </div>
    </div>
    <div class="col-md-6">
      <div class="form-group mb-3">
        <label for="input-pekerjaan-wali">Pekerjaan Wali</label>
        <select name="pekerjaan_wali" class="form-select shadow-none" id="input-pekerjaan-wali" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
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
        <input name="nomor_wali" type="text" class="form-control shadow-none" id="input-no-telp-wali" placeholder="+62 xxx" value="<?= isset($data_pendaftaran['nomor_telepon_wali']) ? $data_pendaftaran['nomor_telepon_wali'] : ""; ?>" <?= $posisi_pendaftaran_sekarang > 2 ? "disabled" : "" ?>>
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
      <div class="card-footer bg-white text-end border-0 pt-0 d-xl-flex d-block justify-content-between align-items-center px-0">
        <div class="form-check custom-control custom-checkbox align-items-center text-start w-lg-100">
          <input name="persetujuan" type="checkbox" class="form-check-input custom-control-input" id="input-checkbox">
          <label for="input-checkbox" class="form-check-label">Saya mengkonfirmasi bahwa data di atas adalah benar dan siap untuk disimpan.</label>
        </div>
        <button type="submit" class="btn btn-success rounded-pill w-lg-100 md-mt-2" name="simpan_pendaftaran_kedua">Simpan dan Lanjut</button>
      </div>
    <?php endif; ?>
  </div>
</form>