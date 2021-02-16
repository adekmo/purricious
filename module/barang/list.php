<div id="frame-tambah">
	<a href="<?php echo BASE_URL."index.php?page=myprofile&module=barang&action=form"; ?>"
		class="tombol-action">+ Barang</a>
</div>

<!-- mengambil datadata dari dalam tabel kategori -->
<?php

/* barang JOIN Kategori ON = tabel barang gabung dengan tble kategori
   barang.kategori = tabel barang, kolom kategori
   kategori=kategori_id = tabel kategori dengan nkolo katgeori_id
   barang.* = semua kolom yang ada pd table barang
   kategori.kategori = table kategori dan kolom kategori.
   */
$query = mysqli_query($koneksi, "Select barang.*, kategori.kategori from barang JOIN kategori ON barang.kategori_id=kategori.kategori_id ORDER BY nama_barang ASC");
		
	if (mysqli_num_rows($query) == 0) {
		echo "<h3> Saat ini belum ada Barang </h3>";
	} else {
		echo "<table class='table-list'>";
		echo "<tr class='baris-judul'>
				<th class='kolom-nomor'>No</th>
				<th class='kiri'>Barang</th>
				<th class='kiri'>Kategori</th>
				<th class='kiri'>Harga</th>
				<th class='tengah'>Status</th>
				<th class='tengah'>Action</th>
			</tr>";


		$no=1;

		while($row = mysqli_fetch_assoc($query)){

			echo "<tr>
					<td class='kolom-nomor'>$no</td>
					<td class='kiri'>$row[nama_barang]</td>
					<td class='kiri'>$row[kategori]</td>
					<td class='kiri'>".rupiah($row["harga"])."</td>
					<td class='tengah'>$row[status]</td>
					<td class='tengah'>
						<a href='".BASE_URL."index.php?page=myprofile&module=barang&action=form&barang_id=$row[barang_id]' class='tombol-action'>Edit</a>
					</td>
					</tr>";

		$no++;
		}


		echo "</table>";
	}


?>