<?php
$title = 'transaksi';
require 'functions.php';
require 'layout_header.php';
$query = "SELECT transaksi.*,member.nama_member , detail_transaksi.total_harga FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi WHERE transaksi.status_bayar='belum'";
$data = ambildata($conn, $query);
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Konfirmasi <?= $title ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="transaksi.php" class="btn btn-secondary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-dark box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered thead-dark" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th width="2%">No</th>
                                <th width="22%">kode Pesanan</th>
                                <th width="22%">Nama Member</th>
                                <th width="22%">Status</th>
                                <th width="22%">Total Harga</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $transaksi) : ?>
                                <tr>
                                    <td align="center"></td>
                                    <td><?= $transaksi['kode_invoice'] ?></td>
                                    <td><?= $transaksi['nama_member'] ?></td>
                                    <td><?= $transaksi['status'] ?></td>
                                    <td><?= $transaksi['total_harga'] ?></td>
                                    <td align="center">
                                        <a href="transaksi_bayar.php?id=<?= $transaksi['id_transaksi']; ?>" data-toggle="tooltip" data-placement="bottom" title="Pilih" class="btn btn-primary btn-block"> PILIH</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

    </div>
</div>
<?php
require 'layout_footer.php';
