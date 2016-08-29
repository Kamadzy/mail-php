<?php
header('Content-type: text/html; charset=utf-8');

$dbhost = "localhost";
$dbname = "mail_db";
$dbuser = "mail_user";
$dbpasswd = "mail_pass";
$condb = null;

function dbConnect()
{
    global $dbhost, $dbuser, $dbpasswd, $dbname, $condb;
    if (!$condb) {
		$condb=mysqli_connect( $dbhost, $dbuser, $dbpasswd ) or die( mysqli_error() );
        mysqli_select_db($condb, $dbname );
        mysqli_query($condb, "SET NAMES utf8");
    }
}

dbConnect();