<?php  
session_start();
include '../koneksi.php';
include 'fungsi/rupiah.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,400i,700&display=swap" rel="stylesheet">
    <!-- Datatables -->
    <link rel="stylesheet" type="text/css" href="assets/css/datatables.min.css"/>
    <!-- Font Awesome -->
    <link rel="stylesheet" type="text/css" href="assets/fontawesome-pro/css/all.min.css">
    <link rel="stylesheet" href="assets/css/sidebar.css"> 
    <!-- <script src="https://kit.fontawesome.com/7ff23e7e04.js" crossorigin="anonymus"></script> -->
    <title>Kasir Uyy</title>

  </head>

  <body>
    <?php
    $level = $_SESSION['level'];

      if ($level=="Admin") {
        $color = "#dc3545";
        $color2 = "#BC3C49";
      } elseif ($level=="Waiter") {
        $color = "#2c7873";
        $color2 = "#388681";
      } elseif ($level=="Kasir") {
        $color = "#527318";
        $color2 = "#5D7F22";
      } elseif ($level=="Owner") {
        $color = "#192965";
        $color2 = "#23347A";
          } else {
        $color = "#513F40";
        $color2 = "#544A4A";
      }
    ?>
    
    <nav class="sidebar" style="background-color: <?= $color2 ?>;">
    <div class="container">
      
      <ul class="navbar-nav mr-auto">
          <?php
          if (isset($_GET['home'])) {
            $home = "active";
          } elseif (isset($_GET['dashboard'])) {
            $dash = "active";
          } elseif (isset($_GET['laporan'])) {
            $lap = "active";
          } elseif (isset($_GET['order'])) {
            $or = "active";
          } elseif (isset($_GET['user'])) {
            $us = "active";
          } elseif (isset($_GET['makanan'])) {
            $m = "active";
          } elseif (isset($_GET['minuman'])) {
            $m = "active";
          } elseif (isset($_GET['transaksi'])) {
            $tran = "active";
          } else {
            $home = "active";
          }
          ?>
          
          <ul class="navbar-nav mr-auto">
          <?php if ($_SESSION['level'] == "") : ?>
            

          <?php else : ?>
          <?php endif; ?>
          <?php if ($_SESSION['level'] != "Owner") : ?>
            <li class="nav-item dropdown">
              <div class="dropdown-menu dropdown-menu-right">
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <table class="table table-striped table-hovered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Makanan</th>
                            <th>Foto</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Ayam</td>
                            <td><img src="assets/image/makanan/27022020052639bakar.jpg" alt="makanan" height="50"></td>
                            <td><input class="form-control" id="txt1" onkeyup="sum();"></td>
                            <td><input class="form-control-plaintext" id="txt2" onkeyup="sum();" value="1000" readonly></td>
                            <td><input class="form-control-plaintext" id="txt3" readonly></td>
                          </tr>
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href=""><button class="btn btn-warning">Keranjang</button></a>
              </div>
            </li>
          <?php endif ?>
        </ul>
          <?php if ($level == "Admin") : ?>
            <ul class="list-unstyled components">
              <!-- Other sidebar items -->
              <li class="<?= $dash ?>">
                <a class="nav-link" href="index.php?dashboard">
                  <i class="fas fa-tachometer-alt"></i> Dashboard
                  <span class="sr-only">(current)</span>
                </a>

              <li>
                <a class="nav-link" href="index.php?user">
                  <i class="fas fa-list"></i> Data User
                  <span class="sr-only">(current)</span>
                </a>

                <a class="nav-link" href="index.php?makanan">
                  <i class="fas fa-list"></i> Data Masakan 
                  <span class="sr-only">(current)</span>
                </a>
              </li>
            </ul>
            <!-- Inside the sidebar navigation -->
            <ul class="list-unstyled components">
              <!-- Other sidebar items -->
              <li class="<?= $or ?>">
            </ul>
            </li>
          </li>
        </ul>
        <div class="nav-item dropdown <?= $us ?><?= $m ?>">
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          </div>
        </div>

          <?php elseif ($level == "Waiter") : ?>
            <!-- Inside the sidebar navigation -->
            <ul class="list-unstyled components">
              <li class="<?= $home ?>">
                <a class="nav-link" href="index.php">
                  <i class="fas fa-home"></i> Home
                  <span class="sr-only">(current)</span>
                </a>
              </li>
                  <!-- Add more nested items if needed -->
                </ul>
              </li>
              <li class="<?= $or ?>">
                <a class="nav-link" href="index.php?order">
                  <i class="fas fa-cart-plus"></i> Entri Order
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="<?= $lap ?>">
                <a class="nav-link" href="index.php?laporan">
                  <i class="fas fa-file-alt"></i> Laporan
                  <span class="sr-only">(current)</span>
                </a>
              </li>
            </ul>

          <?php elseif ($level == "Kasir") : ?>
            <!-- Inside the sidebar navigation -->
            <ul class="list-unstyled components">
              <a class="nav-link" href="index.php">
                <i class="fas fa-home"></i> Home
                <span class="sr-only">(current)</span>
              </a>
                <!-- Add more nested items if needed -->
              </ul>
              <a class="nav-link" href="index.php?transaksi">
                <i class="fas fa-money-check-alt"></i> Entri Transaksi
                <span class="sr-only">(current)</span>
              </a>
              <a class="nav-link" href="index.php?laporan">
                <i class="fas fa-file-alt"></i> Laporan
                <span class="sr-only">(current)</span>
              </a>
            </ul>

          <?php elseif ($level == "Owner") : ?>
            <ul class="list-unstyled components">
              <!-- Other sidebar items -->
              <li class="<?= $dash ?>">
                <a class="nav-link" href="index.php?dashboard">
                  <i class="fas fa-tachometer-alt"></i> Dashboard
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="<?= $lap ?>">
                <a class="nav-link" href="index.php?laporan">
                  <i class="fas fa-file-alt"></i> Laporan
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <!-- Other sidebar items -->
            </ul>

          <?php elseif ($level == "Pelanggan" || $level == "") : ?>
            <!-- Inside the sidebar navigation -->
            <ul class="list-unstyled components">
              <!-- Other sidebar items -->
              
              
              
              <!-- Other sidebar items -->
            </ul>


          <?php endif; ?>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        </ul>
      </div>
    </div>
  </nav>

