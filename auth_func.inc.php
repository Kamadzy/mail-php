<?php

function user_logged_in(){
	if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
	{		
		global $condb;
	    $query = mysqli_query($condb, "SELECT id, hash FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");
	    $userdata = mysqli_fetch_assoc($query);

	    if (($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']))
	    {
	        return false;
	    }
	    else
	    {
	        return true;
	    }
	}
	else
	{
	    return false;
	}

}

function user_id(){
	if (isset($_COOKIE['id']) and isset($_COOKIE['hash']))
	{		
		global $condb;
	    $query = mysqli_query($condb, "SELECT id, hash FROM users WHERE id = '".intval($_COOKIE['id'])."' LIMIT 1");
	    $userdata = mysqli_fetch_assoc($query);

	    if (($userdata['hash'] !== $_COOKIE['hash']) or ($userdata['id'] !== $_COOKIE['id']))
	    {
	    	return false;
	    }
	    else
	    {
	        return $userdata['id'];
	    }
	}
	else
	{
	    return false;
	}

}

function log_in($login,$password){
	global $condb;
	$query = mysqli_query($condb ,"SELECT id, pass FROM users WHERE login='".mysqli_real_escape_string($condb, $login)."'");
	$data = mysqli_fetch_assoc($query);
	if($data['pass'] === md5(md5($_POST['password'])))
	{
	    # Генерируем случайное число и шифруем его
	    $hash = md5(uniqid(rand(), true));

	    # Записываем в БД новый хеш авторизации и IP
	    mysqli_query($condb, "UPDATE users SET hash='".$hash."' WHERE id='".$data['id']."'");

	    # Ставим куки
	    setcookie("id", $data['id'], time()+60*60*24*30);
	    setcookie("hash", $hash, time()+60*60*24*30);

	    return true;
	}
	else
	{
	    return false;
	}
    
}