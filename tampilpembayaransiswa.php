<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">History Pembayaran</font></center>
		<hr>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>ID Pembayaran</th>
					<th>ID Petugas</th>
                    <th>NISN</th>
					<th>Tanggal Bayar</th>
					<th>Bulan Dibayar</th>
                    <th>Tahun Dibayar</th>
                    <th>ID SPP</th>
                    <th>Jumlah Bayar</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM pembayaran ORDER BY id_pembayaran ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['id_pembayaran'].'</td>
							<td>'.$data['id_petugas'].'</td>
							<td>'.$data['nisn'].'</td>
							<td>'.$data['tgl_bayar'].'</td>
							<td>'.$data['bulan_dibayar'].'</td>
                            <td>'.$data['tahun_dibayar'].'</td>
                            <td>'.$data['id_spp'].'</td>
                            <td>'.$data['jumlah_bayar'].'</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">Tidak ada data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