<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: <?= $color ?>;">
      <div class="container">
        <a class="navbar-brand" href="#" style="position: absolute; top: 5px; left: 1cm;">
          <img src="assets/image/kasir.png" alt="" width="30" height="30" class="mb-1">
          Kasir Uyy
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <?php  
              if (isset($_GET['home'])) {
                $home = "active";
              } elseif (isset($_GET['dashboard'])) {
                $dash = "active";
              } elseif (isset($_GET['laporan'])) {
                $lap = "active";
              } elseif (isset($_GET['order'])) {
                $or = "active";
              } elseif (isset($_GET['user'])) {
                $us = "active";
              } elseif (isset($_GET['makanan'])) {
                $m = "active";
              } elseif (isset($_GET['minuman'])) {
                $m = "active";
              } elseif (isset($_GET['transaksi'])) {
                $tran = "active";
              } else {
                $home = "active";
              }
            ?>

            <?php if ($level=="Admin"): ?>
              <a class="nav-link nav-item <?= $dash ?>" href="index.php?dashboard">Dashboard <span class="sr-only">(current)</span></a>
              <a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-xl">
                <i class="fa fa-shopping-cart mr-1"></i>Keranjang<span class="mr-1"></span>
              </a>  

            <?php elseif ($level=="Waiter"): ?>
              <a class="nav-link nav-item <?= $home ?>" href="index.php">Home <span class="sr-only">(current)</span></a>
              <div class="nav-item dropdown <?= $us ?><?= $m ?>">
              </div>

            <?php elseif ($level=="Kasir"): ?>
              <a class="nav-link nav-item <?= $home ?>" href="index.php">Home <span class="sr-only">(current)</span></a>
              <a class="nav-link" data-toggle="modal" data-target=".bd-example-modal-xl">
                <i class="fa fa-shopping-cart mr-1"></i>Keranjang<span class="mr-1"></span>
              </a>

            <?php elseif ($level=="Owner"): ?>
              <a class="nav-link nav-item <?= $dash ?>" href="index.php?dashboard">Dashboard <span class="sr-only">(current)</span></a>
              <a class="nav-link nav-item <?= $lap ?>" href="index.php?laporan">Laporan <span class="sr-only">(current)</span></a>

            <?php elseif ($level=="Pelanggan" || $level==""): ?>
              <a class="nav-link nav-item <?= $home ?>" href="index.php">Home <span class="sr-only">(current)</span></a>

            <?php endif; ?>

          </ul>
          <ul class="navbar-nav ml-auto">
            <?php if ($_SESSION['level']==""): ?>
              <a href="../auth/index.php" class="nav-item btn btn-success">Login</a>
            <?php else: ?>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"><i class="fa fa-user mr-1"></i><?= $_SESSION['level'] ?><span class="mr-1"></span></a>
                <div class="dropdown-menu">
                  <span class="dropdown-item"><?= $_SESSION['nama_user'] ?></span>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="../auth/logout.php"><button class="btn btn-danger">Logout</button></a>
                </div>
              </li>
            <?php endif; ?>
            <?php if ($_SESSION['level']!="Owner"): ?>
            <li class="nav-item dropdown">
              <div class="dropdown-menu dropdown-menu-right">
                <div class="container">
                  <div class="row">
                    <div class="col">
                      <table class="table table-striped table-hovered">
                        <thead>
                          <tr>
                            <th>No</th>
                            <th>Nama Makanan</th>
                            <th>Foto</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>total</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>1</td>
                            <td>Ayam</td>
                            <td><img src="assets/image/makanan/27022020052639bakar.jpg" alt="makanan" height="50"></td>
                            <td><input class="form-control" id="txt1" onkeyup="sum();"></td>
                            <td><input class="form-control-plaintext" id="txt2" onkeyup="sum();" value="1000" readonly></td>
                            <td><input class="form-control-plaintext" id="txt3" readonly></td>
                          </tr>
                        </tbody>
                      </table>
                      
                    </div>
                  </div>
                </div>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href=""><button class="btn btn-warning">Keranjang</button></a>
              </div>
            </li>
            <?php endif ?>
          </ul>
        </div>
      </div>
    </nav>




