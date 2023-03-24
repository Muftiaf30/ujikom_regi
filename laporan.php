<?php
//memasukkan file config.php
include('config.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Laporan</title>
  
  <link rel="stylesheet" type="text/css" href="assets/css/laporan.css">
  
</head>
<body>
	<div class="container">
	    <div class="row">
	      <div class="main col-md-6 offset-3">
	        <h2 class="text-center mt-3">Laporan Pembayaran</h2>
			<br>
	        <form method="GET" action="laporan_pembayaran.php" target="_blank">
	          <div class="row">
	            <div class="col-md-10 offset-1">
	              <div class="form-group row">
	              	<div class="col-md-4">
	              		<label>Dari Tanggal</label>
	              	</div>
	              	<div class="col-md-8">
	              		<input type="date" class="form-control rounded-pill" name="tgl1" value="<?php echo date('Y-m-d') ?>">
	              	</div>
	              </div>
	               <div class="form-group row">
	              	<div class="col-md-4">
	              		<label>Sampai Tanggal</label>
	              	</div>
	              	<div class="col-md-8">
	              		<input type="date" class="form-control rounded-pill" name="tgl2" value="<?php echo date('Y-m-d') ?>">
	              	</div>
	              </div>
	              <div class="clearfixs">
	              	<div class="float-right">
	              		<button class="submit" type="submit" class="button">Tampilkan</button>
	              	</div>
	              </div>
	            </div>
	          </div>
	        </form>
	      </div>
	    </div>
	</div>
</body>
</html>
