<?php
session_start();

if (!isset($_SESSION['login']) || $_SESSION['login'] !== TRUE) {
  header("Location: login.php");
  exit;
}
?>

<!doctype html>
<ht lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Data Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>

  <body>
    <?php
    if (isset($_GET['page'])) {
      $page = $_GET['page'];
      if ($page == 'data_mhs') {
        echo "List Data Mahasiswa";
      } elseif ($page == 'create_mhs') {
        echo "Create Data Mahasiswa";
      } elseif ($page == 'edit_mhs') {
        echo "Edit Data Mahasiswa";
      } elseif ($page == 'hapus_mhs') {
        echo "Hapus Data Mahasiswa";
      } elseif ($page == 'data_prodi') {
        echo "List Data Prodi";
      } elseif ($page == 'create_prodi') {
        echo "Create Data Prodi";
      } elseif ($page == 'edit_prodi') {
        echo "Edit Data Prodi";
      } elseif ($page == 'hapus_prodi') {
        echo "hapus Data Prodi";
      } else {
        echo "";
      }
    } else {
      echo "";
    }
    ?>

    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;" data-bs-theme="light">
      <div class="container">
        <a class="navbar-brand" href="#">Data Akademik</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            <a class="nav-link" href="index.php?p=data_mhs">Mahasiswa</a>
            <a class="nav-link" href="index.php?p=data_prodi">Program Studi</a>
          </div>
          <div class="ms-auto d-flex align-items-center gap-2">
            <span class="me-2"> <?= htmlspecialchars($_SESSION['nama'] ?? 'Pengguna'); ?></span>
            <a href="editakun.php" class="btn btn-outline-primary btn-sm">Edit Akun</a>
            <a href="logout.php" class="btn btn-outline-danger btn-sm">Logout</a>
          </div>
        </div>
      </div>
    </nav>
    <div class="container my-4">
      <?php
      $page = isset($_GET['p']) ? $_GET['p'] : "home";

      if ($page == 'home') include("home.php");
      if ($page == 'data_mhs') include("mahasiswa/list.php");
      if ($page == 'create_mhs') include("mahasiswa/create.php");
      if ($page == 'edit_mhs') include("mahasiswa/gedit.php");
      if ($page == 'hapus_mhs') include("mahasiswa/ghapus.php");
      if ($page == 'data_prodi') include("program-studi/list.php");
      if ($page == 'create_prodi') include("program-studi/create.php");
      if ($page == 'edit_prodi') include("program-studi/gedit.php");
      if ($page == 'hapus_prodi') include("program-studi/ghapus.php");
      ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
  </body>

  </html>