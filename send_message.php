<?php
include_once 'mysql.inc.php';
include_once "auth_func.inc.php";

if (user_logged_in()){
	if((!empty($_POST['email'])) and (!empty($_POST['message']))) {

		global $condb;
		mysqli_query($condb,'INSERT INTO mail (subject, text, email_receiver, send_user, archive, data)
									 VALUES ("'.mysqli_real_escape_string($condb, $_POST['subject']).'",
									 		 "'.mysqli_real_escape_string($condb, $_POST['message']).'",
									 		 "'.mysqli_real_escape_string($condb, $_POST['email']).'",
									 		 '.user_id().' , 0 , null);');
		mail(mysqli_real_escape_string($condb, $_POST['email']),mysqli_real_escape_string($condb, $_POST['subject']),mysqli_real_escape_string($condb, $_POST['message']));

		header("Location: index.php");
	} else {
		?>
			<p>К сожалению письмо не отправлено за неимением адреса получателя или текста сообщения.</p>
			<p>Вернитесь <a href="index.php">назад</a>.</p>
		<?php
	}
}



// header("Location: index.php");