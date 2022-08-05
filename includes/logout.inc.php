<?php

session_start();
session_unset();
session_destroy();

echo "<script type='text/javascript'>;
alert('You are logged out!');
window.location.href='../index.php';
</script>";