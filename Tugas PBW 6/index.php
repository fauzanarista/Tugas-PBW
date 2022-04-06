<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Praktikum 7</title>
  </head>
<body>

        <!-- Gilang Maulana -->
        <!-- 2010631170075 -->
        <!-- 4C -->

        <?php 
        
        // masukkan file koneksi php
        include "koneksi.php";

        // tampilkan seluruh data di database
        $sql = "SELECT * FROM mahasiswa";
        $result = mysqli_query($koneksi, $sql);
        $no = 1;

        if($result){
        ?>

        <div class="container">
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-6">
                    <a href="form.php" class="btn btn-primary">Tambah Data</a>
                    <h3 class="text-center mb-3">Data Mahasiswa</h3>
                     <!-- table -->
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">NPM</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Jurusan</th>
                                <th scope="col">Alamat</th>
                            </tr>

                            <?php 
                                while($row = mysqli_fetch_array($result)){
                            ?>

                        </thead>
                        <tbody>
                            <tr>
                                <?php 
                                    $npm = $row['npm'];
                                    $nama = $row['nama'];
                                    $jurusan = $row['jurusan'];
                                    $alamat = $row['alamat'];
                                ?>
                            <th scope="row"><?= $no++; ?></th>
                                <td><?= $npm; ?></td>
                                <td><?= $nama; ?></td>
                                <td><?= $jurusan; ?></td>
                                <td><?= $alamat; ?></td>
                            </tr>
                        </tbody>

                            <?php } ?>

                    </table>
                </div>
            </div>
        </div>

         <?php 
            mysqli_free_result($result);
            }
            mysqli_close($koneksi);
        ?>

</body>
</html>