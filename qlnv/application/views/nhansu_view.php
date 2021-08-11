<!DOCTYPE html>
<html lang="en"><head>
	<title> Example </title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">  
	<script type="text/javascript" src="<?php echo base_url() ?>vendor/bootstrap.js"></script>
 	<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>vendor/font-awesome.css">
 	<link rel="stylesheet" href="<?php echo base_url() ?>1.css">
</head>
<body >
	<div class="container">
		<div class="text-xs-center">
			<h3 class="display-3" style="text-align: center;">Danh sách nhân viên</h3>
			<hr>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="card-columns">
			<?php foreach ($mangketqua as $value) :?>


			  <div class="card">
			    <img class="card-img-top img-fluid" src="<?= $value['anhavatar']?>" alt="Card image cap">
			    <div class="card-body" style="padding: 10px 14px;">
			      <h5 class="card-title ten"><?= $value['ten']?></h5>
			      <p class="card-text tuoi">Tuổi :<b><?= $value['tuoi']?></b></p>
			      <p class="card-text sdt">Tel : <b><?= $value['sdt']?></b></p>
			      <p class="card-text sodonhang">Địa chỉ : <?= $value['sodonhang']?></p>	     
			      <p class="card-text linkfb"><small><a href="<?= $value['linkfb']?>" class="btn btn-secondary btn-xs"> FaceBook <i class="fa fa-chevron-right"></i></a></small></p>
			      <p class="card-text editns"><small><a href="<?= base_url() ?>index.php/nhansu/sua_nhansu/<?= $value['id']?>" class="btn btn-warning btn-xs"> Edit <i class="fa fa-pencil"></i></a></small>
			      <small><a href="<?= base_url() ?>index.php/nhansu/xoa_nhansu/<?= $value['id']?>" class="btn btn-outline-danger btn-xs"> Delete <i class="fa fa-remove"></i></a></small>
			  	</p>

			    </div>
			  </div>
			  <?php endforeach ?>

			</div> <!-- end card colum -->
		</div>
	</div>







	<div class="container">
		<div class="text-xs-center">
			<h3 class="display-3">Thêm mới nhân sự</h3>
			<hr>
		</div>
		<form method="post" enctype="multipart/form-data" action="<? base_url() ?>index.php/nhansu/nhansu_add">

		  <div class="form-group">
		    <label for="anhavatar">Image</label>
		    <input type="file" class="form-control" id="anhavatar" placeholder="Enter Your Image" name="anhavatar">
		  </div>
		  <div class="form-group">
		    <label for="ten">FullName</label>
		    <input type="text" class="form-control" id="ten" placeholder="Enter Your Fullname" name="ten">
		  </div>
		  <div class="form-group">
		    <label for="tuoi">Age</label>
		    <input type="number" class="form-control" id="tuoi" placeholder="Enter Age" name="tuoi">
		  </div>
		  <div class="form-group">
		    <label for="sdt">Phone</label>
		    <input type="text" class="form-control" id="sdt" placeholder="Enter Your Phone" name="sdt">
		  </div>
		  <div class="form-group">
		    <label for="sodonhang">Address</label>
		    <input type="text" class="form-control" id="sodonhang" placeholder="Enter Your Order" name="sodonhang">
		  </div>
		  <div class="form-group">
		    <label for="linkfb">FaceBook</label>
		    <input type="text" class="form-control" id="sodonhang" placeholder="Enter Your Link FaceBook" name="linkfb">
		  </div>
		  <div class="form-group row text-xs-center">
		  	<div class="col-sm-offset-2 col-sm-10">
		  		<button type="button" class="btn btn-primary nutxulyajax">Submit</button>
		  		<button type="reset" class="btn btn-danger">Reset</button>
		  	</div>
		  </div>
		</form>
	</div>



 
</body>
</html>