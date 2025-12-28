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
        <h1>Input Data Program Studi</h1>
        <form action="proses.php" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nama Program Studi</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" id="nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Jenjang</label>
                <select class="form-select" id="jenjang" name="jenjang" required>
                    <option value="0">--Jenjang--</option>
                    <option value="1">D2</option>
                    <option value="2">D3</option>
                    <option value="3">D4</option>
                    <option value="4">S2</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">akreditasi</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" id="akreditasi" name="akreditasi">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" id="keterangan" name="keterangan">
            </div>
            <div class="mb-3">
                <input type="submit" name="submit" class="btn btn-primary">
                <a href="../index.php?p=data_prodi" class="btn btn-secondary">Liat list</a>
            </div>
        </form>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
</body>

</html>