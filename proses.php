<?php 
//include |require|include_once|require_once
require 'koneksi.php';

if(isset($_POST['submit'])){
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $tanggal = $_POST['tanggal'];
    $alamat = $_POST['alamat'];


    $sql = "INSERT INTO mahasiswa(nim,nama_mhs,tgl_lahir,alamat)
            Values ('$nim','$nama','$tanggal','$alamat')";
    $query = $koneksi->query($sql); //eksekusi query

if($query){
    echo "Berhasil menyimpan data";
}else{
    echo "Gagal menyimpan data";
}

}

?>