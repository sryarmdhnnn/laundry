<?php
$title = 'dashboard';
require 'functions.php';
require 'layout_header.php';
$jTransaksi = ambilsatubaris($conn, 'SELECT COUNT(id_transaksi) as jumlahtransaksi FROM transaksi');
$jPelanggan = ambilsatubaris($conn, 'SELECT COUNT(id_member) as jumlahmember FROM member');
$joutlet = ambilsatubaris($conn, 'SELECT COUNT(id_outlet) as jumlahoutlet FROM outlet');
$query = "SELECT transaksi.*,member.nama_member, detail_transaksi.total_harga FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi   ORDER BY transaksi.id_transaksi DESC LIMIT 20";
$data = ambildata($conn, $query);
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Dashboard</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Oulet</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id=""></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-success"></i> <span class="counter text-success"><?= htmlspecialchars($joutlet['jumlahoutlet']); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Pelanggan</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id=""></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-purple"></i> <span class="counter text-purple"><?= htmlspecialchars($jPelanggan['jumlahmember']); ?></span></li>
                </ul>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6 col-xs-12">
            <div class="white-box analytics-info">
                <h3 class="box-title">Transaksi</h3>
                <ul class="list-inline two-part">
                    <li>
                        <div id=""></div>
                    </li>
                    <li class="text-right"><i class="ti-arrow-up text-info"></i> <span class="counter text-info"><?= htmlspecialchars($jTransaksi['jumlahtransaksi']); ?></span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title">20 Transaksi Terbaru</h3>
                <div class="table-responsive">
                    <table class="table ">
                        <thead>
                            <tr>
                                <th width="2%">No</th>
                                <th width="22%">Kode Pesanan</th>
                                <th width="22%">Nama Member</th>
                                <th width="22%">Status</th>
                                <th width="22%">Pemabayaran</th>
                                <th width="10%">Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($data as $transaksi) : ?>
                                <tr>
                                    <td align="center"><?= $no++ ?></td>
                                    <td><?= htmlspecialchars($transaksi['kode_invoice']); ?></td>
                                    <td><?= htmlspecialchars($transaksi['nama_member']); ?></td>
                                    <td><?= htmlspecialchars($transaksi['status']); ?></td>
                                    <td><?= htmlspecialchars($transaksi['status_bayar']); ?></td>
                                    <td><?= htmlspecialchars($transaksi['total_harga']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require 'layout_footer.php';
?>