<?php
$title = 'paket';
require 'functions.php';

$jenis = ['Kiloan', 'Selimut', 'Bedcover', 'Kaos', 'Levis'];

$id_paket = stripslashes($_GET['id']);
$queryedit = "SELECT * FROM paket WHERE id_paket = '$id_paket'";
$edit = ambilsatubaris($conn, $queryedit);
var_dump($edit);
$query = 'SELECT * FROM outlet';
$data = ambildata($conn, $query);

if (isset($_POST['btn-simpan'])) {
    $nama   = stripslashes($_POST['nama_paket']);
    $jenis_paket = stripslashes($_POST['jenis_paket']);
    $harga   = stripslashes($_POST['harga']);
    $outlet_id   = stripslashes($_POST['outlet_id']);

    $query = "UPDATE paket SET nama_paket='$nama',jenis_paket='$jenis_paket',harga='$harga',outlet_id='$outlet_id' WHERE id_paket = '$id_paket'";

    $execute = bisa($conn, $query);
    if ($execute == 1) {
        $success = 'true';
        $title = 'Berhasil';
        $message = 'Berhasil Ubah Data';
        $type = 'success';
        header('location: paket.php?crud=' . $success . '&msg=' . $message . '&type=' . $type . '&title=' . $title);
    } else {
        echo "Gagal Tambah Data";
    }
}


require 'layout_header.php';
?>
<div class="container-fluid">
    <div class="row bg-title">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">Edit Data <?= htmlspecialchars($title); ?></h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-6">
                        <a href="paket.php" class="btn btn-secondary box-title"><i class="fa fa-arrow-left fa-fw"></i> Kembali</a>
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
                        <label>Nama Paket</label>
                        <input type="text" name="nama_paket" class="form-control" value="<?= htmlspecialchars($edit['nama_paket']); ?>">
                    </div>
                    <div class="form-group">
                        <label>Jenis Paket</label>
                        <select name="jenis_paket" class="form-control">
                            <?php foreach ($jenis as $key) : ?>
                                <?php if ($key == $edit['jenis_paket']) : ?>
                                    <option value="<?= htmlspecialchars($key); ?>" selected><?= htmlspecialchars($key); ?></option>
                                <?php endif ?>
                                <option value="<?= htmlspecialchars($key); ?>"><?= htmlspecialchars($key); ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" value="<?= htmlspecialchars($edit['harga']); ?>">
                    </div>
                    <div class="form-group">
                        <label>Pilih Outlet</label>
                        <select name="outlet_id" class="form-control">
                            <?php foreach ($data as $outlet) : ?>
                                <?php if ($data['id_outlet'] == $edit['outlet_id']) : ?>
                                    <option value="<?= htmlspecialchars($outlet['id_outlet']); ?>" selected><?= htmlspecialchars($outlet['nama_outlet']); ?></option>
                                <?php endif ?>
                                <option value="<?= htmlspecialchars($outlet['id_outlet']); ?>"><?= htmlspecialchars($outlet['nama_outlet']); ?></option>
                            <?php endforeach ?>
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