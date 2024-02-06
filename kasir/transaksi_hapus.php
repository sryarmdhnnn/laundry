<?php 
require 'functions.php';
$sql = "DELETE FROM transaksi WHERE id_transaksi = " . $_GET['id'];
$exe = mysqli_query($conn,$sql);

if($exe){
	$success = 'true';
    $title = 'Berhasil';
    $message = 'Menghapus Data';
    $type = 'success';
    header('location: pengguna.php?crud='.$success.'&msg='.$message.'&type='.$type.'&title='.$title);
}
 ?>

