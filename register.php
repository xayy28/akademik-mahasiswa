<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4">

                    <h4 class="text-center mb-4">Buat Akun</h4>

                    <form method="POST">
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>

                        <button class="btn btn-primary w-100">Buat Akun</button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="login.php">Sudah punya akun? Login</a>
                    </div>

                    <?php
                    if (isset($_POST['email'])) {
                        require 'koneksi.php';

                        $email = $_POST['email'];
                        $nama  = $_POST['nama_lengkap'];
                        $pass  = md5($_POST['password']);

                        $cek = $koneksi->query("SELECT * FROM pengguna WHERE email='$email'");
                        if ($cek->num_rows > 0) {
                            echo "<div class='alert alert-danger mt-3'>Email sudah terdaftar</div>";
                        } else {
                            $koneksi->query("
              INSERT INTO pengguna (email, password, nama_lengkap)
              VALUES ('$email', '$pass', '$nama')
            ");

                            header("Location: login.php");
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>

</body>

</html>