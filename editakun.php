<?php
session_start();
include "koneksi.php";

if (!isset($_SESSION['email'])) {
    header("Location: index.php");
    exit;
}

$email = $_SESSION['email'];
$error = "";
$succes = false;


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_lengkap = trim($_POST['nama_lengkap']);
    $password = trim($_POST['password']);


    if (empty($nama_lengkap)) {
        $error = "Nama tidak boleh kosong!";
    } else {
        if (!empty($password)) {
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $sql = $koneksi->prepare("UPDATE pengguna SET nama_lengkap = ?, password = ? WHERE email = ?");
            $sql->bind_param("sss", $nama_lengkap, $hashed, $email);
        } else {
            $sql = $koneksi->prepare("UPDATE pengguna SET nama_lengkap = ? WHERE email = ?");
            $sql->bind_param("ss", $nama_lengkap, $email);
        }

        if ($sql->execute()) {
            $_SESSION['nama'] = $nama_lengkap;
            $error = "Profil berhasil diperbarui!";
            $succes = true;
            echo "<script>
                alert('Data berhasil diubah!');
                window.location.href = 'index.php';
              </script>";
        } else {
            $error = "Gagal memperbarui profil: " . $koneksi->error;
            echo "<script>
                alert('Gagal mengubah data.');
              </script>";
        }
    }
}

$query = $koneksi->prepare("SELECT * FROM pengguna WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();
$data = $result->fetch_assoc();

if (!$data) {
    die("Data pengguna tidak ditemukan!");
}
?>

<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="p-4">
    <div class="container">
        <h3>Edit Profil</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap"
                    value="<?php echo $data['nama_lengkap'] ?>" required>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" class="form-control" value="<?php echo $data['email'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label>Password Baru</label>
                    <input type="password" name="password" class="form-control"
                        placeholder="Kosongkan jika tidak ingin mengganti">
                </div>
                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>

</html>