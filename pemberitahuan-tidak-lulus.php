<?php

include "./_includes/config.php";
if(isset($_SESSION['user_email'])){
  $role = $_SESSION['role'];
}
$config = [
  'page' => 'Dasbor'
];
$data_pembayaran = getAllDataPembayaran();
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PPDB Santri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap" rel="stylesheet">    
    <link href="./assets/style.css" rel="stylesheet">
</head>

<body>
  <?php include('_components/navbar.php'); ?>
  <main class="bg-white my-3">
    <div class="container">
      <div class="row text-dark">
        <?php include('_components/sidebar.php'); ?>
        <div class="col-lg-9 col-sm-12 col-md-8">
            <h1 class="text-success text-center mt-5 title">Anda Belum Lulus</h1>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>