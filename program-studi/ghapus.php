<?php

include("../koneksi.php");
$sql = "DELETE FROM program_studi WHERE id='$_GET[id]'";
$query = $koneksi->query($sql); //eksekusi query
if ($query) {
    header("location:list.php");
} else {
    echo "Gagal menghapus data";
}
