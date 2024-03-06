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
  <title>Detail Penjualan</title>
</head>

<body>
  <?php include "navbar.php" ?>

  <?php
  //ambil koneksi
  include "../config.php";
  //ambil data id_pelanggan dari URL
  $id_pelanggan = $_GET['id_pelanggan'];
  //cari datanya
  $sql = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan INNER JOIN tb_penjualan 
  ON tb_pelanggan.id_pelanggan = tb_penjualan.id_pelanggan");
  // $pelanggan = mysqli_fetch_assoc($sql);

  foreach ($sql as $pelanggan) {

    //cek data berdasarkan id_pelanggan
    if ($pelanggan['id_pelanggan'] == $id_pelanggan) {
  ?>

<div class="card" style="width: 18rem;">

  <div class="card-header">
    <center>
      <h1>Pelanggan</h1>
    </center>
  </div>
  <div class="card-body">
      <table >
        <trclass="card-title">
          <td>ID Pelanggan</td>
          <td>:</td>
          <td><?= $pelanggan['id_pelanggan'] ?></td>
        </trclass=>
        <tr>
          <td>Nama Pelanggan</td>
          <td>:</td>
          <td><?= $pelanggan['nama_pelanggan'] ?></td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td><?= $pelanggan['alamat_pelanggan'] ?></td>
        </tr>
        <tr>
          <td>Telepon</td>
          <td>:</td>
          <td><?= $pelanggan['telepon_pelanggan'] ?></td>
        </tr>
      </table>
      </div>
      </div>
</div>
      <!-- tambah barang -->
      <br>
      <form action="m_beli_barang.php" method="post">
        <input type="hidden" name="id_penjualan" id="" value="<?= $pelanggan['id_penjualan']  ?>">
        <input type="hidden" name="id_pelanggan" id="" value="<?= $pelanggan['id_pelanggan']  ?>">

        <!-- //button -->
        <input type="submit" class="btn btn-secondary" value="Tambah Barang">
      </form>
      <br>

      <!-- daftar barang yang dibeli -->
      <table class="table table-striped">
        <tr>
          <td>Nama Barang</td>
          <td>Harga</td>
          <td>Jumlah</td>
          <td>Sub Total</td>
          <td>Stok Barang</td>
          <td colspan="2">Aksi</td>
        </tr>
        <?php
        //ambil data detail barang pada tb_detail_penjualan
        $data = mysqli_query($koneksi, "SELECT * FROM tb_detail_penjualan");

        //ambil data barang pada tb_barang
        $dataBarang = mysqli_query($koneksi, "SELECT * FROM tb_barang");

        //tampilkan data detail barang
        foreach ($data as $detail) {
          if ($detail['id_penjualan'] == $pelanggan['id_penjualan']) {

            //ambil data harga barang pada tb_barang
            foreach ($dataBarang as $barang) {
              if ($barang['id_barang'] == $detail['id_barang']) {
                $harga_barang =  $barang['harga_barang'];
                $stok_barang = $barang['stok_barang'];
              }
            }
        ?>
            <tr>
              <!-- kolom pilih barang -->
              <td>
                <form action="m_update_barang_detail.php" method="post">
                  <input type="hidden" name="id_detail_penjualan" value="<?= $detail['id_detail_penjualan'] ?>">
                  <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                  <select  class="form-select" aria-label="Default select example" name="id_barang" id="" onchange="this.form.submit()">
                    <?php
                    foreach ($dataBarang as $barang) {
                    ?> <option  value="<?= $barang['id_barang'] ?>" <?php if ($barang['id_barang'] == $detail['id_barang']) echo "selected"; ?>><?= $barang['nama_barang'] ?></option>
                    <?php } ?>
                  </select>
                </form>
              </td>


              <!-- kolom jumlah barang dan sub total dan stok barang -->
              <form action="m_hitung_sub_total.php" method="post">
                <input type="hidden" name="id_detail_penjualan" value="<?= $detail['id_detail_penjualan'] ?>">
                <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                <input type="hidden" name="id_barang" value="<?= $detail['id_barang'] ?>">
                <td>
                  <input type="text" name="harga_barang" class="form-control"value="<?= $harga_barang ?>" readonly>
                </td>
                <td><input type="number" name="jumlah_barang" class="form-control"value="<?= $detail['jumlah_barang'] ?>" tabindex="1" onchange="this.form.submit()"></td>
                <td>
                  <input type="text" name="sub_total" class="form-control" value="<?= $detail['sub_total'] ?>" readonly>
                </td>
                <td>
                  <input type="text" name="stok_barang" class="form-control"value="<?= $stok_barang ?>" readonly>
                </td>
              </form>

              <!-- kolom hapus -->
              <td>
                <form action="m_hapus_detail_barang.php" method="post">
                  <input type="hidden" name="id_detail_penjualan" value="<?= $detail['id_detail_penjualan'] ?>">
                  <input type="hidden" name="id_pelanggan" value="<?= $pelanggan['id_pelanggan'] ?>">
                  <input type="submit" value="Hapus" class="btn btn-danger">
                </form>
              </td>
            </tr>
        <?php   }
        }
        ?>

        <!-- kolom hitung total -->
        <form action="m_hitung_total.php" method="post">
          <input type="hidden" name="id_penjualan" class="form-control" value="<?= $detail['id_penjualan'] ?>">
          <input type="hidden" name="id_pelanggan" class="form-control"value="<?= $pelanggan['id_pelanggan'] ?>">
          <tr>
            <?php
            //  hitung total pembelian dari tb_detail_penjualan
            $hitung = mysqli_query($koneksi, "SELECT SUM(sub_total) AS Total FROM tb_detail_penjualan 
                      WHERE id_penjualan='$pelanggan[id_penjualan]'");
            $total = mysqli_fetch_assoc($hitung);
            ?>
            <td colspan="2"></td>
            <td>Total</td>
            <td><input type="text" name="total" class="form-control" value="<?= $total['Total'] ?>" readonly></td>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td>Bayar</td>
            <td><input type="number" name="bayar" class="form-control" id="bayar" onchange="this.form.submit()" tabindex="1"></td>
            <td colspan="2"></td>
          </tr>
          <tr>
            <td colspan="2"></td>
            <td>Kembali</td>
            <td><input type="number" name="kembali" class="form-control" value="<?php if (isset($_GET['kembali'])) {
                                                                    echo    $kembali = $_GET['kembali'];
                                                                  } ?>" readonly></td>
            <td colspan="2"></td>
          </tr>
        </form>
      </table>
  <?php }
  } ?>
</body>

</html>