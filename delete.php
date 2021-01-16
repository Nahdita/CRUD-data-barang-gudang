<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id_barang dari URL
if(isset($_GET['id_barang'])){
    //membuat variable $id_baranngg yang menyimpan nilai dari $_GET['id_barang]
    $id_barang = $_GET['id_barang'];

    //melakukan query ke database, dengan cara SELECT data yang memiliki id yang saa dengan variable
    $cek = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang= '$id_barang'") or die(mysqli_error($koneksi));

    //jika query menghasilkan nilai > 0 maka eksekusi script di bawah
    if(mysqli_num_rows($cek) > 0){
        //query ke database DELETE untuk menghapus data dengan kondisi id=$id
        $del = mysqli_query($koneksi, "DELETE FROM barang Where id_barang= $id_barang") or die(mysqli_error($koneksi));
        if($del){
            echo '<script>alert("Berhasil menghapus data. "); document.location="tampil.php";</script>';
        }
        }else{
            echo '<script>alert("Gagal menghapus data. "); document.location="tampil.php";</script>';
        }
    }else{
        echo '<script>alert("ID tidak ditemukan di database. "); document.location="tampil.php";</script>';
    }

?>
