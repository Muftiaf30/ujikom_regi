<?php include('config.php'); ?>

		<center><font size="6">Tambah Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$nisn   		= $_POST['nisn'];
			$nis    		= $_POST['nis'];
			$nama       	= $_POST['nama'];
			$id_kelas		= $_POST['id_kelas'];
			$alamat			= $_POST['alamat'];
            $no_telp		= $_POST['no_telp'];
            $id_spp 		= $_POST['id_spp'];

			$cek = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$nisn'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO siswa(nisn, nis, nama, id_kelas, alamat, no_telp, id_spp) VALUES('$nisn', '$nis', '$nama', '$id_kelas', '$alamat', '$no_telp', '$id_spp')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="beranda.php?page=tampil_siswa";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Siswa sudah terdaftar.</div>';
			}
		}
		?>

		<form action="beranda.php?page=tambah_siswa" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NISN</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="nisn" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NIS</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nis" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Nama</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="nama" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id Kelas</label>
				<div class="col-md-6 col-sm-6">
					<select name="id_kelas" class="form-control" required>
						<option value="">Pilih ID Kelas</option>
						<option value="111">111</option>
						<option value="112">112</option>
						</select>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Alamat</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="alamat" class="form-control" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Telephone</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="no_telp" class="form-control" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">SPP</label>
				<div class="col-md-6 col-sm-6">
				<input type="text" name="spp" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
