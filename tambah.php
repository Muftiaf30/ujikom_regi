<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id_petugas		= $_POST['id_petugas'];
			$username		= $_POST['username'];
			$nama_petugas	= $_POST['nama_petugas'];
			$password		= $_POST['password'];
			$level			= $_POST['level'];

			$cek = mysqli_query($koneksi, "SELECT * FROM petugas WHERE id_petugas='$id_petugas'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO petugas(id_petugas, username, nama_petugas, password, level) VALUES('$id_petugas', '$username', '$nama_petugas', '$password', '$level')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="beranda.php?page=tampil_mhs";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Petugas sudah terdaftar.</div>';
			}
		}
		?>

		<form action="beranda.php?page=tambah_mhs" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id Petugas</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id_petugas" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Username</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="username" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Petugas</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_petugas" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Password</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="password" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Level</label>
				<div class="col-md-6 col-sm-6">
					<select name="level" class="form-control" required>
						<option value="">Pilih Level</option>
						<option value="Admin">Admin</option>
						<option value="Petugas">Petugas</option>
						</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
