<div class="col-md-3">
	<div class="list-group">
		<a href="index.php" class="list-group-item">Отправленые</a>
		<a href="index.php?cat=archive" class="list-group-item">Архив</a>
		<a href="logout.php" class="list-group-item">Выход из аккаунта</a>
	</div>
</div>
<?php
	if (intval($_GET['id'])>0){

		$qmessage = mysqli_query($condb,'SELECT subject,text FROM mail WHERE id='.intval($_GET['id'].' LIMIT 1'));
		$message = mysqli_fetch_assoc($qmessage);
		?>
		<h1><?=$message['subject']?></h1>
		<br>
		<p><?=$message['text']?></p>

<?php
	}else{
		?>

<div class="col-md-9">
	<!-- Button trigger modal -->
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
    Написать письмо
  </button>
	<br>
	<br>
	<table class="table table-bordered tablesorter" id="Table">
  		<thead>
  			<tr>
  				<th>Удалить</th>
  				<th>Отправитель</th>
  				<th>Тема письма</th>
  				<th>Дата получения</th>
  			</tr>
  		</thead>
  		<tbody>
  		<?php
        $archive = 0;
		$path = 'to_archive.php';
		$del_message ="Отправить в архив";
        if ($_GET['cat']=='archive'){
          	$path = 'delete_message.php';
			$archive=1;
			$del_message="Удалить безвозвратно";
        }
				$query = mysqli_query($condb ,"SELECT id, subject, text, email_receiver, data FROM mail WHERE send_user=".user_id()." AND archive =".$archive);
				while ($message = mysqli_fetch_assoc($query) ){ 
			?>
			<tr>				
				<td><a href="<?=$path;?>?id=<?=$message['id']?>"><?=$del_message;?></a></td>
				<td><?=$message['email_receiver']?></td>
				<td><a href="index.php?id=<?=$message['id']?>"><?=substr($message['subject'],0,20)?></a></td>
				<td><?=$message['data']?></td>
			</tr>
			<?php
				}
			?>
  		</tbody>
	</table>
</div>
		<?php
	}

?>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form action="send_message.php" method="post" class="form-horizontal">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Написать сообщение</h4>
      </div>
      <div class="modal-body form-group">
      	<label for="inputEmail" class="col-sm-2 control-label">Email</label>
    		<div class="col-sm-10">
        		<input type="email" name="email" placeholder="Email" class="form-control" id="inputEmail">
        	</div>
        	<br>
        	<br>
      	<label for="inputSubject" class="col-sm-2 control-label">Тема</label>
    		<div class="col-sm-10">
        		<input type="text" name="subject" placeholder="Тема сообщение" class="form-control" id="inputSubject">
        	</div>
        	<br>
        	<br>
    	<label for="inputText" class="col-sm-2 control-label">Сообщение</label>
			<div class="col-sm-10">
       			<textarea name="message" class="form-control" id="inputText" rows="5" name="text"></textarea>
       		</div>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Отправить сообщение</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Отмена</button>
      </div>
      </form>
    </div>
  </div>
</div>