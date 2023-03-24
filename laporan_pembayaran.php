<?php 
	session_start();
	if (isset($_SESSION['login'])) {
		include 'config.php';
	}
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 <link rel="shortcut icon" href="assets/images/icon.png" type="image/x-icon">
 	<title>Laporan Pembayaran</title>
 	<style type="text/css">
 		body{
 			font-family: Arial;
 		}

 		@media print{
 			.no-print{
 				display: none;
 			}
 		}

 		table{
 			border-collapse: collapse;
 		}

		.no-print {
			width: 30px;
			height: 20px;
			padding: 5px;
			border-radius: 10px;
			text-decoration: none;
			font-family: arial;
			color: #fff;
			background-color: blue;
		}
 	</style>
 </head>
 <body>
 	<h3 align="center">LAPORAN PEMBAYARAN SPP <br> SMK IT Al-ma'mun Limbangan</h3>
 	<br>
 	<table width="80%" align="center" border="1" cellspacing="0" cellpadding="4">
 		<thead>
 			<tr align="center">
 			<td>ID Pembayaran</td>
	 		<td>ID Petugas</td>
	 		<td>NISN</td>
	 		<td>Tanggal Bayar</td>
	 		<td>Bulan Dibayar</td>
	 		<td>Tahun Bayar</td>
	 		<td>ID SPP</td>
	 		<td>Jumlah Bayar</td>
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
						$total += $data['jumlah_bayar'];
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

	 		<tr>
	 			<td colspan="7" align="center"><strong>Total</strong></td>
	 			<td align="left"><strong><?php echo $total ?></strong></td>
	 		</tr>
	 	</tbody>
 	</table>

 	<table width="80%" align="center">
 		<tr>
 			<td></td>
 			<td width="200px">
 				<p>Limbangan, <?php echo date('Y-m-d') ?><br>Operator</p>
 				<br><br>
 				<p>_________________</p>
 				<a href="#" class="no-print" onclick="window.print();">Cetak Laporan</a>
 			</td>
 		</tr>
 	</table>
 	

 </body>
 </html>