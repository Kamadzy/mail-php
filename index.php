<?php
include_once "mysql.inc.php";
include_once "auth_func.inc.php";
?>
<html>
<head>
<link rel="stylesheet" href="/css/bootstrap.min.css">
<!-- Optional theme -->
<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
<link rel="stylesheet" href="/css/style.css">
</head>
<body>
	<div class="container" >
		<?php

			if (user_logged_in()){
				include_once "mail_template.inc.php";
			}else{
				include_once "login_form.inc.php";
			}

		?>
	</div>
<!-- Latest compiled and minified JavaScript -->
<script src="/js/jquery-1.12.0.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.tablesorter.min.js"></script>
<script>
	$(document).ready(function() 
		{ 
			$("#Table").tablesorter(); 
		} 
	); 
</script>
</body>	
</html>
