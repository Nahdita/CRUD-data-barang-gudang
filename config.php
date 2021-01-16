<?php
//koneksi ke database mysql
$koneksi = mysqli_connect("localhost","root","","gudang");

//cek jika koneksi ke mysqli gagal, maka akan tampil pesan berikut
if (mysqli_connect_error()){
    echo "Gagal melakukan koneksi" .mysqli_connect_error();
}
?>