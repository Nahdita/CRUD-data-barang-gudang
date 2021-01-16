<?php include('config.php'); ?>

<div class="container" style="margin-top:20px">
    <h2>Edit Barang</h2>

    <hr>

    <?php
    //jika sudah mendapatkan parameter GET id_barang dari url
    if(isset($_GET['id_barang'])){
        //membuat variable $id_barang untuk menyimpan id_barang dari GET id_barang di url
        $id_barang = $_GET['id_barang'];

        //query ke database SELECT tabel barang berdasarkan id_barang= $id_barang
        $select = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang=$id_barang") or die(mysqli_error($koneksi));

        //jika hasil query = 0 maka muncul pesan error
        if(mysqli_num_rows($select) == 0) {
            echo '<div class="alert aler-warning">ID tidak ada dalam databases.</div>';
            exit();
        //jika hasil query > 0
        }else{
            //membuat variable $data dan menyimpan data row dari query
            $data = mysqli_fetch_assoc($select);
        }
    }
    ?>

    <?php
    //jika tombol sipan di tekan/klik
    if(isset($_POST['submit'])){
        $nama_barang     = $_POST['nama_barang'];
        $jumlah       = $_POST['jumlah'];

        $sql = mysqli_query($koneksi, "UPDATE barang SET nama_barang='$nama_barang', jumlah='$jumlah' WHERE id_barang= $id_barang") or die(mysqli_error($koneksi));

        if($sql){
            echo '<script>alert("Berhasil menyimpan data."); document.location="tampil.php";</script>';
        }else{
            echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
        }
    }
    ?>
    
    <form action="edit.php?id_barang=<?php echo $id_barang; ?>" method="post">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">ID Barang</label>
            <div class="col--md-6 col-sm-6">
                <input type="text" name="id_barang" class="form-control" size="4" value="<?php echo $data['id_barang'] ?>" readonly required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Nama Barang</label>
            <div class="col--md-6 col-sm-6">
                <input type="text" name="nama_barang" class="form-control" value="<?php echo $data['nama_barang']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah</label>
            <div class="col--md-6 col-sm-6">
                <input type="text" name="jumlah" class="form-control" value="<?php echo $data['jumlah']; ?>" required>
            </div>
        </div>
        <div class="item form-group">
            <div class="col-md-6 col-sm-6 offset-md-3">
                <input type="submit" name="submit" class="btn btn-primary" value="Simpan">
                <a href="tampil.php" class="btn btn-warning">Kembali</a>
            </div>
        </div>
    </form>
</div>