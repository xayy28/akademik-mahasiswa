<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1>Data Mahasiswa</h1>
    <a href="create.php" class="btn btn-primary">Input data mahasiswa</a>
    <a href="program-studi/list.php" class="btn btn-primary">Data Program Studi</a>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nim</th>
          <th scope="col">Nama Mahasiswa</th>
          <th scope="col">Tanggal Lahir</th>
          <th scope="col">Alamat</th>
          <th scope="col">Program Studi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require('../koneksi.php');
        $tampil = $koneksi->query("SELECT m.*,p.nama_prodi from mahasiswa m left join program_studi p on m.program_studi_id = p.id ");
        $no     = 1;
        while ($data = mysqli_fetch_assoc($tampil)) {

        ?>
          <tr>
            <th scope="row"><?php echo $no++ ?></th>
            <td><?php echo $data['nim'] ?></td>
            <td><?php echo $data['nama_mhs'] ?></td>
            <td><?php echo $data['tgl_lahir'] ?></td>
            <td><?php echo $data['alamat'] ?></td>
            <td><?php echo $data['nama_prodi'] ?></td>
            <td>
              <a href="gedit.php?key=<?php echo $data['nim']; ?>" class="btn btn-warning btn-sm">Edit</a>
              <a href="ghapus.php?nim=<?php echo $data['nim']; ?>" class="btn btn-danger btn-sm"
                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
            </td>



          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>




  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
  </script>
</body>

</html>