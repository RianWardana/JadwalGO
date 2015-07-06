<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<?php include('tpl_css.php'); ?>
	</head>

	
	
	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top navbar-inner" role="navigation">
		
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand">
						<div class="brand-logo"></div>
					</a>
				</div>
				
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				
					<ul class="nav navbar-nav">
						<li class="<?php if($function == 'index'){echo 'active';}?>">
							<a href="<?php echo base_url(); ?>"><i class="fa fa-table" style="margin-right: 10px;"></i>Jadwal</a>
						</li>
						
						<li class="<?php if($function == 'cari'){echo 'active';}?>">
							<a href="<?php echo base_url('cari'); ?>"><i class="fa fa-search" style="margin-right: 10px;"></i>Cari</a>
						</li>
						
						<li class="<?php if($have_login == FALSE){echo 'hidden';} if($function == 'update'){echo 'active';}?>">
							<a href="<?php echo base_url('update'); ?>"><i class="fa fa-refresh" style="margin-right: 10px;"></i>Update</a>
						</li>
					</ul>
					
					<ul class="nav navbar-nav navbar-right">
						<li class="<?php if($function == 'login'){echo 'active';}?>">
							<a href="<?php if($have_login == TRUE){echo base_url('logout') . '"><i class="fa fa-sign-out" style="margin-right: 10px;"></i>Log out';} else{echo base_url('login') . '"><i class="fa fa-sign-in" style="margin-right: 10px;"></i>Log in';}?></a>
						</li>
					</ul>
					
				</div>
				
			</div>
			
        </nav>
	</body>
</html>