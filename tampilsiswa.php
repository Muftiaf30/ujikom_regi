<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Data Siswa</font></center>
		<hr>
		<a href="beranda.php?page=tambah_siswa"><button class="btn btn-dark right">Tambah Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>NISN</th>
					<th>NIS</th>
					<th>Nama</th>
					<th>Id Kelas</th>
                    <th>Alamat</th>
                    <th>Telephone</th>
                    <th>Id SPP</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel mahasiswa urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM siswa ORDER BY nisn ASC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$data['nisn'].'</td>
							<td>'.$data['nis'].'</td>
							<td>'.$data['nama'].'</td>
							<td>'.$data['id_kelas'].'</td>
							<td>'.$data['alamat'].'</td>
                            <td>'.$data['no_telp'].'</td>
                            <td>'.$data['id_spp'].'</td>
                            <td>
								<a href="beranda.php?page=edit_siswa&nisn='.$data['nisn'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="deletesiswa.php?nisn='.$data['nisn'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Delete</a>
							</td>
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
