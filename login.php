<?php
include_once "mysql.inc.php";
include_once "auth_func.inc.php";

if(isset($_POST['login'])){
	log_in($_POST['login'],$_POST['password']);
}
header("Location: index.php"); exit();
