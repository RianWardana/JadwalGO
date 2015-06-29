<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Log in</title>
	</head>

	<body style="background-color: #eee">
		
		<div style="margin-top: 70px; margin-left:-20px; padding:20px;">
		
		<h2 class="text-center text-muted" style="margin-left: 20px;">Administrator Login</h2>
		
		<?php
			$attributes = array('name' => 'login_form', 'class' => '');
			echo form_open('login', $attributes);
		?>
			<div class="form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<input class="normal form-control" type="text" name="username" placeholder="Username"/>
					<input class="normal form-control" type="password" name="password" placeholder="Password"/>
					<input class="normal form-control btn btn-primary" type="submit" name="submit" style="text-align:center;" value="Log in"/>
				</div>
			</div>
		</form>
		<div>

		
	</body>
</html>