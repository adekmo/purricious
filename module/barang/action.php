<?php
    include("../../function/koneksi.php");   
    include("../../function/helper.php");   
     
    $nama_barang = $_POST['nama_barang'];
    $kategori_id = $_POST['kategori_id'];
    $spesifikasi = $_POST['spesifikasi'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $status = $_POST['status'];
    $button = $_POST['button'];
    $update_gambar ="";


    if (!empty($_FILES["file"] ["name"])) {
    	// script upload file ke server
    	$nama_file = $_FILES["file"]["name"];
    	move_uploaded_file($_FILES["file"] ["tmp_name"], "../..images/barang/".$nama_file);

    	$update_gambar = ", gambar='$nama_file'";
    }
    
	
	if($button == "Add"){
		mysqli_query($koneksi, "INSERT INTO barang (nama_barang, kategori_id, spesifikasi, gambar, harga, stok, status) VALUES('$nama_barang', '$kategori_id', '$spesifikasi', '$nama_file', '$harga', '$stok', '$status')");
	}
	
	else if($button == "Update"){
		$barang_id = $_GET['barang_id'];
		
		mysqli_query($koneksi, "UPDATE barang SET kategori_id='$kategori_id',
												  nama_barang='$nama_barang',
												  spesifikasi='$spesifikasi',
												  harga='$harga',
												  stok='$stok',
												  status='$status'
												  $update_gambar WHERE barang_id='$barang_id'");
	}
	
	
	header("location:" .BASE_URL."index.php?page=myprofile&module=barang&action=list");