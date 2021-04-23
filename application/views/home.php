<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

	<title>Document</title>
</head>
<body>

<div class="container">
	<section class="row my-3">
		<div class="col-xl-3">
			<?php if (!$this->session->userdata('logged_in')): ?>

				<h2>Login</h2>
				<form action="home/login" method="post">
					<input type="text" name="username" placeholder="username or email address"  class="form-control">
					<input type="password" name="password" placeholder="password"  class="form-control">
					<input type="submit" name="submit" value="Login" class="btn btn-primary my-3">
				</form>
				<?php if ($this->session->flashdata('success_login')): ?>
					<?php echo $this->session->flashdata('success_login');
						$this->session->set_flashdata('success_login',false);
					?>
				<?php endif; ?>

				<?php if ($this->session->flashdata('errors_login')): ?>
					<?php echo $this->session->flashdata('errors_login');
						$this->session->set_flashdata('errors_login',false);
					?>
				<?php endif; ?>

			<?php endif; ?>

			<!--IF SUCCESSFULLY LOGGED IN-->
			<?php if ($this->session->userdata('logged_in')): ?>
				<a href="home/logout" class="btn btn-danger">Log out</a>
			<?php endif; ?>
		</div>
		<div class="col-xl-9">

			<?php if (!$this->session->userdata('logged_in')): ?>
				<h1>Welcome Please log in or Register, Thank you</h1>
			<?php endif; ?>

			<?php if ($this->session->userdata('logged_in')): ?>
				<h1>Welcome <?=$this->session->userdata('logged_in')->username;?></h1>
			<?php endif; ?>

		</div>
	</section>

	<section class="row my-3">
		<div class="col-xl-3 my-3">
			<h2>Register</h2>
			<form action="home/register" method="post">
				<input type="text" name="username" placeholder="username"  class="form-control">
				<input type="password" name="password" placeholder="password"  class="form-control">
				<input type="password" name="confirm_password" placeholder="confirm password" class="form-control">
				<input type="text" name="email" placeholder="Email address" class="form-control">
				<input type="submit" name="submit" value="Register" class="btn btn-primary my-3">
			</form>

			<?php if ($this->session->flashdata('success')): ?>
				<?php echo $this->session->flashdata('success');
				$this->session->set_flashdata('success',false);
				?>
			<?php endif; ?>

			<?php if ($this->session->flashdata('errors')): ?>
				<?php echo $this->session->flashdata('errors');
				$this->session->set_flashdata('errors',false);
				?>
			<?php endif; ?>




		</div>
	</section>
</div>



</body>
</html>
