<?php
$title = 'pelanggan';
require 'functions.php';

if (isset($_POST['btn-simpan'])) {
    $nama     = $_POST['nama_member'];
    $alamat_member = $_POST['alamat_member'];
    $no_ktp     = $_POST['no_ktp'];
    $telp_member     = $_POST['telp_member'];
    $jenis_kelamin     = $_POST['jenis_kelamin'];
    $query = "INSERT INTO member (nama_member,alamat_member,no_ktp,telp_member,jenis_kelamin) values ('$nama','$alamat_member','$no_ktp','$telp_member','$jenis_kelamin')";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil menambahkan ' . $role . ' baru';
        $type = 'success';
        header('location: pelanggan.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
        echo "Gagal Tambah Data";
    }
}


require 'layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Tambah Pelanggan</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="pelanggan.php" class="btn btn-secondary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
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
                        <label>NIK</label>
                        <input type="number" name="no_ktp" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Nama Member</label>
                        <input type="text" name="nama_member" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Alamat Member</label>
                        <input type="text" name="alamat_member" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>No Telepon</label>
                        <input type="text" name="telp_member" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option value="Laki-Laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
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