
<?php
	require "../shared/header.php";
  	require "../shared/process.php";
?>

<!--consider customizing more-->
<div class="row h-100 justify-content-center align-items-center">
	<div class="col-10 col-md-8 col-lg-4">
	  	<h3>Login</h3>
		<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
			<?php
				if(isset($login_error) && !empty($login_error)){
					displayErrors($login_error);
				}
			?>
		  	<div class="form-group input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
				</div>
			  	<input type="text" class="form-control" placeholder="Enter username" name="username" required value="alpha">
		  	</div>

		  	<div class="form-group input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1"><i class="fa fa-unlock" aria-hidden="true"></i></span>
				</div>
			  	<!--<label for="password">Password</label>-->
			  	<input type="password" class="form-control" id="password" placeholder="Password" name="password" required value="alpha">
		  	</div>

		  	<div class="row">
			  		<button type="submit" class="btn btn-success btn-block" name="login" id="loginbtn"><i class="fa fa-sign-in"></i> <span>Login</span>
				 	</button>
		  	</div>
		</form>
	</div>
</div>

<?php require "../shared/footer.php";?>
