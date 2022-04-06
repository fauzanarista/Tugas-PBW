
<?php 

include 'koneksi.php';

// menambahkan data mahasiswa
if(isset($_POST['submit'])){
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO mahasiswa (npm, nama, jurusan, alamat) VALUES ('$npm', '$nama', '$jurusan', '$alamat')";
    $result = mysqli_query($koneksi, $sql);
}


?>