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
  <title>Administator</title>
</head>

<body>
  <?php include "navbar.php"; ?>
  
  <center>
  <h1>Administrator</h1>
<br>
<br>
    <?php
    //ambil koneksi
    include "../config.php";

    //hitung jumlah barang dari tb_barang
    $barang = mysqli_query($koneksi, "SELECT COUNT(*) as Jumlah FROM tb_barang");
    $jumlahBarang = mysqli_fetch_assoc($barang);

    //hitung jumlah pembelian dari tb_penjualan
    $penjualan = mysqli_query($koneksi, "SELECT COUNT(*) as Jumlah FROM tb_penjualan");
    $jumlahPenjualan = mysqli_fetch_assoc($penjualan);

    //hitung jumlah pengguna dari tb_pelanggan
    $pelanggan = mysqli_query($koneksi, "SELECT COUNT(*) as Jumlah FROM tb_pelanggan");
    $jumlahPelanggan = mysqli_fetch_assoc($pelanggan);
    ?>

<div class="row">
      <div class="col">
        <div class="card" style="width: 10rem;">
          <img src="../img/barang.png" class="card-img-top" alt="..." height="150px">
          <div class="card-body">
            <p class="card-text">
              <button type="button"  class="btn btn-primary btn-lg position-relative" >
                BarangNya
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?= $jumlahBarang['Jumlah']; ?>
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            </p>
          </div>
        </div>
      </div>



      <div class="col">
        <div class="card" style="width: 10rem;">
          <img src="../img/penjualan.png" class="card-img-top" alt="..." height="150px">
          <div class="card-body">
            <p class="card-text">
            <button type="button"  class="btn btn-primary btn-lg position-relative" >
                Penjualan
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?= $jumlahPenjualan['Jumlah']; ?>
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            </p>
          </div>
        </div>

      </div>
      <div class="col">
        <div class="card" style="width: 10rem;">
        <img src="../img/pelanggan.png" class="card-img-top" alt="..." height="150px">
          <div class="card-body">
            <p class="card-text">
            <button type="button"  class="btn btn-primary btn-lg position-relative" >
                Pelanggan
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                  <?= $jumlahPelanggan['Jumlah']; ?>
                  <span class="visually-hidden">unread messages</span>
                </span>
              </button>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        ID : <?= $_SESSION['id_login']; ?>
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p>Pengguna</p>
          <footer class="blockquote-footer"><?= $_SESSION['nama']; ?></footer>
        </blockquote>
      </div>
    </div>
</center>
</body>

</html>