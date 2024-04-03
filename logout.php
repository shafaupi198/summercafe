<?php
session_start();

$_SESSION['id']='';
$_SESSION['foto']='';
$_SESSION['nama']='';
$_SESSION['username']='';

unset($_SESSION['id']);
unset($_SESSION['foto']);
unset($_SESSION['nama']);
unset($_SESSION['username']);

session_unset();
session_destroy();
header('Location:index.php');

?>