<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'config.php';
 
// menangkap data yang dikirim dari form login
$nisn = $_POST['nisn'];
$nama = $_POST['nama'];
 
 
// menyeleksi data user dengan nisn dan nama yang sesuai
$login = mysqli_query($koneksi,"select * from siswa where nisn='$nisn' and nama='$nama'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);
 
// cek apakah nisn dan nama di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai siswa
	if($data['nisn']==$nisn){
		// buat session login dan nisn
		$_SESSION['nisn'] = $nisn;
		$_SESSION['nama'] = $nama;
		// alihkan ke halaman dashboard pegawai
		header("location:berandasiswa.php");
 
	}else{
 
		// alihkan ke halaman login kembali
		header("location:indexsiswa.html?pesan=gagal");
	}	
}else{
	header("location:indexsiswa.html?pesan=gagal");
}
 
?>