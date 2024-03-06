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
  <title>Tambah Pengguna Baru</title>
</head>

<body>
  <?php include "navbar.php" ?>


<div class="card">
    <div class="card-header">
      <h2>Tambah Pengguna</h2>
    </div>
    <div class="card-body">
      <p class="card-text">
        
    <form action="m_tambah_pengguna_baru.php" method="post">
    <table>
      <tr>
        <td><input type="text" name="nama" class="form-control" placeholder="Nama Pengguna"></td>
      </tr>
      <tr>
        <td><input type="text" name="username" class="form-control" placeholder="Username "></td>
      </tr>
      <tr>
        <td><input type="text" name="password" class="form-control" placeholder="Password "></td>
      </tr>
      <tr>
        <td><select name="status" class="form-select" placeholder="Status">
            <option value="Administrator">Administrator</option>
            <option value="Petugas">Petugas</option>
          </select></td>
      </tr>
      <tr>
        <td><input type="submit" value="Simpan"  class="btn btn-primary btn-lg"></td>
      </tr>
    </table>
  </form>
  
</body>
</html>