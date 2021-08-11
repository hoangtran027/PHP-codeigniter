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
		<div class="text-xs-center" style="    display: flex;
    justify-content: space-between;
    align-items: center;">
			<a href="<?= base_url() ?>index.php/nhansu" class="btn btn-success">Back</a>
			<h3 class="display-3" style="margin-left: -200px">Edit Information</h3>
			<hr>
		</div>

		<form method="post" enctype="multipart/form-data" action="<?= base_url() ?>index.php/nhansu/update_nhansu">

		<?php foreach ($dulieukq as $value): ?>
				
			

		  <div class="form-group">
		    <label for="anhavatar">Image</label>
		    <div class="row" style="align-items: center;justify-content: center; margin: 12px 0;">
		    	<div class="col-sm-6">
		    		<img src="<?=$value['anhavatar']?>">
		    	</div>
		    </div>
		    <input type="hidden" name="id" value="<?=$value['id']?>">
		    <input type="hidden" name="anhavatar2" value="<?=$value['anhavatar']?>">
		    <input type="file" class="form-control" id="anhavatar" placeholder="Enter Your Image" name="anhavatar">
		  </div>
		  <div class="form-group">
		    <label for="ten">FullName</label>
		    <input type="text" class="form-control" id="ten" placeholder="Enter Your Fullname" name="ten" value="<?=$value['ten']?>">
		  </div>
		  <div class="form-group">
		    <label for="tuoi">Age</label>
		    <input type="number" class="form-control" id="tuoi" placeholder="Enter Age" name="tuoi" value="<?=$value['tuoi']?>">
		  </div>
		  <div class="form-group">
		    <label for="sdt">Phone</label>
		    <input type="text" class="form-control" id="sdt" placeholder="Enter Your Phone" name="sdt" value="<?=$value['sdt']?>">
		  </div>
		  <div class="form-group">
		    <label for="sodonhang">Order</label>
		    <input type="text" class="form-control" id="sodonhang" placeholder="Enter Your Order" name="sodonhang" value="<?=$value['sodonhang']?>">
		  </div>
		  <div class="form-group">
		    <label for="linkfb">FaceBook</label>
		    <input type="text" class="form-control" id="sodonhang" placeholder="Enter Your Link FaceBook" name="linkfb" value="<?=$value['linkfb']?>">
		  </div>
		  <?php endforeach ?>
		  <div class="form-group row text-xs-center">
		  	<div class="col-sm-offset-2 col-sm-10">
		  		<button type="submit" class="btn btn-primary">Submit</button>
		  		
		  	</div>
		  </div>

		  
		</form>
	</div>
 
</body>
</html>