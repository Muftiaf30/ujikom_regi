<?php include('config.php'); ?>


<div class="container" style="margin-top:20px">
	<center>
		<font size="6">Edit Data</font>
	</center>

	<hr>

	<?php
	//jika sudah mendapatkan parameter GET id dari URL
	if (isset($_GET['id_petugas'])) {
		//membuat variabel $id untuk menyimpan id dari GET id di URL
		$id_petugas = $_GET['id_petugas'];

		//query ke database SELECT tabel mahasiswa berdasarkan id = $id
		$select = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id_petugas'") or die(mysqli_error($koneksi));

		//jika hasil query = 0 maka muncul pesan error
		if (mysqli_num_rows($select) == 0) {
			echo '<div class="alert alert-warning">ID tidak ada dalam database.</div>';
			exit();
			//jika hasil query > 0
		} else {
			//membuat variabel $data dan menyimpan data row dari query
			$data = mysqli_fetch_assoc($select);
		}
	}
	?>

	<?php
	//jika tombol simpan di tekan/klik
	if (isset($_POST['submit'])) {
		$username		= $_POST['username'];
		$nama_petugas	= $_POST['nama_petugas'];
		$password		= $_POST['password'];
		$level			= $_POST['level'];

		$sql = mysqli_query($koneksi, "UPDATE petugas SET username='$username', nama_petugas='$nama_petugas', password='$password', level='$level' WHERE id_petugas='$id_petugas'") or die(mysqli_error($koneksi));

		if ($sql) {
			echo '<script>alert("Berhasil menyimpan data."); document.location="beranda.php?page=tampil_mhs";</script>';
		} else {
			echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
		}
	}
	?>

	<form action="beranda.php?page=edit_mhs&id_petugas=<?php echo $id_petugas; ?>" method="post">
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Id Petugas</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="id_petugas" class="form-control" value="<?php echo $data['id_petugas']; ?>" readonly required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="username" class="form-control" value="<?php echo $data['username']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Petugas</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="nama_petugas" class="form-control" value="<?php echo $data['nama_petugas']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
			<div class="col-md-6 col-sm-6">
				<input type="text" name="password" class="form-control" value="<?php echo $data['password']; ?>" required>
			</div>
		</div>
		<div class="item form-group">
			<label class="col-form-label col-md-3 col-sm-3 label-align">Level</label>
			<div class="col-md-6 col-sm-6">
				<select name="level" class="form-control" required>
					<option value="">Pilih Level</option>
					<option value="Admin" <?php if ($data['level'] == 'Admin') {
												echo 'selected';
											} ?>>Admin</option>
					<option value="Petugas" <?php if ($data['level'] == 'Petugas') {
												echo 'selected';
											} ?>>Petugas</option>
				</select>
			</div>
		</div>
		<div class="item form-group">
			<div class="col-md-6 col-sm-6 offset-md-3">
				<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
				<a href="beranda.php?page=tampil_mhs" class="btn btn-warning">Kembali</a>
			</div>
		</div>
	</form>
</div>