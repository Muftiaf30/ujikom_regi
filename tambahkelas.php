<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id_kelas  		= $_POST['id_kelas'];
			$nama_kelas 	= $_POST['nama_kelas'];
			$kompetensi_keahlian       	= $_POST['kompetensi_keahlian'];

			$cek = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id_kelas'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO kelas(id_kelas, nama_kelas, kompetensi_keahlian) VALUES('$id_kelas', '$nama_kelas', '$kompetensi_keahlian')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="beranda.php?page=tampil_kelas";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Petugas sudah terdaftar.</div>';
			}
		}
		?>

		<form action="beranda.php?page=tambah_kelas" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Kelas</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id_kelas" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama Kelas</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama_kelas" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Kompetensi Keahlian</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="kompetensi_keahlian" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
