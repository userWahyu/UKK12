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
  <title>Registrasi</title>
</head>

<body>
  <?php include "navbar.php"; ?>
  <center><h1>Daftar Pengguna</h1></center>
  
  <p><a href="v_tambah_pengguna_baru.php" class="btn btn-primary anabled">Tambah Akun Pengguna</a></p>
  <table class="table table-striped">
    <tr>
      <td>Id Login</td>
      <td>Nama</td>
      <td>Username</td>
      <td>Password</td>
      <td>Status</td>
      <td>Aksi</td>
    </tr>
    <?php
    //ambil koneksi
    include "../config.php";
    //ambil data di tb_login
    $sql = mysqli_query($koneksi, 'SELECT * FROM tb_login ORDER BY id_login DESC');
    foreach ($sql as $pengguna) {
    ?>
      <tr>
        <td><?= $pengguna['id_login'] ?> </td>
        <td><?= $pengguna['nama'] ?></td>
        <td><?= $pengguna['username'] ?></td>
        <td><?= $pengguna['password'] ?></td>
        <td><?= $pengguna['status'] ?></td>
        <td><a href="v_ubah_pengguna.php?id_login=<?= $pengguna['id_login'] ?>" class="btn btn-info">Ubah</a></td>
      </tr>
    <?php } ?>
  </table>
</body>

</html>