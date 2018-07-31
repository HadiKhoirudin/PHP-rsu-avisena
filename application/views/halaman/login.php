<html lang="en">
<head>
	<meta charset="utf-8">
	<title></title>
	<?php echo assets::css('bootstrap.css'); ?>
	<?php echo assets::js('bootstrap.js'); ?>
	
<style>
body{
   background-image:url(<?php echo base_url('assets/images/rs_avisena_sampul.jpg');?>); background-repeat: no-repeat;    background-position: center center;    background-attachment: fixed; -webkit-background-size: 100%, cover;    -moz-background-size: 100%, cover;    -o-background-size: 100%, cover;    background-size: 100%, cover;}
</style>	
</head>
	<body>
		<br><br><br><br><br>
		<form action="<?php echo base_url('login/masuk');?>" method="post">
			<div class="col-md-3 col-md-offset-4" style="margin-top:10%">
				<div align="center" class="panel panel-default" style="text-align:center;">
				  <h3>Login System</h3>
				  <hr>
					<div class="panel-body">
						<div class="row form-group">
							<div class="col-md-12">
								<input type="text" name="username" class="form-control input-sm" id="username" style="text-align:center;" placeholder="   U   s   e   r   n   a   m   e   " required>
							</div>
						</div>

						<div class="row form-group">
							<div class="col-md-12">
								<input type="password" name="password" class="form-control input-sm" id="password" style="text-align:center;" placeholder="   P   a   s   s   w   o   r   d   "  required>
							</div>
						</div>

						<div class="row form-group">

							<div class="col-md-12">
								<button type="submit" class="btn btn-info btn-fill btn-wd">Login</button>
							</div>
						</div>
					</div>
				</div>

				<?php
				if($this->session->flashdata('pesan') <> ''){
				?>
					<div class="alert alert-dismissible alert-danger">
						<?php echo $this->session->flashdata('pesan');?>
					</div>
				<?php
				}
				?>
			</div>
		</form>
	</body>
</html>