<?php  

	include ("function/koneksi.php");
	include ("function/helper.php");

	session_start();

	$nama_penerima = $_POST["nama_penerima"];
	$nomor_telepon = $_POST["nomor_telepon"];
	$alamat = $_POST["alamat"];
	$kota = $_POST["kota"];

	$user = $_SESSION['user_id'];
	$waktu_saat_ini = date("Y-m-d H:i:s");

	$query = mysqli_query($koneksi, "Insert into pesanan (nama_penerima, user_id, nomor_telepon, kota_id, alamat, tanggal_pemesanan, status)
		VALUES ('$nama_penerima', '$user', '$nomor_telepon', '$kota', '$alamat', '$waktu_saat_ini', '0')");


	if ($query) {
		$last_pesanan_id = mysqli_insert_id($koneksi);

		$keranjang = $_SESSION['keranjang'];

		foreach ($keranjang as $key => $value) {
			$barang_id = $key;

			$harga = $value['harga'];
			$quantity = $value['quantity'];

			mysqli_query($koneksi, "insert into pesanan_detail(pesanan_id, barang_id, quantity, harga)
								VALUES ('$last_pesanan_id', '$barang_id', '$quantity', '$harga') ");
		}


		unset($_SESSION["keranjang"]);

		header("location:".BASE_URL."index.php?page=myprofile&module=pesanan&action=detail&pesanan_id=$last_pesanan_id");
	}

?>