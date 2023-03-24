<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['id_spp'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$id_spp = $_GET['id_spp'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM spp WHERE id_spp='$id_spp'") or die(mysqli_error($koneksi));

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
			$id_spp 	= $_POST['id_spp'];
			$tahun   	= $_POST['tahun'];
			$nominal   	= $_POST['nominal'];

			$sql = mysqli_query($koneksi, "UPDATE spp SET id_spp='$id_spp', tahun='$tahun', nominal='$nominal' WHERE id_spp='$id_spp'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="beranda.php?page=tampil_spp";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="beranda.php?page=edit_spp&id_spp=<?php echo $id_spp; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID SPP</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="id_spp" class="form-control"  value="<?php echo $data['id_spp']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">tahun</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tahun" class="form-control" value="<?php echo $data['tahun']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nominal</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nominal" class="form-control" value="<?php echo $data['nominal']; ?>" required>
				</div>
			</div>
            	<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
					<a href="beranda.php?page=tampil_spp" class="btn btn-warning">Kembali</a>
				</div>
			</div>
		</form>
	</div>
