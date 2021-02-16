<div id="frame-tambah">
	<a href="<?php echo BASE_URL."index.php?page=myprofile&module=kategori&action=form"; ?>"
		class="tombol-action">+ Kategori</a>
</div>

<!-- mengambil datadata dari dalam tabel kategori -->
<?php

$queryKategori = mysqli_query($koneksi, "Select * from kategori");
		
	if (mysqli_num_rows($queryKategori) == 0) {
		echo "<h3> Saat ini belum ada Kategori </h3>";
	} else {
		echo "<table class='table-list'>";
		echo "<tr class='baris-judul'>
				<th class='kolom-nomor'>No</th>
				<th class='kiri'>Kategori</th>
				<th class='tengah'>Status</th>
				<th class='tengah'>Action</th>
			</tr>";


		$no=1;

		while($row = mysqli_fetch_assoc($queryKategori)){

			echo "<tr>
					<td class='kolom-nomor'>$no</td>
					<td class='kiri'>$row[kategori]</td>
					<td class='tengah'>$row[status]</td>
					<td class='tengah'>
						<a href='".BASE_URL."index.php?page=myprofile&module=kategori&action=form&kategori_id=$row[kategori_id]' class='tombol-action'>Edit</a>
					</td>
					</tr>";

		$no++;
		}


		echo "</table>";
	}


?>