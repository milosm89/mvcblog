<?php

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$pwd = $_POST['pwd'];

	
	require "../env.php";
	require "../database/Dbh.class.php";
	require "../model/login.class.php";
	require "../controller/login.contr.php";
	
    $login = new LoginContr($username, $pwd, $host, $user, $password, $database);
	$login->loginUser();

	echo "<script type='text/javascript'>;
	alert('You are logged in!');
	window.location.href='../index.php';
	</script>";
	
}