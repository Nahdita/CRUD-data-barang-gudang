<?php
//memasukkan file config.php
include('config.php');
?>

    <div class="container" style="margin-top:20px">
        <center><font size="6">Data Barang</font></center>
        <hr>
        <a href ="tambah.php"><button class ="btn btn-dark right">Tambah Data</button></a>
        <div class="table-responsive">
        <table class="table table-striped jambo_table hulk_action">
            <thead>
                <tr>
                    <th>NO. </th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //query ke database SELECT barang urut berdasarkan jumlah yang paling besar
                $sql = mysqli_query($koneksi, "SELECT * FROM barang ORDER BY jumlah DESC") or die(mysqli_error($koneksi));
                //jiak query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if..
                if(mysqli_num_rows($sql) > 0){
                    //membuat variable $no untuk menyimpan nomor urut
                    $no = 1;
                    //melakukan perulangan while dengan dari dari query $sql
                    while($data = mysqli_fetch_assoc($sql)){
                        //menampilkan data perulangan
                        echo '
                        <tr>
                            <td>'.$no.'</td>
                            <td>'.$data['id_barang'].'</td>
                            <td>'.$data['nama_barang'].'</td>
                            <td>'.$data['jumlah'].'</td>
                            <td>
                                <a href="edit.php?id_barang='.$data['id_barang'].'"class="btn btn-secondary btn-sm">Edit</a>
                                <a href="delete.php?id_barang='.$data['id_barang'].'"class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
                            </td>
                        </tr>
                        ';
                        $no++;
                    }
                    //jika query menghasilkan nilai 0
                }else{
                    echo '
                    <tr>
                        <td colspan="6">Tidak ada data.</td>
                    </tr>
                    ';
                }
                ?>
            </tbody>
        </table>
    </div>
    </div>