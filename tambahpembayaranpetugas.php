<?php include('config.php'); ?>

		<center><font size="6">Entri Transaksi Pembayaran</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$id_pembayaran  = $_POST['id_pembayaran'];
			$id_petugas  	= $_POST['id_petugas'];
			$nisn       	= $_POST['nisn'];
			$tgl_bayar		= $_POST['tgl_bayar'];
			$bulan_dibayar	= $_POST['bulan_dibayar'];
            $tahun_dibayar	= $_POST['tahun_dibayar'];
            $id_spp 		= $_POST['id_spp'];
            $jumlah_bayar 	= $_POST['jumlah_bayar'];

			$cek = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembayaran='$id_pembayaran'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO pembayaran(id_pembayaran, id_petugas, nisn, tgl_bayar, bulan_dibayar, tahun_dibayar, id_spp, jumlah_bayar) VALUES('$id_pembayaran', '$id_petugas', '$nisn', '$tgl_bayar', '$bulan_dibayar', '$tahun_dibayar', '$id_spp', '$jumlah_bayar')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Berhasil menambahkan data."); document.location="berandapetugas.php?page=tambah_pembayaranpetugas";</script>';
				}else{
					echo '<div class="alert alert-warning">Gagal melakukan proses tambah data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Gagal, Petugas sudah terdaftar.</div>';
			}
		}
		?>

		<form action="berandapetugas.php?page=tambah_pembayaranpetugas" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID Pembayaran</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="id_pembayaran" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Id Petugas</label>
				<div class="col-md-6 col-sm-6">
					<select name="id_petugas" class="form-control" required>
						<option value="">Pilih ID Petugas</option>
						<option value="1">1</option>
						<option value="2">2</option>
                        <option value="3">3</option>
						</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">NISN</label>
				<div class="col-md-6 col-sm-6">
				<input type="text" name="nisn" class="form-control" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tanggal Bayar</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tgl_bayar" class="form-control" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Bulan Dibayar</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="bulan_dibayar" class="form-control" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Tahun Dibayar</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="tahun_dibayar" class="form-control" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">ID SPP</label>
				<div class="col-md-6 col-sm-6">
				<input type="text" name="id_spp" class="form-control" required>
				</div>
			</div>
            <div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Jumlah Bayar</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="jumlah_bayar" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Simpan">
			</div>
		</form>
	</div>
