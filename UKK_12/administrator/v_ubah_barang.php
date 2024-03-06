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
  <title>Ubah Barang</title>
</head>

<body>
  <?php include "navbar.php" ?>
  <?php
  //ambil koneksi 
  include "../config.php";

  //ambil id_barang dari url 
  $id_barang = $_GET['id_barang'];

  //cari id_login di tb_login
  $sql = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id_barang'");
  //ambil datanya 
  $barang = mysqli_fetch_assoc($sql);
  ?>


  <div class="card">
    <div class="card-header">
      <h2>Ubah Barang</h2>
    </div>
    <div class="card-body">
      <p class="card-text">

  <form action="m_ubah_barang.php" method="post">
    <input type="hidden" name="id_barang" id="" value="<?= $barang['id_barang'] ?>">
    <table>
      <tr>
        <td><input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" value="<?= $barang['nama_barang'] ?>"></td>
      </tr>
      <tr>
        <td><input type="text" name="stok_barang" class="form-control" placeholder="Stok Barang" value="<?= $barang['stok_barang'] ?>"></td>
      </tr>
      <tr>
        <td><input type="text" name="harga_barang" class="form-control" placeholder="Harga Barang" value="<?= $barang['harga_barang'] ?>"></td>
      </tr>
      <tr>
        <td><input type="submit" value="Simpan" class="btn btn-primary"></td>
      </tr>
    </table>
  </form>

</div>
</div>

</body>

</html>