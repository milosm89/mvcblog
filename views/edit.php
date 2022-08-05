<?php
session_start(); 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta htttp-equiv="Cache-control" content="no-cache">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Mvc blog</title>
	<link rel="stylesheet" href="../../less/global.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,700&display=swap" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="../../js/js.js"></script>
</head>
<body>
	<div class="nav-bar">
	<?php 
		if (isset($_SESSION['userid'])) { ?>
			<p>Welcome: <?php  echo $_SESSION['name'];?></p>
  	<?php } ?>
		<ul>
			<li><a class="active" href="../../index.php">Home</a></li>
			<li><a href="../../views/blog.php">Blog</a></li>
			<?php 
				if (isset($_SESSION['userid'])) { ?>
					<li><a href="../../includes/logout.inc.php">Logout</a></li>
			<?php } else { ?>
				<li><a href="../../views/login.php">Login</a></li>
			<?php }?>
		</ul>
	</div>
	<div class="nav-bar-mobile">
		<div class="icon-wrap">
		<i class="fa fa-bars fa-2x bars-icon" aria-hidden="true"></i>
		<i class="fa fa-times fa-2x close-icon" aria-hidden="true"></i>
		</div>
		<div class="dropdown-menu">
		<?php 
		if (isset($_SESSION['userid'])) { ?>
			<p class="welcome-text">Welcome: <?php  echo $_SESSION['name'];?></p>
		<?php } ?>
		<ul>
			<li><a class="active" href="../../index.php">Home</a></li>
			<li><a href="../../views/blog.php">Blog</a></li>
			<?php 
			if (isset($_SESSION['userid'])) { ?>
			<li><a href="../../includes/logout.inc.php">Logout</a></li>
			<?php } else { ?>
				<li><a href="../../views/login.php">Login</a></li>
			<?php } ?>
		</ul>
		</div>
</div>
	<?php 
	if (isset($_SESSION['userid'])) { 
		require "../database/Dbh.class.php";
		require "../model/post.class.php";
		require "../controller/post.contr.php";
		$id = $_GET['id'];
		$edit = new PostContr;
		$result = $edit->singlePost($id); 
		?>
		<div class="create-wrapper">
        	<h4>Edit Post</h4>
			<form action="../../includes/edit.inc.php/?id=<?php echo $_GET['id']; ?>" method="post">
				<input type="text" name="title" value="<?php echo $result[0]['title']; ?>">
				<textarea name="text"><?php echo $result[0]['text'] ?></textarea>
				<br>
				<button type="submit" name="submit">Edit post</button>
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