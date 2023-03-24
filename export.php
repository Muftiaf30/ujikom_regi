<?php
//memasukkan file config.php
include('config.php');
?>
<html>
<head>
<link rel="icon" href="assets/assets/images/logo.jpeg" type="image/ico" />
  <title>Generate Laporan</title>
 
</head>
<body>
<h3 align="center">LAPORAN PEMBAYARAN SPP <br> SMK IT AL-MAMUN</h3>
 	<br>
 	<table width="80%" align="center" border="1" cellspacing="0" cellpadding="4">
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
					$total= 0;
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
			<tbody>
		</table>
				<br><br>
		<table width="80%" align="center">
 		<tr>
 			<td></td>
 			<td width="200px">
 				<p>Limbangan <?php echo date('Y-m-d') ?><br>Operator</p>
 				<br><br>
 				<p>_________________</p>
 				<a href="#" class="no-print" onclick="window.print();">Cetak Laporan</a>
 			</td>
 		</tr>
 	</table>
	</div>
	    </div>
</div>
	
<script>
$(document).ready(function() {
    $('#mauexport').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</body>
</html>
