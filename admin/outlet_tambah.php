<?php
$title = 'outlet';
require 'functions.php';


if (isset($_POST['btn-simpan'])) {
    $nama   = stripslashes($_POST['nama_outlet']);
    $alamat = stripslashes($_POST['alamat_outlet']);
    $telp   = stripslashes($_POST['telp_outlet']);

    $query = "INSERT INTO outlet (nama_outlet,alamat_outlet,telp_outlet) values ('$nama','$alamat','$telp')";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil Simpan Data';
        $type = 'success';
        header('location: outlet.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
        echo "Gagal Tambah Data";
    }
}


require 'layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Tambah Outlet</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="outlet.php" class="btn btn-secondary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button id="btn-refresh" class="btn btn-dark box-title text-right" title="Refresh Data"><i class="fa fa-refresh" id="ic-refresh"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <form method="post" action="">
                    <div class="form-group">
                        <label>Nama Outlet</label>
                        <input type="text" name="nama_outlet" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat Outlet</label>
                        <textarea name="alamat_outlet" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Nomor Telepon</label>
                        <input type="number" name="telp_outlet" class="form-control">
                    </div>
                    <div class="text-right">
                        <button type="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> RESET</button>
                        <button type="submit" name="btn-simpan" class="btn btn-success"><i class="fa fa-save"></i> SIMPAN</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require 'layout_footer.php';
?>