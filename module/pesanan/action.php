<?php  

	include ("../../function/koneksi.php");
	include ("../../function/helper.php");


	session_start();

	$pesanan_id = $_GET['pesanan_id'];

	$button = $_POST['button'];

	if ($button == "Konfirmasi") {
		
		$user = $_SESSION['user_id'];
		$nomor_rekening = $_POST['nomor_rekening'];
		$nama_akun = $_POST['nama_account'];
		$tanggal_transfer = $_POST['tanggal_transfer'];

		$queryPembayaran = mysqli_query($koneksi, "INSERT INTO konfirmasi_pembayaran (pesanan_id, nomor_rekening, nama_account, tanggal_transfer) VALUES ('$pesanan_id', '$nomor_rekening', '$nama_akun','$tanggal_transfer') ");


		if ($queryPembayaran) {
			mysqli_query($koneksi, "UPDATE pesanan SET status='1' WHERE pesanan_id='$pesanan_id' ");
		}

	}elseif ($button == "Edit Status") {
		$status = $_POST['status'];

		mysqli_query($koneksi, "UPDATE pesanan SET status='$status' WHERE pesanan_id='$pesanan_id' ");

		if ($status == "2") {
			$query = mysqli_query($koneksi, "SELECT * FROM pesanan_detail WHERE pesanan_id='$pesanan_id' ");
			while($row = mysqli_fetch_assoc($query)){
				$barang_id = $row["barang_id"];
				$qty = $row['quantity'];

				mysqli_query($koneksi, "UPDATE barang SET stok=stok-$qty WHERE barang_id='$barang_id' ");
			}
		}
	}


	header("location:".BASE_URL."index.php?page=myprofile&module=pesanan&action=list");

?>