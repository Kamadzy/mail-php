<?php
setcookie("id", '', time()-1000);
setcookie("hash", '', time()-1000);
header("Location: index.php"); exit();
