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
  <title>Ubah Pengguna</title>
</head>

<body>
  <?php include "navbar.php" ?>
  <?php
  //ambil koneksi 
  include "../config.php";

  //ambil id_login dari url 
  $id_login = $_GET['id_login'];

  //cari id_login di tb_login
  $sql = mysqli_query($koneksi, "SELECT * FROM tb_login WHERE id_login='$id_login'");
  //ambil datanya 
  $pengguna = mysqli_fetch_assoc($sql);
  ?>

  <div class="card">
    <div class="card-header">
      <h2>Ubah Pengguna</h2>
    </div>
    <div class="card-body">
      <p class="card-text">
      <form action="m_ubah_pengguna.php" method="post">
    <input type="hidden" name="id_login"placeholder="id login" value="<?= $pengguna['id_login'] ?>">
    <table>
      <tr>
        <td><input type="text" name="nama" class="form-control" placeholder="Nama Pengguna" value="<?= $pengguna['nama'] ?>"></td>
      </tr>
      <tr>
        <td><input type="text" name="username" class="form-control" placeholder="Username" value="<?= $pengguna['username'] ?>"></td>
      </tr>
      <tr>
        <td><input type="text" name="password" class="form-control" placeholder="Password" value="<?= $pengguna['password'] ?>"></td>
      </tr>
      <tr>
        <td> <select name="status" class="form-select" placeholder="Status">
            <?php
            if ($pengguna['status'] == "Administrator") {
              echo "<option value='Administrator' selected >Administrator</option>";
            } else {
              echo "<option value='Administrator' >Administrator</option>";
            }

            if ($pengguna['status'] == "Petugas") {
              echo "<option value='Petugas' selected >Petugas</option>";
            } else {
              echo "<option value='Petugas' >Petugas</option>";
            }
            ?>
          </select></td>
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