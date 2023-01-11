<?php

if (isset($_POST['submit'])) {
    
    $id = $_GET['id'];
    $title = $_POST['title'];
    $text = $_POST['text'];

    require "../env.php";
    require "../database/Dbh.class.php";
    require "../model/post.class.php";
    require "../controller/post.contr.php";

    $create = new PostContr($host, $user, $password, $database);
    $create->editPost($title, $text, $id);

    echo "<script type='text/javascript'>;
		alert('Post edited successfully!');
		window.location.href='../../views/blog.php';
		</script>";
}