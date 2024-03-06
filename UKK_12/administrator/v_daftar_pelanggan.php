<?php
session_start();
//cek session 
if ($_SESSION['login'] != 'admin') {
  //kembali ke halaman login
  header('location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Pelanggan</title>
</head>

<body>
  <?php include('navbar.php') ?>
  <center>
    <h1>Daftar Pelanggan</h1>
  </center>
  <br> <br>
    
    <table class="table table-striped">
      <tr>
        <td>ID</td>
        <td>Nama</td>
        <td>Alamat</td>
        <td>Telepon</td>
      </tr>

      <?php
      //ambil koneksi
      include('../config.php');
      $sql = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan");
      foreach ($sql as $pelanggan) {
      ?>
        <tr>
          <td><?= $pelanggan['id_pelanggan'] ?></td>
          <td><?= $pelanggan['nama_pelanggan'] ?></td>
          <td><?= $pelanggan['alamat_pelanggan'] ?></td>
          <td><?= $pelanggan['telepon_pelanggan'] ?></td>
        </tr>
      <?php
      } ?>

    </table>



  
</body>

</html>