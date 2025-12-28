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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-6">
                <h1>Login Form</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>