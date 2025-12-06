<?php

include("koneksi.php");
$sql = "DELETE FROM mahasiswa WHERE nim='$_GET[nim]'";
$query = $koneksi->query($sql); //eksekusi query
if ($query) {
    header("location:index.php");
} else {
    echo "Gagal menghapus data";
}
