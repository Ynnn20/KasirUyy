<?php  
$date = date('d-m-Y');

$total_bayar = mysqli_query($kon, "SELECT SUM(totbar_transaksi) AS totbar FROM tb_transaksi WHERE aTanggal_transaksi = '$date' ");
$total = mysqli_fetch_assoc($total_bayar);
$sudahbayar = mysqli_query($kon, "SELECT COUNT(*) AS sudah_bayar FROM tb_order WHERE status_order = '1' AND aTanggal_order = '$date' ");
$sudah = mysqli_fetch_assoc($sudahbayar);
$belumbayar = mysqli_query($kon, "SELECT COUNT(*) AS belum_bayar FROM tb_order WHERE status_order = '0' AND aTanggal_order = '$date' ");
$belum = mysqli_fetch_assoc($belumbayar);
$jumlahmakanan = mysqli_query($kon, "SELECT COUNT(*) AS makanan FROM tb_masakan ");
$makanan = mysqli_fetch_assoc($jumlahmakanan);
$jumlahpembayaran = mysqli_query($kon, "SELECT COUNT(*) AS pembayaran FROM tb_user WHERE id_level='5' ");
$pembayaran = mysqli_fetch_assoc($jumlahpembayaran);
$jumlahwaiter = mysqli_query($kon, "SELECT COUNT(*) AS waiter FROM tb_user WHERE id_level='2' ");
$waiter = mysqli_fetch_assoc($jumlahwaiter);
$jumlahkasir = mysqli_query($kon, "SELECT COUNT(*) AS kasir FROM tb_user WHERE id_level='3' ");
$kasir = mysqli_fetch_assoc($jumlahkasir);
$jumlahadmin = mysqli_query($kon, "SELECT COUNT(*) AS admin FROM tb_user WHERE id_level='1' ");
$admin = mysqli_fetch_assoc($jumlahadmin);
$jumlahowner = mysqli_query($kon, "SELECT COUNT(*) AS owner FROM tb_user WHERE id_level='4' ");
$owner = mysqli_fetch_assoc($jumlahowner);

?>
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

<div class="container mt-3">
	<div class="card bg-danger text-white border-danger mb-3">
		<div class="row no-gutters">
			<div class="col-md-2">
				<img src="assets/image/adminLogo.png" class="p-3" alt="foto" width="100%">
			</div>
			<div class="col-md-10" style="background-color: <?= $color2 ?>;">
				<div class="card-body">
					<h4 class="card-title">Selamat Datang di Kasir Uyy<?= $_SESSION['level'] ?></h4>
					<p class="card-text" style="font-size: 20px;"><?= $_SESSION['nama_user'] ?></p>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
    <div class="col-md-6">
        <div class="card border-primary mb-3">
            <div class="row">
                <div class="col-md-2">
                    <i class="fa fa-money-check-alt p-3 mt-2 fa-4x"></i>
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <h5 class="card-title">Total Penjualan hari ini: <?= $date ?></h5>
                        <span class="btn btn-success btn-sm">Sudah bayar: <?= $sudah['sudah_bayar'] ?></span>
                        <span class="btn btn-danger btn-sm">Belum bayar: <?= $belum['belum_bayar'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-primary mb-3">
            <div class="row">
                <div class="col-md-2">
                    <i class="fa fa-money-bill p-3 mt-2 fa-4x"></i>
                </div>
                <div class="col-md-10">
                    <div class="card-body">
                        <h5 class="card-title">Total Pendapatan hari ini: <?= $month; ?></h5>
                        <span class="btn btn-success btn-sm">Rp. <?= rupiah($total['totbar']) ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card border-primary mb-3">
            <div class="row">
                <div class="col-md-2">
                    <i class="fa fa-burger-soda p-3 mt-2 fa-4x"></i>
                </div>
                <div class="col-md-10">
                    <div class="ml-3 card-body">
                        <h6 class="card-title">Total Menu yang ada: </h6>
                        <span class="btn btn-danger btn-sm"><?= $makanan['makanan'] ?> menu </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card border-primary mb-3">
            <div class="row">
                <div class="col-md-2">
                    <i class="fa fa-book-user p-3 mt-2 fa-4x"></i>
                </div>
                <div class="col-md-10">
                    <div class="ml-3 card-body">
                        <h6 class="card-title">Total Pegawai:</h6>
                        <span class="btn btn-secondary btn-sm">Waiter: <?= $waiter['waiter'] ?></span>
                        <span class="btn btn-secondary btn-sm">Kasir: <?= $kasir['kasir'] ?></span>
                        <span class="btn btn-secondary btn-sm">Admin: <?= $admin['admin'] ?></span>
                        <span class="btn btn-secondary btn-sm">Owner: <?= $owner['owner'] ?></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>