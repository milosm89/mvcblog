<?php
session_start(); 
require "layouts/header.php";
?>
	<?php if (isset($_SESSION['userid'])) { ?>
		<div class="create-wrapper">
		<h4>Create Post</h4>
		<form action="../includes/create.inc.php" method="post">
			<input type="hidden" name="userid" value="<?php echo $_SESSION['userid'];?>">
			<input type="text" name="title" placeholder="Enter tht title">
			<textarea name="text" placeholder="Write the text"></textarea>
			<br>
			<button type="submit" name="submit">Create post</button>
		</form>
	</div>
	<?php } else {
		echo "<h2>";
		echo "You must logged in to continue!";
		echo "</h2>";
		die();
	} ?>
</body>
</html>