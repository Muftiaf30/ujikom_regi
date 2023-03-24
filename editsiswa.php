<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['nisn'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$nisn = $_GET['nisn'];

			//query ke database SELECT tabel mahasiswa berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nisn'") or die(mysqli_error($koneksi));

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
			$nisn   		= $_POST['nisn'];
			$nis       		= $_POST['nis'];
			$nama   		= $_POST['nama'];
			$id_kelas  		= $_POST['id_kelas'];
            $alamat     	= $_POST['alamat'];
            $no_telp    	= $_POST['no_telp'];
            $id_spp 		= $_POST['id_spp'];

			$sql = mysqli_query($koneksi, "UPDATE siswa SET nisn='$nisn', nis='$nis', nama='$nama', id_kelas='$id_kelas', alamat='$alamat', no_telp='$no_telp', id_spp='$id_spp' WHERE nisn='$nisn'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Berhasil menyimpan data."); document.location="beranda.php?page=tampil_siswa";</script>';
			}else{
				echo '<div class="alert alert-warning">Gagal melakukan proses edit data.</div>';
			}
		}
		?>

		<form action="beranda.php?page=edit_siswa&nisn=<?php echo $nisn; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NISN</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nisn" class="form-control"  value="<?php echo $data['nisn']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NIS</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nis" class="form-control" value="<?php echo $data['nis']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" value="<?php echo $data['nama']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Kelas</label>
				<div class="col-md-6 col-sm-6">
					<select name="id_kelas" class="form-control" required>
						<option value="">Pilih ID Kelas</option>
						<option value="111" <?php if($data['id_kelas'] == '111'){ echo 'selected'; } ?>>111</option>
						<option value="112" <?php if($data['id_kelas'] == '112'){ echo 'selected'; } ?>>112</option>
					</select>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Telephone</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_telp" class="form-control" value="<?php echo $data['no_telp']; ?>" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID SPP</label>
				<div class="col-md-6 col-sm-6">
					<select name="id_spp" class="form-control" required>
						<option value="">Pilih ID SPP</option>
						
						<option value="201" <?php if($data['id_spp'] == '201'){ echo 'selected'; } ?>>201</option>
						<option value="202" <?php if($data['id_spp'] == '202'){ echo 'selected'; } ?>>202</option>
						<option value="203" <?php if($data['id_spp'] == '203'){ echo 'selected'; } ?>>203</option>
						<option value="204" <?php if($data['id_spp'] == '204'){ echo 'selected'; } ?>>204</option>
						<option value="205" <?php if($data['id_spp'] == '205'){ echo 'selected'; } ?>>205</option>
						<option value="206" <?php if($data['id_spp'] == '206'){ echo 'selected'; } ?>>206</option>
						<option value="207" <?php if($data['id_spp'] == '207'){ echo 'selected'; } ?>>207</option>
						<option value="208" <?php if($data['id_spp'] == '208'){ echo 'selected'; } ?>>208</option>
						<option value="209" <?php if($data['id_spp'] == '209'){ echo 'selected'; } ?>>209</option>
						<option value="210" <?php if($data['id_spp'] == '210'){ echo 'selected'; } ?>>210</option>
						<option value="211" <?php if($data['id_spp'] == '211'){ echo 'selected'; } ?>>211</option>
						<option value="212" <?php if($data['id_spp'] == '212'){ echo 'selected'; } ?>>212</option>
						
					</select>
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
