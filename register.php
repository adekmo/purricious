<?php  

if ($user) {
	header("location:".BASE_URL);
}

?>


<div id="container-user-akses">
	<form action="<?php echo BASE_URL."proses_register.php"; ?>" method="POST">

		<?php

		//membuat variabel notif dan mengcek variabel
		$notif = isset($_GET['notif']) ? $_GET['notif'] : false;
		$nama = isset($_GET['nama_lengkap']) ? $_GET['nama_lengkap'] : false;
		$email = isset($_GET['email']) ? $_GET['email'] : false;
		$phone = isset($_GET['phone']) ? $_GET['phone'] : false;
		$alamat = isset($_GET['alamat']) ? $_GET['alamat'] : false;

		if ($notif == "datakurang") {
		  	echo "<div class='notif'> Maaf, lengkapi Data dulu Bos </div>";
		  } elseif ($notif == 'password') {
		  	echo "<div class='notif'> Maaf, Password tidak sama </div>";
		  } elseif ($notif == 'email') {
		  	echo "<div class='notif'> Maaf, Email Sudah Terdaftar. Gunakan Email Lain </div>";
		  }
		    
		?>

		<div class="element-form">
			<label>Nama Lengkap</label>
			<span><input type="text" name="nama_lengkap" value="<?php echo $nama; ?>"></span>
		</div>

		<div class="element-form">
			<label>Email</label>
			<span><input type="text" name="email" value="<?php echo $email; ?>"></span>
		</div>

		<div class="element-form">
			<label>Nomor Telepon / Handphone</label>
			<span><input type="text" name="phone" value="<?php echo $phone; ?>"></span>
		</div>

		<div class="element-form">
			<label>Alamat</label>
			<span><textarea name="alamat"><?php echo $alamat; ?></textarea></span>
		</div>
	
		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password" /></span>
		</div>	

		<div class="element-form">
			<label>Re-type Password</label>
			<span><input type="password" name="re_password" /></span>
		</div>	

		<div class="element-form">
			<span><input type="submit" value="Daftar" /></span>
		</div>	
	
	</form>
	
</div>