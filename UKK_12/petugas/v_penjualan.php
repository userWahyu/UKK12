<?php
session_start();
//cek session 
if ($_SESSION['login'] != 'petugas') {
  //kembali ke halaman login
  header('location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Penjualan</title>
</head>

<body>
  <?php include "navbar.php" ?>
  <center>
      <h1>Daftar Pelanggan</h1>
  </center>
  <br> <br>
  <p><a href="v_tambah_pelanggan.php" class="btn btn-primary anabled">Tambah Pelanggan</a></p>
  <table class="table table-striped">
    <tr>
      <td>ID Pelanggan</td>
      <td>Nama</td>
      <td>Alamat</td>
      <td>Telepon</td>
      <td colspan="2">Aksi</td>
    </tr>
    <?php
    //ambil koneksi
    include "../config.php";
    //ambil data di tb_pelanggan
    $sql = mysqli_query($koneksi, 'SELECT * FROM tb_pelanggan ORDER BY id_pelanggan DESC');
    foreach ($sql as $pelanggan) {
    ?>
      <tr>
        <td><?= $pelanggan['id_pelanggan'] ?> </td>
        <td><?= $pelanggan['nama_pelanggan'] ?></td>
        <td><?= $pelanggan['alamat_pelanggan'] ?></td>
        <td><?= $pelanggan['telepon_pelanggan'] ?></td>
        <td><a href="m_hapus_pelanggan.php?id_pelanggan=<?= $pelanggan['id_pelanggan'] ?>"class="btn btn-danger">Hapus</a></td>
        <td><a href="v_detail_penjualan.php?id_pelanggan=<?= $pelanggan['id_pelanggan'] ?>"class="btn btn-success">Beli</a></td>
      </tr>
    <?php } ?>
  </table>

</body>

</html>