<?php

function register($data)
{
  global $connection;

  // Sanitize user input
  $email = mysqli_real_escape_string($connection, $data['email']);
  $nama = mysqli_real_escape_string($connection, $data['name']);
  $password = mysqli_real_escape_string($connection, $data['password']);

  if (!$email || !$nama || !$password) return "REGISTER_FAILED";

  // Check if email already exists
  $sql = "SELECT * FROM akun WHERE email='$email'";

  $hasil = mysqli_query($connection, $sql);
  if (mysqli_num_rows($hasil) > 0) return "EMAIL_ALREADY_EXISTS";

  $password_hash = password_hash($password, PASSWORD_BCRYPT);

  // Insert new user into database
  $sql = "INSERT INTO akun (name, password, email, role) VALUES ('$nama', '$password_hash', '$email', 'user')";
  if (mysqli_query($connection, $sql)) return "REGISTER_SUCCESS";
  else return "REGISTER_FAILED";
}

function login($data)
{
  global $connection;

  // Sanitize user input
  $email = mysqli_real_escape_string($connection, $data['email']);
  $password = mysqli_real_escape_string($connection, $data['password']);

  // Retrieve user from database
  $sql = "SELECT * FROM akun WHERE email='$email'";
  $hasil = mysqli_query($connection, $sql);

  if (mysqli_num_rows($hasil) > 0) {
    $row = mysqli_fetch_assoc($hasil);
    $hashed_password = $row['password'];

    // Verify password
    if (password_verify($password, $hashed_password)) {
      $_SESSION['user_id'] = $row['id'];
      $_SESSION['user_email'] = $row['email'];

      return "LOGIN_SUCCESS";
    } else return "LOGIN_FAILED";
  } else return "LOGIN_FAILED";
}

function ubah_profil($data)
{
  global $connection;

  $nama = mysqli_real_escape_string($connection, $data['nama']);
  $email = mysqli_real_escape_string($connection, $data['email']);

  $sql = "UPDATE akun SET name='$nama' WHERE email='$email'";
  if (mysqli_query($connection, $sql)) return "UBAH_PROFIL_BERHASIL";
  else return "UBAH_PROFIL_GAGAL";
}

function akun_detail($email)
{
  global $connection;

  $query = "SELECT * FROM akun WHERE email = '$email'";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $akun = mysqli_fetch_assoc($result);
  }

  return $akun;
}

function ubah_password($data)
{
  global $connection, $akun_detail;

  // Sanitize user input
  $password_baru = mysqli_real_escape_string($connection, $data['password_baru']);
  $password_lama = mysqli_real_escape_string($connection, $data['password_lama']);

  $email = $akun_detail['email'];

  if (password_verify($password_lama, $akun_detail['password'])) {
    $password_hash = password_hash($password_baru, PASSWORD_BCRYPT);
    $query = "UPDATE akun SET password='$password_hash' WHERE email='$email'";
    $result = mysqli_query($connection, $query);

    if ($result) return "UBAH_PASSWORD_BERHASIL";
    return "UBAH_PASSWORD_GAGAL";
  } else return "UBAH_PASSWORD_GAGAL";
}

function ambil_pendaftaran()
{
  global $connection, $akun_detail;

  $akun_id = $akun_detail['id'];
  $pendaftaran = null;

  $query = "SELECT * FROM pendaftaran WHERE akun_id = '$akun_id'";
  $result = mysqli_query($connection, $query);

  if ($result && mysqli_num_rows($result) > 0) {
    $pendaftaran = mysqli_fetch_assoc($result);
  }

  return $pendaftaran;
}

function ambil_provinsi()
{
  global $connection;

  $query = "SELECT * FROM provinsi";
  $result = mysqli_query($connection, $query);

  $provinsi = array(); // Initialize an empty array to store the results

  if ($result && mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      $provinsi[] = $row; // Add each row to the $provinsi array
    }
  }

  return $provinsi;
}

