<?php
$title = 'pelanggan';
require 'functions.php';
require 'layout_header.php';
$query = 'SELECT * FROM outlet';
$data = ambildata($conn, $query);
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Pilih Outlet</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="transaksi_cari_member.php" class="btn btn-dark box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <small>Jika pelanggan belum terdaftar maka daftarkan dulu lewat menu pelanggan</small>
                        <button id="btn-refresh" class="btn btn-dark box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered thead-dark" id="table">
                        <thead class="thead-dark">
                            <tr>
                                <th width="2%">No</th>
                                <th width="30%">Nama Outlet</th>
                                <th width="29%">Alamat</th>
                                <th width="29%">Telepon</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $member) : ?>
                                <tr>
                                    <td></td>
                                    <td><?= $member['nama_outlet'] ?></td>
                                    <td><?= $member['alamat_outlet'] ?></td>
                                    <td><?= $member['telp_outlet'] ?></td>
                                    <td align="center">
                                        <a href="transaksi_tambah.php?id=<?= $_GET['id']; ?>&outlet_id=<?= $member['id_outlet'] ?>" data-toggle="tooltip" data-placement="bottom" title="Pilih" class="btn btn-primary btn-block"> PILIH</a>
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
