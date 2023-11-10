<?php
session_start(); 
require "layouts/header.php";
?>
<section class="index-login">
	<div class="wrapper">
		<div class="index-login-signup">
			<h4>SIGN UP</h4>
			<p>Don't have an account yet?  Sign up there</p>
			<form action="../includes/signup.inc.php" method="post">
				<input type="text" name="username" placeholder="Username">
				<input type="text" name="email" placeholder="Email">
				<input type="password" name="pwd" placeholder="Password">
				<input type="password" name="pwdrepeat" placeholder="Repeat Password">
				<br>
				<button type="submit" name="submit">SIGN UP</button>
			</form>
		</div>
		<div class="index-login-login">
			<h4>LOGIN</h4>
			<form action="../includes/login.inc.php" method="post">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="pwd" placeholder="Password">
				<br>
				<button type="submit" name="submit">LOGIN</button>
				<div class="login-info">
					You may login with: <strong>admin/123 </strong>
				</div>
			</form>
		</div>
	</div>
	
</section>

</body>
</html>