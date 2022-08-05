<?php

session_start();

if (isset($_POST['submit'])) {

    $userId = $_POST['userid'];
    $title = $_POST['title'];
    $text = $_POST['text'];

    require "../database/Dbh.class.php";
    require "../model/post.class.php";
    require "../controller/post.contr.php";

    $create = new PostContr;
    $create->createPost($userId, $title, $text);

    echo "<script type='text/javascript'>;
    alert('Post created successfully!');
    window.location.href='../views/blog.php';
    </script>";
}