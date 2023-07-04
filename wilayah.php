<?php
include "./_includes/config.php";

switch ($_GET['jenis']) {
  case 'kota':
    $provinsi_id = $_GET['provinsi_id'];
    if ($provinsi_id == '') {
      exit;
    } else {
      $getcity = mysqli_query($connection, "SELECT * FROM kota_kabupaten WHERE provinsi_id ='$provinsi_id' ORDER BY nama ASC") or die('Query Gagal');
      echo "<option>Pilih Kota / Kabupaten</option>";
      while ($data = mysqli_fetch_array($getcity)) {
        echo '<option value="' . $data['id'] . '">' . $data['nama'] . '</option>';
      }
      exit;
    }
    break;

  case 'kecamatan':
    $kota_kabupaten_id = $_GET['kota_kabupaten_id'];
    if ($kota_kabupaten_id == '') {
      exit;
    } else {
      $getcity = mysqli_query($connection, "SELECT  * FROM kecamatan WHERE kota_kabupaten_id ='$kota_kabupaten_id' ORDER BY nama ASC") or die('Query Gagal');
      echo "<option>Pilih Kecamatan</option>";
      while ($data = mysqli_fetch_array($getcity)) {
        echo '<option value="' . $data['id'] . '">' . $data['nama'] . '</option>';
      }
      exit;
    }
    break;

  case 'kelurahan':
    $kecamatan_id = $_GET['kecamatan_id'];
    if ($kecamatan_id == '') {
      exit;
    } else {
      $getcity = mysqli_query($connection, "SELECT  * FROM kelurahan WHERE kecamatan_id ='$kecamatan_id' ORDER BY nama ASC") or die('Query Gagal');
      echo "<option>Pilih Kelurahan</option>";
      while ($data = mysqli_fetch_array($getcity)) {
        echo '<option value="' . $data['id'] . '">' . $data['nama'] . '</option>';
      }
      exit;
    }
    break;
}
