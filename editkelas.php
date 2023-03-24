<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_kelas'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_kelas = $_GET['id_kelas'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$id_kelas 		= $_POST['id_kelas'];
			$nama_kelas   	= $_POST['nama_kelas'];
			$kompetensi_keahlian   	= $_POST['kompetensi_keahlian'];

			$sql = mysqli_query($koneksi, "UPDATE kelas SET id_kelas='$id_kelas', nama_kelas='$nama_kelas', kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas='$id_kelas'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="beranda.php?page=tampil_kelas";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="beranda.php?page=edit_kelas&id_kelas=<?php echo $id_kelas; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Kelas</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_kelas" class="form-control"  value="<?php echo $data['id_kelas']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Kelas</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_kelas" class="form-control" value="<?php echo $data['nama_kelas']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kompetensi Keahlian</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kompetensi_keahlian" class="form-control" value="<?php echo $data['kompetensi_keahlian']; ?>" required>
				</div>
			</div>
            	<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="beranda.php?page=tampil_siswa" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
