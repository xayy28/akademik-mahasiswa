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
        <h1>Input Data Mahasiswa</h1>
        <form action="proses.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nim</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" id="nim" name="nim">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Mahasiswa</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Tanggal Lahir</label>
                <input type="date" class="form-control" id="exampleFormControlInput1" id="tanggal" name="tanggal">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" id="alamat" name="alamat">
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Program Studi <span class="text-danger">*</span></label>
                <select class="form-select" name="prodi" required>
                    <option value="">-- Pilih Program Studi --</option>
                    <?php
                    require_once __DIR__ . '/../koneksi.php';
                    $query_prodi = mysqli_query($koneksi, "SELECT * FROM program_studi ORDER BY nama_prodi");
                    while ($prodi = mysqli_fetch_array($query_prodi)) {
                        echo "<option value='" . $prodi['id'] . "'>";
                        echo $prodi['nama_prodi'] . " (" . $prodi['jenjang'] . ")";
                        if (!empty($prodi['akreditasi'])) {
                            echo " - Akreditasi: " . $prodi['akreditasi'];
                        }
                        echo "</option>";
                    }
                    ?>
                </select>
                <div class="form-text">Pilih program studi mahasiswa</div>
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" class="btn btn-primary">
                <a href="list.php" class="btn btn-secondary">Liat list</a>
            </div>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>