function simpan_pendaftaran_pertama($data)
{
  global $connection, $akun_detail;

  // Sanitize user input
  $nisn = mysqli_real_escape_string($connection, $data['nisn']);
  $nik = mysqli_real_escape_string($connection, $data['nik']);
  $nama = mysqli_real_escape_string($connection, $data['nama']);
  $jenis_kelamin = mysqli_real_escape_string($connection, $data['jenis_kelamin']);
  $tempat_lahir = mysqli_real_escape_string($connection, $data['tempat_lahir']);
  $tanggal_lahir = mysqli_real_escape_string($connection, $data['tanggal_lahir']);
  $alamat = mysqli_real_escape_string($connection, $data['alamat']);
  $provinsi = mysqli_real_escape_string($connection, $data['provinsi']);
  $kota_kabupaten = mysqli_real_escape_string($connection, $data['kota_kabupaten']);
  $kecamatan = mysqli_real_escape_string($connection, $data['kecamatan']);
  $kelurahan = mysqli_real_escape_string($connection, $data['kelurahan']);
  $agama = mysqli_real_escape_string($connection, $data['agama']);
  $nomor_telepon = mysqli_real_escape_string($connection, $data['nomor_telepon']);

  $akun_id = $akun_detail['id'];

  // Retrieve user from database
  $sql = "SELECT * FROM pendaftaran WHERE akun_id='$akun_id'";
  $hasil = mysqli_query($connection, $sql);

  if (mysqli_num_rows($hasil) > 0) {
    // Prepare the update query
    $query = "UPDATE pendaftaran SET nisn='$nisn', nik='$nik', nama='$nama', jenis_kelamin='$jenis_kelamin', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', provinsi='$provinsi', kota_kabupaten='$kota_kabupaten', kecamatan='$kecamatan', kelurahan='$kelurahan', agama='$agama', nomor_telepon='$nomor_telepon', posisi='2' WHERE akun_id='$akun_id'";

    // Execute the update query
    $result = mysqli_query($connection, $query);
  } else {
    // Prepare the insert query
    $query = "INSERT INTO pendaftaran (akun_id, nisn, nik, nama, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, provinsi, kota_kabupaten, kecamatan, kelurahan, agama, nomor_telepon, posisi) VALUES ('$akun_id', '$nisn', '$nik', '$nama', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$provinsi', '$kota_kabupaten', '$kecamatan', '$kelurahan', '$agama', '$nomor_telepon', '2')";

    // Execute the insert query
    $result = mysqli_query($connection, $query);
  }

  if ($result) return "SIMPAN_PENDAFTARAN_PERTAMA_BERHASIL";
  else return "SIMPAN_PENDAFTARAN_PERTAMA_GAGAL";
}

function simpan_pendaftaran_kedua($data)
{
  global $connection, $akun_detail;

  // Sanitize user input
  $nik_ayah = mysqli_real_escape_string($connection, $data['nik_ayah']);
  $nama_ayah = mysqli_real_escape_string($connection, $data['nama_ayah']);
  $pendidikan_ayah = mysqli_real_escape_string($connection, $data['pendidikan_ayah']);
  $pekerjaan_ayah = mysqli_real_escape_string($connection, $data['pekerjaan_ayah']);
  $penghasilan_ayah = mysqli_real_escape_string($connection, $data['penghasilan_ayah']);
  $nomor_ayah = mysqli_real_escape_string($connection, $data['nomor_ayah']);

  // Sanitize user input
  $nik_ibu = mysqli_real_escape_string($connection, $data['nik_ibu']);
  $nama_ibu = mysqli_real_escape_string($connection, $data['nama_ibu']);
  $pendidikan_ibu = mysqli_real_escape_string($connection, $data['pendidikan_ibu']);
  $pekerjaan_ibu = mysqli_real_escape_string($connection, $data['pekerjaan_ibu']);
  $penghasilan_ibu = mysqli_real_escape_string($connection, $data['penghasilan_ibu']);
  $nomor_ibu = mysqli_real_escape_string($connection, $data['nomor_ibu']);

  $nik_wali = mysqli_real_escape_string($connection, $data['nik_wali']);
  $nama_wali = mysqli_real_escape_string($connection, $data['nama_wali']);
  $pekerjaan_wali = mysqli_real_escape_string($connection, $data['pekerjaan_wali']);
  $nomor_wali = mysqli_real_escape_string($connection, $data['nomor_wali']);

  $akun_id = $akun_detail['id'];

  // Retrieve user from database
  $sql = "SELECT * FROM pendaftaran WHERE akun_id='$akun_id'";
  $hasil = mysqli_query($connection, $sql);

  if (mysqli_num_rows($hasil) > 0) {
    // Prepare the update query
    $query = "UPDATE pendaftaran SET nik_ayah='$nik_ayah', nama_ayah='$nama_ayah', pendidikan_ayah='$pendidikan_ayah', pekerjaan_ayah='$pekerjaan_ayah', penghasilan_ayah='$penghasilan_ayah', nomor_telepon_ayah='$nomor_ayah', 
    nik_ibu='$nik_ibu', nama_ibu='$nama_ibu', pendidikan_ibu='$pendidikan_ibu', pekerjaan_ibu='$pekerjaan_ibu', penghasilan_ibu='$penghasilan_ibu', nomor_telepon_ibu='$nomor_ibu',
    nik_wali='$nik_wali', nama_wali='$nama_wali', pekerjaan_wali='$pekerjaan_wali', nomor_telepon_wali='$nomor_wali',
    posisi='3' WHERE akun_id='$akun_id'";

    // Execute the update query
    $result = mysqli_query($connection, $query);
  }

  if ($result) return "SIMPAN_PENDAFTARAN_KEDUA_BERHASIL";
  else return "SIMPAN_PENDAFTARAN_KEDUA_GAGAL";
}

