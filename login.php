<?php  

if ($user) {
	header("location:".BASE_URL);
}

?>

<div id="container-user-akses">
	<form action="<?php echo BASE_URL."proses_login.php"; ?>" method="POST">

		<?php

		//membuat variabel notif dan mengcek variabel
		$notif = isset($_GET['notif']) ? $_GET['notif'] : false;

		if ($notif == true) {
		  	echo "<div class='notif'> Maaf, Email dan Password tidak cocok! </div>";
		  }
		?>

		<div class="element-form">
			<label>Email</label>
			<span><input type="text" name="email"></span>
		</div>
	
		<div class="element-form">
			<label>Password</label>
			<span><input type="password" name="password" /></span>
		</div>	

		<div class="element-form">
			<span><input type="submit" value="Login" /></span>
		</div>	
	
	</form>
	
</div>