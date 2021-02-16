<?php  

include ("function/koneksi.php");
include ("function/helper.php");

$level = "customer";
$status = "on";
$nama = $_POST['nama_lengkap'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$alamat = $_POST['alamat'];
$pass = $_POST['password'];
$repass = $_POST['re_password'];


unset($_POST['password']);
unset($_POST['re_password']);

//agar data di form tidak hilang saat error (Datanya muncul di URL)
$dataForm = http_build_query($_POST);

//syntax untuk email (klw email sdh trdftr hrs pke email lain)
$cari = mysqli_query($koneksi, "Select * from user where email='$email'");

// Syntax untuk cek, Apa ada data yg kosong.
if (empty($nama) || empty($email) || empty($phone) || empty($alamat) || empty($pass)) {
	// kalau ada muncul notif=salah di url
	header("location:".BASE_URL."index.php?page=register&notif=datakurang&$dataForm");
} elseif ($pass != $repass) {
	header("location:".BASE_URL."index.php?page=register&notif=password&$dataForm");
//mysqli_num_rows unutk mnghitung total data berdasarkan query diatas ($cari)
} elseif (mysqli_num_rows($cari) == 1) {
	header("location:".BASE_URL."index.php?page=register&notif=email&$dataForm");
} else {
	$pass = md5($pass);
	mysqli_query ($koneksi, "insert into user (level, nama, email, alamat, phone, password, status) Values ('$level', '$nama', '$email', '$alamat', '$phone', '$pass', '$status') ");

		header("location:".BASE_URL."index.php?page=login");

}


?>