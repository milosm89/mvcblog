<?php 

$id = $_GET['id'];

require "../database/Dbh.class.php";
require "../model/post.class.php";
require "../controller/post.contr.php";

$delete = new PostContr;
$delete->deletePost($id);

echo "<script type='text/javascript'>;
alert('Post deleted successfully!');
window.location.href='../views/blog.php';
</script>";
