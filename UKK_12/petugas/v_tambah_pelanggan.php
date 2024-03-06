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
  <title>Tambah Pelanggan Baru</title>
</head>

<body>
  <?php include "navbar.php" ?>

  <div class="card">
    <div class="card-header">
      <h2>Tambah Pelanggan Baru</h2>
  <form action="m_tambah_pelanggan.php" method="post">
  <input type="hidden" name="id_login" value="<?= $_SESSION['id_login'] ?>">
  
    </div>
    <div class="card-body">
      <p class="card-text">
    <table>
      <tr>
        <td><input type="text" name="id_pelanggan" class="form-control" value="<?= date('mis'); ?>"></td>
      </tr>
      <tr>
        <td><input type="text"  name="nama_pelanggan" class="form-control" placeholder="Nama Pelanngan" ></td>
      </tr>
      <tr>
        <td><input type="text" name="alamat_pelanggan" class="form-control" placeholder="Alamat Pelanngan"></td>
      </tr>
      <tr>
        <td><input type="text"  name="telepon_pelanggan"class="form-control" placeholder="Telp Pelanngan"></td>
      </tr>
      <tr>
        <td><input type="submit" value="Simpan" class="btn btn-primary btn-lg"></td>
      </tr>
    </table>
    </form>

</div>
</div>

</body>
</html>