<?php
include_once 'mysql.inc.php';
include_once "auth_func.inc.php";

if (user_logged_in()){
    if(!empty($_GET['id'])) {

        global $condb;
        mysql_query($condb,'SELECT subject FROM mail WHERE id='.intval($_GET['id']));

        header("Location: index.php");
    } else {
        ?>
        <p>� ��������� ������ �� �������.</p>
        <p>��������� <a href="index.php">�����</a>.</p>
        <?php
    }
}