<?php  

	session_start();

	include ("function/koneksi.php");
	include ("function/helper.php");
 		
 	$page = isset($_GET['page']) ? $_GET['page'] : false;
 	$kategori_id = isset($_GET['kategori_id']) ? $_GET['kategori_id'] : false;

 	/* cek apakah variabel session user_id ada atau tidak.
 	Jika ada gunakan nilai dari SESSION tsbt u/variabel user id,
 	Jika tidak ada, maka beri nilai false */
 	$user = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : false;
 	$nama = isset($_SESSION['nama']) ? $_SESSION['nama'] : false;
 	$level = isset($_SESSION['level']) ? $_SESSION['level'] : false;
 	$keranjang = isset($_SESSION['keranjang']) ? $_SESSION['keranjang'] : array();
 	$totalbarang = count($keranjang);
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Adekmo Store</title>
		
		<link href="<?php echo BASE_URL."css/style.css"; ?>" type="text/css" rel="stylesheet" />

		<link href="<?php echo BASE_URL."css/banner.css"; ?>" type="text/css" rel="stylesheet" />

		<script src="<?php echo BASE_URL."js/jquery-3.1.1.min.js"; ?>"></script>
		<script src="<?php echo BASE_URL."js/Slides-SlidesJS-3/source/jquery.slides.min.js"; ?>"></script>
		
		<script>
		$(function() {
			$('#slides').slidesjs({
				height: 350,
				play: { auto : true,
					    interval : 3000
					  },
				navigation : false
			});
		});
		</script>

	</head>

	<body>
	
		<div id="container">

			<!-- BAGIAN HEADER -->
			<div id="header">
				<a href="<?php echo BASE_URL."index.php"; ?>">
					<h1>ADEKMO Store</h1>
				</a>
				
				<div id="menu">
					<div id="user">
						<?php  
						if ($user) {
							echo "Hi <b>$nama</b>, 
								  <a href=' ".BASE_URL."index.php?page=myprofile&module=pesanan&action=list'>My Profile</a>
								  <a href ='".BASE_URL."logout.php'>Logout</a>";
						}else {
							echo "<a href='".BASE_URL."login.html'>Login</a>
								  <a href='".BASE_URL."register.html'>Register</a>";
						}

						?>
							
					</div>
					
					<a href="<?php echo BASE_URL."keranjang.html"; ?>" id="button-keranjang">
					<img src="<?php echo BASE_URL."images/cart.png"; ?>" />
					<?php
						if ($totalbarang != 0) {
							echo "<span class='total-barang'>$totalbarang</span>";
						}
					?>
					</a>
				</div>
			</div>	


			<!-- BAGIAN CONTENT -->
			<div id="content">
				
				<?php
					$filename = "$page.php";
					
					if(file_exists($filename)){
						include_once($filename);
					}else{
						include_once("main.php");
					}
				?>
			
			</div>
			

			<!-- BAGIAN FOOTER-->
			<div id="footer">
				<p>copyright Adekmo 2020</p>
			</div>
			
		</div>
	
	</body>
	
</html>