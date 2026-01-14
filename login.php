<?php
session_start();
require 'koneksi.php'; // pastikan file ini sudah benar

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $ceklogin = $koneksi->query("SELECT * FROM pengguna WHERE email='$email' AND password='$pass'");

    if ($ceklogin && $ceklogin->num_rows == 1) {
        $data = $ceklogin->fetch_assoc();

        $_SESSION['login'] = TRUE;
        $_SESSION['email'] = $data['email'];
        $_SESSION['nama'] = $data['nama_lengkap'];

        echo "<script>
                alert('Berhasil Loginnn');
                window.location.href = 'index.php';
              </script>";
        exit;
    } else {
        echo "<div class='alert alert-danger mt-3 text-center'>Login gagal. Email atau password salah.</div>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4">

                    <h4 class="text-center mb-4">Login</h4>

                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" required>
                            <div class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mb-2">Login</button>
                        <a href="register.php" class="btn btn-outline-secondary w-100">Buat akun</a>
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>