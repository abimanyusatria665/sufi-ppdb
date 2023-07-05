<?php

include './_includes/config.php';

if (!$_SESSION['user_email']) {
    header('Location: login');
}

$config = [
  'page' => 'Psikotest',
];

$success_message = '';
$error_message = '';
if (isset($_REQUEST['submit'])) {
    $no_1 = $_REQUEST['no1'];
    $no_2 = $_REQUEST['no2'];
    $no_3 = $_REQUEST['no3'];
    $no_4 = $_REQUEST['no4'];
    $no_5 = $_REQUEST['no5'];
    $no_6 = $_REQUEST['no6'];
    $no_7 = $_REQUEST['no7'];
    $no_8 = $_REQUEST['no8'];
    $no_9 = $_REQUEST['no9'];
    $no_10 = $_REQUEST['no10'];

    $nilai_akhir = 0;
    $nilai_per_soal = 10;

    // Cek jawaban masing-masing soal dan tambahkan nilai jika jawaban benar
    if ($no_1 == 'a') {
        $nilai_akhir += $nilai_per_soal;
    }

    if ($no_2 == 'a') {
        $nilai_akhir += $nilai_per_soal;
    }

    if ($no_3 == 'a') {
        $nilai_akhir += $nilai_per_soal;
    }

    if ($no_4 == 'a') {
        $nilai_akhir += $nilai_per_soal;
    }

    if ($no_5 == 'a') {
        $nilai_akhir += $nilai_per_soal;
    }

    if ($no_6 == 'a') {
        $nilai_akhir += $nilai_per_soal;
    }

    if ($no_7 == 'a') {
        $nilai_akhir += $nilai_per_soal;
    }

    if ($no_8 == 'a') {
        $nilai_akhir += $nilai_per_soal;
    }

    if ($no_9 == 'a') {
        $nilai_akhir += $nilai_per_soal;
    }

    if ($no_10 == 'a') {
        $nilai_akhir += $nilai_per_soal;
    }
    // Cek apakah ada jawaban yang salah
    if ($no_1 != 'a' || $no_2 != 'a' || $no_3 != 'a' || $no_4 != 'a' || $no_5 != 'a' ||
        $no_6 != 'a' || $no_7 != 'a' || $no_8 != 'a' || $no_9 != 'a' || $no_10 != 'a') {
        $result = ($nilai_akhir / 10) * 10;
    }

    $nilai = $nilai_akhir;
    $user_id = 1;

    $data = [
      'nilai' => $nilai,
      'user_id' => $user_id,
    ];

    if (addScoreTest($data)) {
        $current_year = date('Y');

        // Mendapatkan tahun 3 tahun ke depan
        $future_year = $current_year + 3;
        $digit2 = rand(7, 9);

        // Format rentang tahun
        $year_range = $current_year.' - '.$future_year;

        $tahun_ajaran = $year_range;
        $tanggal_masuk = '2023 - 07 - 05';
        $kelas = '7'.$digit2;

        $data = [
          'tahun_ajaran' => $tahun_ajaran,
          'tanggal_masuk' => $tanggal_masuk,
          'kelas' => $kelas,
        ];

        if (createNewSantri($data)) {
            $success_message = 'Data Santri berhasil ditambahkan.';
        }
        $success_message = 'Data pendaftar berhasil ditambahkan.';
    } else {
        $error_message = 'Gagal menambahkan data pendaftar.';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Bootstrap demo</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="./assets/soal.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
      rel="stylesheet"
    />
  </head>
  <body class="bg-1">
    <div class="container mt-5">
      <h1 class="title-1 text-center">Psikotest</h1>
      <div class="soal">
        <div class="card mt-4">
          <h1 class="col-10 offset-1 title-2 mt-4">
            Jawablah pertanyaan di bawah ini dengan cara memilih salah satu
            tombol
          </h1>
          <ol class="col-10 offset-1 mt-3">
          <form action="" method="post">  
          <li>
              <h5 class="soal">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil
                perspiciatis voluptas, praesentium alias porro animi
                exercitationem nulla. In, a quia!
              </h5>
              <div class="d-flex jawaban mt-3">
                <input type="radio" name="no1" id="" value="a" />
                <h5 class="ms-2">jawaban1</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no1" id="" value="b" />
                <h5 class="ms-2">jawaban2</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no1" id="" value="c" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
              <div class="d-flex jawaban mb-3">
                <input type="radio" name="no1" id="" value="d" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
            </li>
            <li>
              <h5 class="soal">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil
                perspiciatis voluptas, praesentium alias porro animi
                exercitationem nulla. In, a quia!
              </h5>
              <div class="d-flex jawaban mt-3">
                <input type="radio" name="no2" id="" value="a" />
                <h5 class="ms-2">jawaban1</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no2" id="" value="b" />
                <h5 class="ms-2">jawaban2</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no2" id="" value="c" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
              <div class="d-flex jawaban mb-3">
                <input type="radio" name="no2" id="" value="d" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
            </li>
            <li>
              <h5 class="soal">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil
                perspiciatis voluptas, praesentium alias porro animi
                exercitationem nulla. In, a quia!
              </h5>
              <div class="d-flex jawaban mt-3">
                <input type="radio" name="no3" id="" value="a" />
                <h5 class="ms-2">jawaban1</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no3" id="" value="b" />
                <h5 class="ms-2">jawaban2</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no3" id="" value="c" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
              <div class="d-flex jawaban mb-3">
                <input type="radio" name="no3" id="" value="d" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
            </li>
            <li>
              <h5 class="soal">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil
                perspiciatis voluptas, praesentium alias porro animi
                exercitationem nulla. In, a quia!
              </h5>
              <div class="d-flex jawaban mt-3">
                <input type="radio" name="no4" id="" value="a" />
                <h5 class="ms-2">jawaban1</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no4" id="" value="b" />
                <h5 class="ms-2">jawaban2</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no4" id="" value="c" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
              <div class="d-flex jawaban mb-3">
                <input type="radio" name="no4" id="" value="d" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
            </li>
            <li>
              <h5 class="soal">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil
                perspiciatis voluptas, praesentium alias porro animi
                exercitationem nulla. In, a quia!
              </h5>
              <div class="d-flex jawaban mt-3">
                <input type="radio" name="no5" id="" value="a" />
                <h5 class="ms-2">jawaban1</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no5" id="" value="b" />
                <h5 class="ms-2">jawaban2</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no5" id="" value="c" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
              <div class="d-flex jawaban mb-3">
                <input type="radio" name="no5" id="" value="d" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
            </li>
            <li>
              <h5 class="soal">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil
                perspiciatis voluptas, praesentium alias porro animi
                exercitationem nulla. In, a quia!
              </h5>
              <div class="d-flex jawaban mt-3">
                <input type="radio" name="no6" id="" value="a" />
                <h5 class="ms-2">jawaban1</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no6" id="" value="b" />
                <h5 class="ms-2">jawaban2</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no6" id="" value="c" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
              <div class="d-flex jawaban mb-3">
                <input type="radio" name="no6" id="" value="d" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
            </li>
            <li>
              <h5 class="soal">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil
                perspiciatis voluptas, praesentium alias porro animi
                exercitationem nulla. In, a quia!
              </h5>
              <div class="d-flex jawaban mt-3">
                <input type="radio" name="no7" id="" value="a" />
                <h5 class="ms-2">jawaban1</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no7" id="" value="b" />
                <h5 class="ms-2">jawaban2</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no7" id="" value="c" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
              <div class="d-flex jawaban mb-3">
                <input type="radio" name="no7" id="" value="d" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
            </li>
            <li>
              <h5 class="soal">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil
                perspiciatis voluptas, praesentium alias porro animi
                exercitationem nulla. In, a quia!
              </h5>
              <div class="d-flex jawaban mt-3">
                <input type="radio" name="no8" id="" value="a" />
                <h5 class="ms-2">jawaban1</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no8" id="" value="b" />
                <h5 class="ms-2">jawaban2</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no8" id="" value="c" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
              <div class="d-flex jawaban mb-3">
                <input type="radio" name="no8" id="" value="d" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
            </li>
            <li>
              <h5 class="soal">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil
                perspiciatis voluptas, praesentium alias porro animi
                exercitationem nulla. In, a quia!
              </h5>
              <div class="d-flex jawaban mt-3">
                <input type="radio" name="no9" id="" value="a" />
                <h5 class="ms-2">jawaban1</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no9" id="" value="b" />
                <h5 class="ms-2">jawaban2</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no9" id="" value="c" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
              <div class="d-flex jawaban mb-3">
                <input type="radio" name="no9" id="" value="d" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
            </li>
            <li>
              <h5 class="soal">
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nihil
                perspiciatis voluptas, praesentium alias porro animi
                exercitationem nulla. In, a quia!
              </h5>
              <div class="d-flex jawaban mt-3">
                <input type="radio" name="no10" id="" value="a" />
                <h5 class="ms-2">jawaban1</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no10" id="" value="b" />
                <h5 class="ms-2">jawaban2</h5>
              </div>
              <div class="d-flex jawaban">
                <input type="radio" name="no10" id="" value="c" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
              <div class="d-flex jawaban mb-3">
                <input type="radio" name="no10" id="" value="d" />
                <h5 class="ms-2">jawaban3</h5>
              </div>
            </li>
                      <button name="submit" type="submit" class="btn btn-success offset-1 col-10 mb-5">
            <h3>KIRIM</h3>
          </button>
          </form>
          </ol>

        </div>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
      crossorigin="anonymous"
    ></script>
  </body>
</html>