function simpan_pendaftaran_ketiga($data)
{
  global $connection, $akun_detail;

  $input_npsn = mysqli_real_escape_string($connection, $data['input_npsn']);
  $input_sekolah_asal = mysqli_real_escape_string($connection, $data['input_sekolah_asal']);

  // $input_file_pas_foto = mysqli_real_escape_string($connection, $data['input_file_pas_foto']);
  // $input_file_ijazah_depan = mysqli_real_escape_string($connection, $data['input_file_ijazah_depan']);
  // $input_file_ijazah_belakang = mysqli_real_escape_string($connection, $data['input_file_ijazah_belakang']);

  $filename_foto = 'foto_' . $input_npsn;
  $filename_ijazah_depan = 'ijazah_depan_' . $input_npsn;
  $filename_ijazah_belakang = 'ijazah_belakang_' . $input_npsn;

  // gambar
  $nama_file_foto = $_FILES['input_file_pas_foto']['name'];
  $nama_file_idpn = $_FILES['input_file_ijazah_depan']['name'];
  $nama_file_iblkg = $_FILES['input_file_ijazah_belakang']['name'];

  $ext1 = pathinfo($nama_file_foto, PATHINFO_EXTENSION);
  $ext2 = pathinfo($nama_file_idpn, PATHINFO_EXTENSION);
  $ext3 = pathinfo($nama_file_iblkg, PATHINFO_EXTENSION);

  $akun_id = $akun_detail['id'];

  $ukuran_file_foto = $_FILES['input_file_pas_foto']['size'];
  $ukuran_file_ijazah_depan = $_FILES['input_file_ijazah_depan']['size'];
  $ukuran_file_ijazah_belakang = $_FILES['input_file_ijazah_belakang']['size'];

  $ukurantotal = $ukuran_file_foto + $ukuran_file_ijazah_depan + $ukuran_file_ijazah_belakang;

  $tipe_file_foto = $_FILES['input_file_pas_foto']['type'];
  $tipe_file_ijazah_depan = $_FILES['input_file_ijazah_depan']['type'];
  $tipe_file_ijazah_belakang = $_FILES['input_file_ijazah_belakang']['type'];

  $tmp_file_foto = $_FILES['input_file_pas_foto']['tmp_name'];
  $tmp_file_ijazah_depan = $_FILES['input_file_ijazah_depan']['tmp_name'];
  $tmp_file_ijazah_belakang = $_FILES['input_file_ijazah_belakang']['tmp_name'];

  $path_foto = "./assets/images/pendaftaran/" . $filename_foto . '.' . $ext1;
  $path_ijazah_depan = "./assets/images/pendaftaran/" . $filename_ijazah_depan . '.' . $ext2;
  $path_ijazah_belakang = "./assets/images/pendaftaran/" . $filename_ijazah_belakang . '.' . $ext3;

  if (
    $tipe_file_foto != "image/jpeg" || $tipe_file_foto != "image/png" ||
    $tipe_file_ijazah_depan != "image/jpeg" || $tipe_file_ijazah_depan != "image/png" ||
    $tipe_file_ijazah_belakang != "image/jpeg" || $tipe_file_ijazah_belakang != "image/png"
  ) {
    if ($ukurantotal > 1600000) return "SIMPAN_PENDAFTARAN_KETIGA_GAGAL";

    $upload_foto = move_uploaded_file($tmp_file_foto, $path_foto);
    $upload_ijazah_depan = move_uploaded_file($tmp_file_ijazah_depan, $path_ijazah_depan);
    $upload_ijazah_belakang = move_uploaded_file($tmp_file_ijazah_belakang, $path_ijazah_belakang);

    if ($upload_foto && $upload_ijazah_depan && $upload_ijazah_belakang) {
      $query = "UPDATE pendaftaran SET npsn='$input_npsn', sekolah_asal='$input_sekolah_asal', 
      file_pas_foto='$filename_foto" . "." . $ext1 . "', file_ijazah_depan='$filename_ijazah_depan" . "." . $ext2 . "', file_ijazah_belakang='$filename_ijazah_belakang" . "." . $ext3 . "', 
      posisi='4' WHERE akun_id='$akun_id'";

      $result = mysqli_query($connection, $query);

      if ($result) return "SIMPAN_PENDAFTARAN_KETIGA_BERHASIL";
      else return "SIMPAN_PENDAFTARAN_KETIGA_GAGAL";
    } else  "SIMPAN_PENDAFTARAN_KETIGA_GAGAL";
  } else  "SIMPAN_PENDAFTARAN_KETIGA_GAGAL";
}
