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
  <title>Tambah Barang</title>
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> -->
</head>
<body>
  <?php include "navbar.php"; ?>
    <div class="card">
<form action="m_tambah_barang.php" method="post">
  <div class="card-header">
    <h2>Tambah Barang</h2>
  </div>
  <div class="card-body">
    <p class="card-text">
    <table class="border-bottom">
      <tr>
        <td><input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang"></td>
      </tr>
      <tr>
        <td><input type="text"  class="form-control" name="stok_barang" placeholder="Stok Barang"></td>
      </tr>
      <tr>
        <td><input type="text" name="harga_barang" class="form-control" placeholder="Harga Barang"></td>
      </tr>
    </table>
  </p>
  <input type="submit" value="Simpan" class="btn btn-primary">
</div>
</div>
</form>

</body>
<!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" 
crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
 crossorigin="anonymous"></script> -->
</html>
