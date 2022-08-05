<?php

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
	$pwd = $_POST['pwd'];

	require "../database/Dbh.class.php";
	require "../model/login.class.php";
	require "../controller/login.contr.php";
	
    $login = new LoginContr($username, $pwd);
	$login->loginUser();

	echo "<script type='text/javascript'>;
	alert('You are logged in!');
	window.location.href='../index.php';
	</script>";
	
}