<div id="modalKeranjang" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Keranjang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
        $query_order = mysqli_query($kon, "SELECT count(id_order) as no_order FROM tb_order");
        $order = mysqli_fetch_assoc($query_order);
        $no_order = $order['no_order'] + 1;
        $no_meja = mysqli_query($kon, "SELECT * FROM tb_meja WHERE status != 1");
        $list_pesanan = mysqli_query($kon, "SELECT * FROM tb_detail_order WHERE id_order = 'ORD000$no_order' AND id_user = '$_SESSION[id_user]'");
        $nono = 'ORD000' . $no_order;
        // $query_hartot = mysqli_query($kon, "SELECT sum(hartot_dorder) as hartot FROM tb_detail_order WHERE id_order = '$nono'");
        // $hartot = mysqli_fetch_assoc($query_hartot);
      ?>
      <form action="fungsi/tambahOrder.php" method="POST">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label>Order no</label>
                <input type="text" readonly name="id_order" class="form-control" value="ORD000<?= $no_order; ?>">
              </div>
              <div class="form-group">
                <label for="">No Meja</label>
                <select name="meja" class="form-control" required>
                  <option selected value="0">-- Pilih no meja --</option>
                  <?php foreach ($no_meja as $meja) : ?>
                      <option value="<?= $meja['meja_id'] ?>"><?= $meja['meja_id'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
              </div>
            </div>
            <div class="col-md-8">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Harga</th>
                    <th>Jumlah</th>
                    <th>Total</th>
                    <th>Option</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                    foreach ($list_pesanan as $pesanan) :
                    $masakan = mysqli_query($kon, "SELECT * FROM tb_masakan WHERE id_masakan = '$pesanan[id_masakan]' ");
                    $query_masakan = mysqli_fetch_assoc($masakan); 
                    $subtotal = $query_masakan['harga_masakan'] * $pesanan['jumlah_dorder'];
                    $total = $total + $subtotal;
                  ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $query_masakan['nama_masakan'] ?></td>
                      <td><?= $pesanan['keterangan_dorder'] ?></td>
                      <td>Rp. <?= rupiah($query_masakan['harga_masakan']) ?></td>
                      <td align="center" width="10%">
                        <input type="number" class="form-control" name="qty" id="qty" value="<?= $pesanan['jumlah_dorder'] ?>">
                      </td>
                      <td>Rp. <?= rupiah($subtotal) ?></td>
                      <td>
                        <button type="button" class="btn btn-sm btn-primary ubahOrder" data-id="<?= $pesanan['id_dorder'] ?>"><i class="fa fa-edit"></i></button>
                        <a href="fungsi/hapusOrder.php?id=<?= $pesanan['id_dorder'] ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td align="right" colspan="5"><strong>Total Harga : </strong></td> 
                    <th colspan="2">Rp. <?= rupiah($total) ?></th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary btn-sm">Proses</button>
        </div>
      </form>
    </div>
  </div>
</div>
    