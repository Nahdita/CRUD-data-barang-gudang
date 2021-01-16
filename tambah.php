<?php include('config.php'); ?>

    <center><font size="6">Tambah Data</font></center>
    <hr>
    <?php
    if(isset($_POST['submit'])){
        $id_barang    = $_POST['id_barang'];
        $nama_barang  = $_POST['nama_barang'];
        $jumlah  = $_POST['jumlah'];

        $cek = mysqli_query($koneksi, "SELECT * FROM barang Where id_barang='$id_barang'") or die(mysqli_error($koneksi));
        
        if(mysqli_num_rows($cek) == 0){
            $sql = mysqli_query($koneksi, "INSERT INTO barang(id_barang, nama_barang, jumlah) Values('$id_barang', '$nama_barang', '$jumlah')") or die(mysqli_error($koneksi));

            if($sql){
                echo '<script>alert("Berhasil menambahkan data."); document.location="tampil.php";</script>';
            }else{
                echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
            }
            }else{
                echo '<div class="alert alert-warning">Gagal, NIM sudah terdaftar.</div>';
            }
        }
    ?>

    <form action="tambah.php" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">ID Barang</label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" name="id_barang" class="form-control" size="4" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Barang</label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" name="nama_barang" class="form-control" size="4" required>
            </div>
        </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah</label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" name="jumlah" class="form-control" size="4" required>
            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
            </div>
        </form>
    </div>
        