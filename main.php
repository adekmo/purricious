<div id="kiri">
	<?php  

		echo kategori($kategori_id);

	?>
</div>

<div id="kanan">

	<div id="slides">
		
		<?php  

		$queryBanner = mysqli_query($koneksi, "Select * from banner where status='on' ORDER BY banner_id DESC LIMIT 3");
		while ($rowBanner = mysqli_fetch_assoc($queryBanner)){
			echo "<img src='".BASE_URL."images/slide/$rowBanner[gambar]'/> ";
		}
		

		?>

	</div>
	
	<div id="frame-barang">
		
		<ul>
			<?php  

				if ($kategori_id) {
					$kategori_id = "AND kategori_id='$kategori_id'";
				}
					$query = mysqli_query($koneksi, "Select * From barang where status='on' $kategori_id ORDER BY rand() DESC LIMIT 9 ");

				$no = 1;
				while($row = mysqli_fetch_assoc($query)){

					$style = false;
					if ($no == 3) {
						$style = "style='margin-right: 0px;'";
						$no=0;
					}

					echo "<li $style>
							<p class='harga'>".rupiah($row['harga'])."</p>
							<a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>
								<img src='".BASE_URL."images/barang/$row[gambar]' />
							</a>

							<div class='ket-gambar'>
								<p><a href='".BASE_URL."index.php?page=detail&barang_id=$row[barang_id]'>$row[nama_barang] </a> </p>
								<span> Stok : $row[stok] </span>
							</div>

							<div class='button-add-cart'>
								<a href='".BASE_URL."tambah_keranjang.php?barang_id=$row[barang_id]'> + Add to Cart </a>
							</div>" ;

					$no++;
				}

			?>
		</ul>

	</div>

</div>