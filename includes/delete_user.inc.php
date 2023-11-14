<?php 

session_start();
session_unset();
session_destroy();

$id = $_GET['id'];

require "../env.php";
require "../database/Dbh.class.php";
require "../model/delete_user.class.php";
require "../controller/delete_user.contr.php";

$delete_acc = new DeleteUserContr($host, $user, $password, $database);
$delete_acc->deleteUser($id);

echo "<script type='text/javascript'>;
alert('User and user posts deleted successfully!');
window.location.href='../views/blog.php';
</script>";
