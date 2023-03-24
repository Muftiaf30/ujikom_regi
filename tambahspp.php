<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id_spp   		= $_POST['id_spp'];
			$tahun    		= $_POST['tahun'];
			$nominal       	= $_POST['nominal'];

			$cek = mysqli_query($koneksi, "SELECT * FROM spp WHERE id_spp='$id_spp'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO spp(id_spp, tahun, nominal) VALUES('$id_spp', '$tahun', '$nominal')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="beranda.php?page=tampil_spp";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Petugas sudah terdaftar.</div>';
			}
		}
		?>

		<form action="beranda.php?page=tambah_spp" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Spp</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id_spp" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tahun</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tahun" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nominal</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nominal" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
