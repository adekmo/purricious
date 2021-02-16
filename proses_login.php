<?php  

include ("function/koneksi.php");
include ("function/helper.php");

$email = $_POST['email'];
$password = md5($_POST['password']);

//query untuk mngcek email dan pass yang diinput user
 $query = mysqli_query($koneksi, "Select * From user Where email='$email' AND password='$password' AND status='on' ");

//jika data yg diinput tidak ada, maka kembali kehalaman login
 if (mysqli_num_rows($query) == 0) {
 	header("location:".BASE_URL."index.php?page=login&notif=true");
 } else {
 	//klw berhasil login
 	$row = mysqli_fetch_assoc($query);

 	//buat SESSION
 	session_start();

 	$_SESSION['user_id'] = $row['user_id'];
 	$_SESSION['nama'] = $row['nama'];
 	$_SESSION['level'] = $row['level'];

 	//echo "Hai ".$row['nama']. ", Selamat Datang" ;

 	if (isset($_SESSION["proses_pesanan"])) {
 		unset($_SESSION["proses_pesanan"]);
 		header("location:".BASE_URL."data-pemesanan.html");
 	}else {
 	header("location:".BASE_URL."index.php?page=myprofile&module=pesanan&action=list");
 }	
 }
 
?>