<?php

if (isset($_POST['submit'])) {

	$username = $_POST['username'];
    $email = $_POST['email'];
	$pwd = $_POST['pwd'];
	$pwdRepeat = $_POST['pwdrepeat'];

	require "../env.php";
	require "../database/Dbh.class.php";
	require "../model/signup.class.php";
	require "../controller/signup.contr.php";

	$signup = new SignUpContr( $username, $email, $pwd, $pwdRepeat, $host, $user, $password, $database);
	$signup->signUpUser();

	echo "<script type='text/javascript'>;
	alert('User created successfully!');
	window.location.href='../index.php';
	</script>";
	
	
}