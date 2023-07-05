<?php

include './_includes/config.php';

if (!$_SESSION['user_email']) {
    header('Location: login');
}

$config = [
  'page' => 'Psikotest',
];

isAdmin();

$success_message = '';
$error_message = '';
$getAllScore = getAllScore();
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
      <h1 class="title-1 text-center">Data Psikotest</h1>
      <div class="soal">
        <div class="card mt-4">
        <table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nilai</th>
      <th scope="col">User Id</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
foreach ($getAllScore as $data) {
    ?>
    <tr>
      <th scope="row"><?php echo $no; ?></th>
      <td><?php echo $data['nilai']; ?></td>
      <td><?php echo $data['name']; ?></td>
</tr>
<?php
++$no;
}
?>
  </tbody>
</table>

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

