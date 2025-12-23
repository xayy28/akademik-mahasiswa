<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>

<?php
include("../koneksi.php");
    $edit = $koneksi->query("SELECT * FROM program_studi WHERE id='$_GET[id]'");
    $data = $edit->fetch_assoc();

?>

<body>
    <div class="container">
        <h1>Edit Data Program Studi</h1>
        <form method="post" action="">
            <div class="mb-3">
                <label for="nim" class="form-label">Id</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $data['id']; ?>"
                    readonly>
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Program Studi</label>
                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $data['nama_prodi']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenjang</label>
                 <select class="form-select" id="jenjang" name="jenjang" value="<?php echo $data['jenjang']; ?>" required>
                    <option value="0">--Jenjang--</option>
                    <option value="1" <?php if($data['jenjang']=="D2") echo "selected"; ?>>D2</option>
                    <option value="2" <?php if($data['jenjang']=="D3") echo "selected"; ?>>D3</option>
                    <option value="3" <?php if($data['jenjang']=="D4") echo "selected"; ?>>D4</option>
                    <option value="4" <?php if($data['jenjang']=="S2") echo "selected"; ?>>S2</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="akreditasi" class="form-label">Akreditasi</label>
                <input type="text" class="form-control" id="akreditasi" name="akreditasi" value="<?php echo $data['akreditasi']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterengan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="<?php echo $data['keterangan']; ?>"
                    required>
            </div>
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <a href="list.php" class="btn btn-secondary" style="float: right">Kembali</a>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $jenjang = $_POST['jenjang'];
        $akreditasi = $_POST['akreditasi'];
        $keterangan = $_POST['keterangan'];

        $sql = "UPDATE program_studi SET 
                nama_prodi = '$nama', 
                jenjang = '$jenjang', 
                akreditasi = '$akreditasi',
                keterangan = '$keterangan' 
                WHERE id='$_GET[id]'";
        
        $query = $koneksi->query($sql);

        if ($query) {
            echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = 'list.php';
              </script>";
        } else {
            echo "<script>
                alert('Gagal mengubah data.');
              </script>";
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>