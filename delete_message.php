<?php
include_once 'mysql.inc.php';
include_once "auth_func.inc.php";

if (user_logged_in()){
    if(!empty($_GET['id'])) {

        global $condb;
        mysqli_query($condb,'DELETE FROM mail WHERE id='.intval($_GET['id']));

        header("Location: index.php?cat=archive");
    } else {
        ?>
        <p>К сожалению письмо не удалено.</p>
        <p>Вернитесь <a href="index.php">назад</a>.</p>
        <?php
    }
}