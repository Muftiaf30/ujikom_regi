<?php
//memasukkan file koneksi.php
include('config.php');
?>
<html>
<head>
<link rel="icon" href="assets/images/logo.jpeg" type="image/ico" />
  <title>Generate Laporan</title>
  
</head>
<body>
    <?php
  include ('tampilan/header.php');
  include ('tampilan/sidebar.php');
  include ('tampilan/footer.php');
  ?>
  <br><br><br><br><br><br><br>
  <div class="container">
	    <div class="row">
	      <div class="main col-md-6 offset-3">
	        <h2 class="text-center mt-3">Laporan </h2>
	        <form method="GET" action="export.php" target="_blank">
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
	              		<button class="submit btn-primary" type="submit" >Tampilkan</button>
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
